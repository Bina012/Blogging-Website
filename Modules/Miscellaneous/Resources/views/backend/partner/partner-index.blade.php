@extends('dashboard::layouts.app')
@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
   Partners 
</h5>
@endsection
@section('content')
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
   <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-2">
         <!--begin::Page Title-->
         <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Manage Partner
         </h5>
         <!--end::Page Title-->
      </div>
      <!--end::Info-->
   </div>
</div>
<div class="card card-custom gutter-b">
   <div class="card-header flex-wrap py-3">
      <div class="card-title">
         <h3 class="card-label">
            Partner Tables
         </h3>
      </div>
      <div class="card-toolbar">
         <a href="{{route('partners.add')}}"><button type="submit" class="btn btn-sm btn-success font-weight-bold">
         <i class="flaticon2-add"></i> Add Partner
         </button></a>
      </div>
   </div>
   <div class="card-body">
      <!--begin: Datatable-->
      <table class="table table-bordered " id="#">
         <thead>
            <tr>
               <th></th>
               <th>Company Name</th>
               <th>Image</th>
               <th>Contact No.</th>
               <th>address</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if(count($partners)>0)
            @foreach($partners as $partner)
            <tr>
               <td></td>
               <td>{{$partner->company_name}}</td>
               <td><img src='{{ url("uploads/images/partner/".$partner->image)}}' height="50px" width="50px"></td>
               <td>{{$partner->phone_number}}</td>
               <td>{{$partner->address}}</td>
               <td>
                  @if($partner->status==1)
                  <span class="badge  badge-pill badge-success">Active</span>
                  @else
                  <span class="badge  badge-pill badge-danger">Inactive</span>
                  @endif
               </td>
               <td>
                  
                  <span style="display: inline-block;">
                  <a href="{{route('partners.edit',['id' => $partner->id])}}"  class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"><i class="la la-edit"></i></a>
                  </span>
                  <span style="display: inline-block;">
                     <form action="#" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$partner->id}}">
                        @if($partner->status==1)
                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Status" onClick="return confirm('Are you sure want to inactive Blog?')"><i class="fa fa-solid fa-angle-up"></i></button>
                        @else
                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Status" onClick="return confirm('Are you sure want to active Blog?')"><i class="fa fa-solid fa-angle-down"></i></button>
                        @endif
                     </form>
                  </span>
                  <span style="display: inline-block;">
                     <form action="{{route('partners.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$partner->id}}">
                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete" onClick="return confirm('Are you sure want to delete partner?')"><i class="la la-trash"></i></button>
                     </form>
                  </span>
               </td>
            </tr>
            @endforeach
            @else
            <tr>
               <td colspan="4">No Partner  Found</td>
            </tr>
            @endif
         </tbody>
      </table>
      <!--end: Datatable-->
   </div>
</div>
@endsection
