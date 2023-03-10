
@extends('layouts.enduser.dashboard.master')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Assign Permission</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                   
                    <h3 class="kt-portlet__head-title">
                    Assign  Permission 
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

               



            {!! Form::open(array('route' => 'assign-permit.store','method'=>'POST')) !!}
<div class="row">


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Department:</strong>
            <select name="name" class="form-control kt-select2-2">
                <option value="">Select Department</option>
                @foreach($department as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach   
            </select>
     
            @error('name')
             <small id="role-error" class="text-danger" for="role">Please Select Department</small>
           @enderror
     
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Designation:</strong>
            <select id="designation" class="form-control kt-select2-2">
               @foreach($designation as $designations)
                  <option value="{{$designations->id}}">{{$designations->designation_name}}</option>
                @endforeach   
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="card">
          @error('permission')
             <small id="role-error" class="text-danger" for="role">{{$message}}</small>
           @enderror
        <div class="card-body">
        <strong>Permission:</strong>
          <table class="table table-bordered">
            <tr class="bg-primary">
                <th>Resource Name</th>
                <th>List</th>
                <th>Create</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
               @foreach($resourcePermission as $value)
                <tr>
                    <td>
                        {{ $value->resource}}

                         @php 
                           $data_sub=DB::table('permissions')->where('resource',$value->resource)->where('parent_id','!=',0)->get();
                         @endphp 

                       @if($data_sub->count()>0)
										        <ul>
                              @foreach($data_sub as $sub)
                                 <li style="list-style:none">{{ Form::checkbox('permission[]', $sub->id, false, array('class' => 'name')) }} {{$sub->name}} </li>
                              @endforeach 
                            </ul>
                       @endif 
                    </td>
                    @php 
                      $data=DB::table('permissions')->where('resource',$value->resource)->where('parent_id',0)->get();
                    @endphp 
                  @foreach($data as $permit)
                   <td>{{ Form::checkbox('permission[]', $permit->id, false, array('class' => 'name')) }}</td>
                  @endforeach 
                </tr>
                @endforeach
            </table>
        </div>
      </div>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
 
        <button type="reset" id="cancle" class="btn btn-danger btn-sm float-left">Cancel</button>

        <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">

    </div>


 




</div>
{!! Form::close() !!}











            </div>
        </div>
    </div>
<!-- end:: Content -->
</div>






@endsection
