<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class SmsCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
                $data = DB::table('sms_category')->orderBy('id','DESC')->get();
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
            return view('enduser.settings.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('enduser.settings.category.create');
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
            'sms_receiver' => 'required',
            'category_name' => 'required',
        ]);


            DB::table('sms_category')->insert([
            'sms_receiver'=> $request->sms_receiver,
            'category_name'=> $request->category_name,
            ]);

        return redirect()->route('cat.index')
                        ->with('success','Category created successfully');
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
        return view('enduser.settings.category.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('sms_category')->where('id',$id)->first();
        return view('enduser.settings.category.edit',compact('data'));
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
            'sms_receiver' => 'required',
            'category_name' => 'required',
        ]);

        DB::table('sms_category')->where('id',$id)->update([
            'sms_receiver'=> $request->sms_receiver,
            'category_name'=> $request->category_name,
        ]);

        return redirect()->route('cat.index')
                        ->with('success','Category updated successfully');
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