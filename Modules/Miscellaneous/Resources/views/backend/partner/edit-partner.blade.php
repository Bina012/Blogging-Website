@extends('dashboard::layouts.app')
@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
   Edit Partners
</h5>
@endsection
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card card-custom">
         <div class="card-header">
            <div class="card-title">
               <span class="card-icon">
               <i class="flaticon2-document text-primary"></i>
               </span>
               <h3 class="card-label">
                  Add Partner
               </h3>
            </div>
         </div>
         <div class="card-body">
            <form class="form" action="{{route('partners.update')}}" method="POST" enctype="multipart/form-data" >
               <div class="card-body">
                  <div class="mb-15">
                     <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Company Name:</label>
                        <div class="col-lg-8">
                           <input type="text" name="company_name" value="{{$partner->company_name}}"  class="@error('company_name') is-invalid @enderror form-control" placeholder="Enter company name:" required/>
                           @error('company_name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Company Logo:</label>
                        <div class="col-lg-8">
                           <div class="image-input image-input-outline" id="kt_image_1">
                              <div class="image-input-wrapper"
                                 style="background-image:url('{{ url("uploads/images/partner/".$partner->image)}}')"></div>
                              <label
                                 class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                 data-action="change" data-toggle="tooltip" title=""
                                 data-original-title="Change avatar">
                              <i class="fa fa-pen icon-sm text-muted"></i>
                              <input type="file" class="@error('image') is-invalid @enderror" value="{{old('image')? old('image') : ''}}" name="image" accept=".png, .jpg, .jpeg" required/>
                              <input type="hidden" name="profile_avatar_remove" />
                              </label>
                              <span
                                 class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                 data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                              <i class="ki ki-bold-close icon-xs text-muted"></i>
                              </span>
                           </div>
                           @error('image')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Contact Number:</label>
                        <div class="col-lg-8">
                           <input type="number" name="phone_number" value="{{$partner->phone_number}}" class="@error('blog_description') is-invalid @enderror form-control" placeholder="Enter contact number/tel:" required/>
                           @error('phone_number')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Address:</label>
                        <div class="col-lg-8">
                           <textarea class="@error('address') is-invalid @enderror summernote" name="address" id="kt_summernote_1">{{$partner->address}}</textarea>
                           @error('address')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <div class="row">
                     <div class="col-lg-3"></div>
                     <div class="col-lg-6"></div>
                     <div class="col-lg-3">
                        @csrf
                        <input type="hidden" name="id" value="{{$partner->id}}" />
                        <button type="submit" class="btn btn-success mr-2">Update Partner</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
