<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Designation;

class DesignationController extends Controller
{


	  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Designation::with('department')->orderBy('id','DESC')->paginate(5);
        return view('admin.designation.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Role::all();
        return view('admin.designation.create',compact('department'));
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
            'department_id' => 'required',
            'designation_name' => 'required',
        ]);

        $input =[
            'department_id'=>$request->department_id,
            'designation_name'=>$request->designation_name,
        ];

        $user = Designation::insert($input);

        return redirect()->route('designation.index')
                        ->with('success','Designation created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Designation::find($id);
        return view('admin.designation.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::find($id);
        $department=Role::all();
        return view('admin.designation.edit',compact('designation','department'));
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
            'designation_name' => 'required',
            'department_id' => 'required',
        ]);

        Designation::where('id',$id)->update([
            'department_id'=> $request->department_id,
            'designation_name'=> $request->designation_name
        ]);


        return redirect()->route('designation.index')
                        ->with('success','Designation updated successfully');
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
