<?php

namespace App\Http\Controllers\Enduser;

use File;
use Carbon\Carbon;
use App\Models\ChartOfAccount;
use App\Models\AccountingTransfer;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Services\Enduser\AccountsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class AccountsController extends Controller
{
    private $my_connection;
    private $accountsService;

    public function __construct(AccountsService $accountsService)
    {
        $this->accountsService = $accountsService;
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountSetupDatalist()
    {
        $query = $this->my_connection->select("select c.*, p.title as parent_name, p.code_no as parent_code from chart_of_accounts c left join chart_of_accounts p on p.id=c.parent_id order by c.id asc");
        $query = getCatTable(buildTree($query, 0), 0);
        $final_array = $this->accountsService->nestedToSingleArray($query);
        $final_data = $this->accountsService->arrayGrouping($final_array);

        return $this->accountsService->accountSetupDatalist($final_data);
    }

    public function depositOrExpenseDatalist($type)
    {
        $query = $this->my_connection->select("select t.*, c.title as account_name, m.method_name from transactions t left join chart_of_accounts c on c.id=t.account_id left join payment_method m on m.id=t.payment_method_id where t.trans_type='" . $type . "' order by t.id desc");

        return $this->accountsService->depositOrExpenseDatalist($query);
    }

    public function transferDatalist()
    {
        $query = $this->my_connection->select("select act.*, fac.title as f_account_name, tac.title as t_account_name from accounting_transfers act left join chart_of_accounts fac on fac.id=act.from_ac left join chart_of_accounts tac on tac.id=act.to_ac order by act.id desc");

        return $this->accountsService->transferDatalist($query);
    }

    public function ledgerDatalist(Request $request)
    {
        $query = $this->my_connection->select("select t.*, c.title as account_name from transactions t left join chart_of_accounts c on c.id=t.account_id where t.account_id='" . $request->account_id . "' and t.date between '" . $request->start_date . "' and '" . $request->end_date . "' order by t.date asc");
        $total_balance = 0;
        $balance = 0;

        foreach ($query as $q) {
            $balance += ($q->credit - $q->debit);
            $q->balance = $balance;
        }

        return $this->accountsService->ledgerDatalist($query);
    }

    public function regularBalanceDatalist(Request $request)
    {
        $query = $this->my_connection->select("select t.*, c.title as account_name from transactions t left join chart_of_accounts c on c.id=t.account_id where t.date between '" . $request->start_date . "' and '" . $request->end_date . "' order by t.date asc");
        $total_balance = 0;
        $balance = 0;

        foreach ($query as $q) {
            $balance += ($q->credit - $q->debit);
            $q->balance = $balance;
        }

        return $this->accountsService->regularBalanceDatalist($query);
    }

    public function accountsPages($pages)
    {
        $data = [];
        return view('enduser.dashboard.accounts.' . $pages)->with($data);
    }

    public function savaAccountSetup(Request $request, $id)
    {
        // dd($request->all());
        try {

            $validationRule = [
                'title' => 'required',
                'parent' => 'required',
                'code_no' => 'required',
            ];

            $validator = Validator::make($request->all(), $validationRule);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }


            $this->my_connection->beginTransaction();
            if ($id > 0) {
                $account = ChartOfAccount::find($id);
            } else {
                $account = new ChartOfAccount();
            }
            $account->title = $request->title;
            $account->code_no = $request->code_no;
            $account->parent_id = $request->parent;
            $account->description = $request->description;
            $account->transactional = $request->transactional;
            $account->status = $request->status;
            $account->save();

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function saveDepositOrExpense(Request $request, $type, $id)
    {

        try {

            $validationRule = [
                'account' => 'required',
                'amount' => 'required',
                'date' => 'required',
            ];

            $validator = Validator::make($request->all(), $validationRule);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }


            $this->my_connection->beginTransaction();
            if ($id > 0 && $type != 'transfer') {
                $deposit = Transaction::find($id);
                $oldAtt = $deposit->attachment;
            } else if ($id > 0 && $type == 'transfer') {
                $deposit = Transaction::where('transfer_id', $id)->first();
            } else {
                $deposit = new Transaction();
            }

            $attachment = $request->file('attachment');
            if ($attachment) {
                $imgName = date("Ymd_His");
                $ext = strtolower($attachment->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'public/uploads/attachment/';
                $uploadTo = $attachment->move($uploadPath, $fullName);
                $deposit->attachment = $fullName;
                if ($id > 0) {
                    $att_path = $uploadPath . $oldAtt;
                    if (File::exists($att_path) && $oldAtt != null) {
                        File::delete($att_path);
                    }
                }
            }

            $deposit->account_id = $request->account;
            $deposit->amount = $request->amount;
            if ($type == 'deposit') {
                $deposit->credit = $request->amount;
            } else if ($type == 'expense') {
                $deposit->debit = $request->amount;
            } else if ($type == 'transfer') {
                $deposit->credit = $request->amount;
                $deposit->transfer_id = $request->transfer_id;
            }

            $deposit->trans_type = $type;
            $deposit->payment_method_id = $request->payment_method;
            $deposit->note = $request->note;
            $deposit->date = Carbon::parse($request->date)->format('Y-m-d H:i:s');
            $deposit->reference_id = $request->reference;
            // dd($deposit);
            $deposit->save();

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function saveTransfer(Request $request, $id)
    {
        try {

            $validationRule = [
                'from_account' => 'required',
                'to_account' => 'required',
                'amount' => 'required',
                'date' => 'required',
            ];

            $validator = Validator::make($request->all(), $validationRule);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $date = Carbon::parse($request->date)->format('Y-m-d');
            $date .= date(' H:i:s', strtotime('+6 hour'));

            $this->my_connection->beginTransaction();
            if ($id > 0) {
                $transfer = AccountingTransfer::find($id);
            } else {
                $transfer = new AccountingTransfer();
            }

            $transfer->from_ac = $request->from_account;
            $transfer->to_ac = $request->to_account;
            $transfer->amount = $request->amount;
            $transfer->trans_date = $date;
            $transfer->save();

            if ($transfer) {
                $request['account'] = $request->to_account;
                $request['transfer_id'] = $transfer->id;
                $request['note'] = 'Transfer from ' . $request->from_account . ' account to ' . $request->to_account;
                if ($id > 0) {
                    $this->saveDepositOrExpense($request, 'transfer', $transfer->id);
                } else {
                    $this->saveDepositOrExpense($request, 'transfer', 0);
                }
            }

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function showAccountSetup($id)
    {
        $account = ChartOfAccount::find($id);
        $data['account'] = $account;
        return $data;
    }

    public function showDepositOrExpense($id)
    {
        $depExp = $this->my_connection->select("select t.*, c.title as account_name, m.method_name from transactions t left join chart_of_accounts c on c.id=t.account_id left join payment_method m on m.id=t.payment_method_id where t.id=" . $id)[0];
        $data['depExp'] = $depExp;
        return $data;
    }
    public function showTransfer($id)
    {
        $transfer = AccountingTransfer::find($id);
        $data['transfer'] = $transfer;
        return $data;
    }

    public function export_to_excel()
    {

        $filename = 'ledger_report_' . date('Ymd_his') . '.xls';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=" . $filename);
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<h4>Ledger Report</h4>';
        echo '<table border="1">';
        //make the column headers what you want in whatever order you want
        echo '<tr><th>SL</th><th>Date</th><th>Note</th><th>Debit</th><th>Credit</th><th>Balance</th></tr>';
        //loop the query data to the table in same order as the headers
        $query = $this->my_connection->select("select t.*, c.title as account_name from transactions t left join chart_of_accounts c on c.id=t.account_id order by t.date asc");
        $i = 1;
        $balance = 0;
        foreach ($query as $row) {
            $balance += ($row->credit - $row->debit);
            $balance;
            echo "<tr><td>" . $i . "</td><td>" . $row->date . "</td><td>" . $row->note . "</td><td>" . $row->debit . "</td><td>" . $row->credit . "</td><td>" . $balance . "</td></tr>";
            $i++;
        }
        echo '</table>';
        die();
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
