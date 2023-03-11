<?php

namespace App\Http\Controllers\Enduser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class VehicleTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            if ($request->ajax()) {
                $data = DB::table('vehicle_types')->orderBy('id','DESC')->get();
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
            return view('enduser.vehicle_type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('enduser.vehicle_type.create');
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


            DB::table('vehicle_types')->insert([
            'name'=> $request->name,
            ]);

        return redirect()->route('vehicle.type.index')
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
        $data = DB::table('vehicle_types')->where('id',$id)->first();
        return view('enduser.vehicle_type.edit',compact('data'));
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

        DB::table('vehicle_types')->where('id',$id)->update([
            'name'=> $request->name,
        ]);

        return redirect()->route('vehicle.type.index')
                        ->with('success','Type updated successfully');
    }

}
