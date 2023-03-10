<?php

namespace App\Http\Controllers\Enduser;

use File;
use App\Models\Document;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Services\Enduser\DocumentService;

class DocumentController extends Controller
{
    private $my_connection;
    private $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
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
    public function index(Request $request)
    {
        // dd($request->all());
        $query = "select d.*, v.vehicle_no, dt.name as dt_name from documents d left join vehicles v on v.id = d.vehicle_id left join doc_types dt on dt.id = d.doc_type_id where d.id > 0 ";

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $query .= " and  vehicle_id = " . $request->vehicle_id;
        }
        if ($request->doc_type  != null && $request->doc_type > 0) {
            $query .= " and doc_type_id = " . $request->doc_type;
        }
        if ($request->start_date  != null && $request->end_date  != null) {

            $query .= " and  expiry_date between '" . $request->start_date . "' and '" . $request->end_date . "'";
        }
        $query .= " order by d.id desc";

        $data = $this->my_connection->select($query);

        $datatable =  $this->documentService->datatable($data);
        return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveData(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'vehicle_no' => 'required',
                'document_type' => 'required',
                'document_name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            if ($id > 0) {

                $document = Document::find($id);
                // $oldImg = $document->doc_photo;

            } else {

                $document = new Document();
                $document->customer_id = Auth::user()->id;
            }

            DB::beginTransaction();
            // $image = $request->file('image');
            // if ($image) {
            //     $imgName = date("Ymd_His");
            //     $ext = strtolower($image->getClientOriginalExtension());
            //     $fullName = $imgName . '.' . $ext;
            //     $uploadPath = 'public/uploads/doc/';
            //     $uploadTo = $image->move($uploadPath, $fullName);
            //     $document->doc_photo = $fullName;
            //     if ($id > 0) {
            //         $image_path = $uploadPath . $oldImg;
            //         if (File::exists($image_path) && $oldImg != null) {
            //             File::delete($image_path);
            //         }
            //     }
            // }

            $document->doc_type_id = $request->document_type;
            $document->vehicle_id = $request->vehicle_no;
            $document->doc_name = $request->document_name;
            $document->doc_number = $request->document_number;
            $document->issue_date = Carbon::parse($request->issue_date)->format('Y-m-d H:i:s');
            $document->expiry_date = Carbon::parse($request->expiry_date)->format('Y-m-d H:i:s');
            $document->last_renewal_date = Carbon::parse($request->last_renewal_date)->format('Y-m-d H:i:s');
            $document->expiry_aleart = $request->expiry_aleart;
            $document->note = $request->note;
            // dd($document);
            $document->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getDocTypeData($id)
    {
        $result = Vehicle::where('object_id', $id)->get();


        if (count($result) > 0) {
            $v_id = $result[0]['id'];
            // dd($v_id);

            $docType = $this->my_connection->select("select d.*, dt.name as dt_name from documents d left join doc_types dt on dt.id = d.doc_type_id where d.customer_id = " . Auth::user()->id . " and d.vehicle_id =" . $v_id . "  order by d.id desc limit 5");

            $htmlContent = '';
            if (count($docType) > 0) {
                foreach ($docType as $type) {

                    $expiryDate = new Carbon($type->expiry_date);
                    $now = Carbon::today();
                    $diff = $expiryDate->diff($now)->days;

                    if ($now > $expiryDate) {
                        $diff = '-' . $diff;
                    }

                    $htmlContent .= '<tr >
                                <td >' . $type->dt_name . '</td>
                                <td > ' . Carbon::parse($type->expiry_date)->format('d M Y') . ' </td>
                                <td > ' . $diff . ' days </td>
                                </tr>';
                }
            } else {
                $htmlContent .= '<span>Document empty</span>';
            }
            // dd($htmlContent);
            return $htmlContent;
        } else {
            echo 0;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        // dd($document);
        return $document;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
