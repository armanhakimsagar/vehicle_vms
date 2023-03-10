<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Depertment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        if ($request->ajax()) {

            $data = Depertment::orderBy('depertments.id', 'DESC')->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id= $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#depertmentModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
                })
                ->editColumn('created_at', function($data){
                    $createdDate= Carbon::parse($data->created_at)->format('d M Y, h:i a');
                    return $createdDate;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);

        }
        return view('admin.depertment.depertment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.depertment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
    
            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            
            DB::beginTransaction();
            Depertment::create($request->all());
            DB::commit();
            return true;

        } catch (\Exception $e) {
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
        $dep = Depertment::find($id);

        return view('admin.depertment.edit', compact('dep'));
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
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
    
            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            
            DB::beginTransaction();
            $dep = Depertment::find($id);
            $dep->name = $request->name;
            $dep->save();
            DB::commit();
            return true;

        } catch (\Exception $e) {
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
        //
    }
}
