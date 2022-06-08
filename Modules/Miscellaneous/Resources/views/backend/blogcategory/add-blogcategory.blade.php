@extends('dashboard::layouts.app')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
        Add Blog Category
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
                            Add Blog Category
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('blogcategory.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                           <div class="mb-15">
                              <div class="form-group row">
                                 <label class="col-lg-3 col-form-label text-right">Name:</label>
                                 <div class="col-lg-8">
                                    @csrf
                                    <input type="text" name="category_name" value="{{ old('category_name') }}"
                                       class="@error('category_name') is-invalid @enderror form-control"
                                       placeholder="Enter category name here:" required/>
                                       @error('category_name')
                                       <span style="color: red;">{{ $message }}</span>
                                       @enderror
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-lg-3 col-form-label text-right">Blog Image:</label>
                                 <div class="col-lg-8">
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                       <div class="image-input-wrapper"
                                          style="background-image: url(cd-assets/media/users/100_1.jpg)"></div>
                                       <label
                                          class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                          data-action="change" data-toggle="tooltip" title=""
                                          data-original-title="Change avatar">
                                       <i class="fa fa-pen icon-sm text-muted"></i>
                                       <input type="file" class="@error('image') is-invalid @enderror"
                                          value="{{ old('image') ? old('image') : '' }}" name="image"
                                          accept=".png, .jpg, .jpeg" required />
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
                                 <label class="col-lg-3 col-form-label text-right">Image Alternative:</label>
                                 <div class="col-lg-8">
                                    <input type="text" name="image_alternative"
                                       value="{{ old('image_alternative') ? old('image_alternative') : '' }}"
                                       class="@error('image_alternative') is-invalid @enderror form-control"
                                       placeholder="Enter image alternative here" required />
                                    @error('image_alternative')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-lg-3 col-form-label text-right">Meta title:</label>
                                 <div class="col-lg-8">
                                    @csrf
                                    <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                       class="@error('meta_title') is-invalid @enderror form-control"
                                       placeholder="Enter meta title here:" required />
                                    @error('meta_title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-lg-3 col-form-label text-right">Meta Keywords:</label>
                                 <div class="col-lg-8">
                                     <input type="text" name="meta_keyword"
                                         value="{{ old('meta_keyword') ? old('meta_keyword') : '' }}"
                                         class="@error('meta_keyword') is-invalid @enderror form-control"
                                         placeholder="Enter keywords title here" required />
                                     @error('meta_keyword')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                              </div>   
                              <div class="form-group row">
                                 <label class="col-lg-3 col-form-label text-right">Meta description:</label>
                                 <div class="col-lg-8">
                                    @csrf
                                    <input type="text" name="meta_description" value="{{ old('meta_description') }}"
                                       class="@error('meta_description') is-invalid @enderror form-control"
                                       placeholder="Enter meta description here:" required />
                                       @error('meta_description')
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
                              <div class="col-lg-6">
                                 <button type="submit" class="btn btn-success mr-2">Add blog category</button>
                                 <button type="reset" class="btn btn-secondary">Cancel</button>
                              </div>
                           </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
@endsection