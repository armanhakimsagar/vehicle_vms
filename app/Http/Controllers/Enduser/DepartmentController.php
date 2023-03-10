<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class DepartmentController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if ($request->ajax()) {
                $data = Role::orderBy('id','DESC')->get();
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
            return view('enduser.department.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('enduser.department.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);
    
        $input = [
            'name'=> $request->name,
            'guard_name'=>'web',
        ];

        $user = Role::insert($input);
    
        return redirect()->route('department.index')
                        ->with('success','Department created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Role::find($id);
        return view('enduser.department.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Role::find($id);
        return view('enduser.department.edit',compact('user'));
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
            'name' => 'required|unique:roles,name,'.$id,
        ]);
    
        Role::where('id',$id)->update([
            'name'=> $request->name,
            'guard_name'=>'web'
        ]);

        return redirect()->route('department.index')
                        ->with('success','Department updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('department.index')
                        ->with('success','Department deleted successfully');
    }
}
