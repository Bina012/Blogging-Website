@extends('dashboard::layouts.app')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
        Add Blog
    </h5>
@endsection

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-document text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Add Blog
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ url('cd-admin/store-blog') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="mb-15">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right">Blog Title:</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="blog_title"
                                            value="{{ old('blog_title') ? old('blog_title') : '' }}"
                                            class="@error('blog_title') is-invalid @enderror form-control"
                                            placeholder="Enter blog title here" required />
                                        @error('blog_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right">Blog Category:</label>
                                    <div class="col-lg-8">
                                        <select name="blog_category"
                                            class="@error('blog_category') is-invalid @enderror  selectpicker" data-size="7"
                                            data-live-search="true" required>
                                            <option value="" selected="" disabled="">Select BLog</option>
                                            @foreach ($blogCategorys as $blogCategory)
                                                <option value="{{ $blogCategory->id }}"
                                                    {{ old('blog_category') == $blogCategory->id ? 'selected' : '' }}>
                                                    {{ $blogCategory->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('blog_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
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
                                    <label class="col-lg-3 col-form-label text-right">Description Detail:</label>
                                    <div class="col-lg-8">
                                        <textarea class="@error('blog_description') is-invalid @enderror summernote" name="blog_description"
                                            id="kt_summernote_1"
                                            required>{{ old('blog_description') ? old('blog_description') : '' }}</textarea>
                                        @error('blog_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right">Tag:</label>
                                    <div class="col-lg-8">
                                        
                                    <select class="js-example-basic-multiple form-control"  name="tags[]" multiple="multiple">
                                        @foreach($tags as $tag)
                                        <option value="{{ $tag['id'] }}">{{ $tag['tag'] }}</option>
                                        @endforeach
                                    </select>
                                        @error('tag')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right">Meta Title:</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="meta_title"
                                            value="{{ old('meta_title') ? old('meta_title') : '' }}"
                                            class="@error('meta_title') is-invalid @enderror form-control"
                                            placeholder="Enter meta title here" required />
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
                                            placeholder="Enter keywords title here"  />
                                        @error('meta_keyword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right">Meta Description:</label>
                                    <div class="col-lg-8">
                                        <textarea class="@error('meta_description') is-invalid @enderror form-control" name="meta_description"
                                            id="exampleTextarea" rows="3" placeholder="Enter meta description here"
                                            >{{ old('meta_description') ? old('meta_description') : '' }}</textarea>
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
                                <div class="col-lg-6"></div>
                                <div class="col-lg-3">
                                    @csrf
                                    <button type="submit" class="btn btn-success mr-2">Add Blog</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
