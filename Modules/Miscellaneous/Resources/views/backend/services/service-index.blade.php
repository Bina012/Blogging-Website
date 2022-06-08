@extends('dashboard::layouts.app')
@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
   Service 
</h5>
@endsection
@section('content')
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
   <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-2">
         <!--begin::Page Title-->
         <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Manage Service
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
            Service Tables
         </h3>
      </div>
      <div class="card-toolbar">
         <a href="{{route('services.add')}}"><button type="submit" class="btn btn-sm btn-success font-weight-bold">
         <i class="flaticon2-add"></i> Add Services
         </button></a>
      </div>
   </div>
   <div class="card-body">
      <!--begin: Datatable-->
      <table class="table table-bordered " id="#">
         <thead>
            <tr>
               <th></th>
               <th>Service Image</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if(count($services)>0)
            @foreach($services as $service)
            <tr>
               <td></td>
               <td><img src='{{ url("uploads/images/service/".$service->image)}}' height="50px" width="50px"></td>
               <td>
                  
                  <span style="display: inline-block;">
                  <a href="{{route('services.edit',['id' => $service->id])}}"  class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"><i class="la la-edit"></i></a>
                  </span>
                  
                  <span style="display: inline-block;">
                     <form action="{{route('services.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$service->id}}">
                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete" onClick="return confirm('Are you sure want to delete Service Image?')"><i class="la la-trash"></i></button>
                     </form>
                  </span>
               </td>
            </tr>
            @endforeach
            @else
            <tr>
               <td colspan="4">No Service  Found</td>
            </tr>
            @endif
         </tbody>
      </table>
      <!--end: Datatable-->
   </div>
</div>
@endsection
