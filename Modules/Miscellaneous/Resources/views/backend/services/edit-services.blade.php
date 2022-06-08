@extends('dashboard::layouts.app')
@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
   Service 
</h5>
@endsection
@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
   <!--begin::Container-->
   <div class=" container ">
      <!--begin::Profile Personal Information-->
      <div class="d-flex flex-row">
         <!--begin::Content-->
         <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
               <!--begin::Form-->
               <form class="form" action="{{route('services.update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!--begin::Header-->
                  <div class="card-header py-3">
                     <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Service</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Why us ?</span>
                     </div>
                     <div class="card-toolbar">
                        <button type="submit" class="btn btn-success mr-2">Update Image</button>
                        <input type="hidden" name="id" value="{{$service->id}}">
                     </div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">
                     <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                           <h5 class="font-weight-bold mb-6">Update Services Image</h5>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Service Image</label>
                        <div class="col-lg-9 col-xl-6">
                           <div class="image-input image-input-outline" id="kt_profile_avatar"
                           style="background-image:url('{{ url("uploads/images/service/".$service->image)}}')">
                           <div class="image-input-wrapper"
                              style=""></div>
                           <label
                              class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                              data-action="change" data-toggle="tooltip" title=""
                              data-original-title="Change Logo">
                           <i class="fa fa-pen icon-sm text-muted"></i>
                           <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                           <input type="hidden" name="profile_avatar_remove" />
                           </label>
                           <span
                              class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                              data-action="cancel" data-toggle="tooltip" title="Cancel Logo">
                           <i class="ki ki-bold-close icon-xs text-muted"></i>
                           </span>
                           <span
                              class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                              data-action="remove" data-toggle="tooltip" title="Remove Logo">
                           <i class="ki ki-bold-close icon-xs text-muted"></i>
                           </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        <br>
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                  </div>
            </div>
            <!--end::Body-->
            </form>
            <!--end::Form-->
         </div>
      </div>
      <!--end::Content-->
   </div>
   <!--end::Profile Personal Information-->
</div>
<!--end::Container-->
</div>
<!--end::Entry-->
@endsection
