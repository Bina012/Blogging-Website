@extends('dashboard::layouts.app')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
        Edit Tag
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
                            Edit Tag
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('tag.update') }}" method="POST" enctype="multipart/form-data">
                           <div class="card-body">
                              <div class="mb-15">
                                 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right">
                                    Tag:</label>
                                    <div class="col-lg-8">
                                       @csrf
                                       <input type="text" name="tag"
                                          value="{{ $tags->tag }}"
                                          class="@error('tag') is-invalid @enderror form-control"
                                          placeholder="Enter tag here:" required />
                                       
                                        @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                 </div>        
                           </div>
                           <div class="card-footer">
                              <div class="row">
                                 <div class="col-lg-3"></div>
                                 <div class="col-lg-6">
                                    <input type="hidden" name="id" value="{{ $tags->id }}">
                                    <button type="submit" class="btn btn-success mr-2">Update
                                    tag</button>
                               
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
