<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use DB;


class PermissionController extends Controller
{
     	
	  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if ($request->ajax()) {
                $data = DB::table('permissions')->orderBy('id','DESC')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $id = $row->id;
                        return "
                        <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#userModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>
                        <div class='dropdown custom-dreopdown' style='display:inline-block'>
                        </div>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('enduser.permission.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentPermission=DB::table('permissions')->where('parent_id',0)->get();
        return view('enduser.permission.create',compact('parentPermission'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $validator = $request->validate([
            'name' => 'required|unique:permissions,name',
            'resource' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->respondInvalidRequest($validator->errors());
        }

    
        $input =[
            'parent_id'=>$request->parent_id?$request->parent_id:0,
            'name'=>$request->name,
            'resource'=>$request->resource,
            'guard_name'=>'web'
        ]; 

         DB::table('permissions')->insert($input);
    
        return redirect()->route('permit.index')
                        ->with('success','Permission created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =  DB::table('permissions')->where('id',$id)->first();
        return view('admin.permission.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = DB::table('permissions')->where('id',$id)->first();

        $parentPermission=DB::table('permissions')->get();
  
        return view('enduser.permission.edit',compact('designation','parentPermission'));
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
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,'.$id,
            'resource' => 'required',
        ]);

        $input =[
            'parent_id'=>$request->parent_id?$request->parent_id:0,
            'name'=>$request->name,
            'resource'=>$request->resource,
            'guard_name'=>'web'
        ]; 

         DB::table('permissions')->where('id',$id)->update($input);
    
        return redirect()->route('permit.index')
                        ->with('success','Permission update successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Designation::find($id)->delete();
        return redirect()->route('designation.index')
                        ->with('success','Designation deleted successfully');
    }
}
