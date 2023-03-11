<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class VendorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
                $data = DB::table('vendor_type')->orderBy('id','DESC')->get();
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
            return view('enduser.vendor_type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('enduser.vendor_type.create');
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
            'name' => 'required',
        ]);


            DB::table('vendor_type')->insert([
            'name'=> $request->name,
            ]);

        return redirect()->route('vandor.type.index')
                        ->with('success','Type created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('vendor_type')->where('id',$id)->first();
        return view('enduser.vendor_type.edit',compact('data'));
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
            'name' => 'required',
        ]);

        DB::table('vendor_type')->where('id',$id)->update([
            'name'=> $request->name,
        ]);

        return redirect()->route('vandor.type.index')
                        ->with('success','Type updated successfully');
    }


}
