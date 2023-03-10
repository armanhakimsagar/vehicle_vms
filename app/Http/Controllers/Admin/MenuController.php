<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\TblMenu;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::select("SELECT t.*, p.menu_name as parent_name, m.name as module_name FROM `tbl_menus` t left join tbl_menus p on t.parent_id = p.id left join tbl_modules m on m.assigned_id=t.module_id");
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id= $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#serverModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#serverModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>

                    <a  href='' class='custom-button-class delete_data' data-id='$id'><i class='fas fa-trash'></a>";
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $status = '<span class="btn btn-success btn-sm"></span>';
                    } else {
                        $status = '<span class="btn btn-danger btn-sm"></span>';
                    }
                    return $status;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);

        }

        return view('admin.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_list = DB::select("select * from tbl_modules where status=1");
        $parent_list = DB::select("select * from tbl_menus where status=1");
        return view('admin.menu.create', compact('module_list','parent_list'));
    // echo'hello server create';
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $validate = Validator::make($request->all(), [
                'module_id'=> 'required',
                'menu_name'=> 'required',
                'url_link'=> 'required'
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = new TblMenu();
            $server->module_id = $request->module_id;
            $server->menu_name = $request->menu_name;
            $server->label = $request->label;
            $server->menu_icon = $request->menu_icon;
            $server->url_link = $request->url_link;
            $server->parent_id = $request->parent_id;
            $server->sort = $request->sort;
            $server->status = $request->status;
            $server->save();
            DB::commit();
            return true;

        } catch(Exception $e) {
            DB::rollBack();
            return false;
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
        $menulist= TblMenu::find($id);
        return view('admin.menu.show', compact('menulist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menulist= TblMenu::find($id);
        $module_list = DB::select("select * from tbl_modules where status=1");
        $parent_list = DB::select("select * from tbl_menus where status=1");
        return view('admin.menu.edit', compact('menulist','module_list','parent_list'));
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
        try{

            $validate = Validator::make($request->all(), [
                'module_id'=> 'required',
                'menu_name'=> 'required',
                'url_link'=> 'required'
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = TblMenu::find($id);
            $server->module_id = $request->module_id;
            $server->menu_name = $request->menu_name;
            $server->label = $request->label;
            $server->menu_icon = $request->menu_icon;
            $server->url_link = $request->url_link;
            $server->parent_id = $request->parent_id;
            $server->sort = $request->sort;
            $server->status = $request->status;
            $server->save();
            DB::commit();
            return true;

        } catch(Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  try {

        //     DB::beginTransaction();
        //     $server= GpsServer::find($id); //fetch data
        //     $server->delete(); // Data delete
        //     DB::commit();
            
        //     return true;

        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return false;
        // }
    }
}
