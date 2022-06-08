@extends('dashboard::layouts.app')

@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
    View Blog </h5>
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
                        View Blog Details
                    </h3>
                </div>
               
                <div class="card-toolbar">
                    <a href="{{route('blog.edit',['id' => $blog->id])}}"><button type="submit" class="btn btn-sm btn-success font-weight-bold">
                        <i class="flaticon2-edit"></i> Edit Blog
                    </button></a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url("uploads/images/blog/".$blog->image)}}" alt="" class="w-100 rounded">
                    </div>
                    
                </div>

            </div>
            <div class="card-footer justify-content-between">
                <!--begin::Section-->
                <div class="d-flex align-items-center mb-5">
                    <!--begin::Text-->
                    
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Blog Title</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{ $blog->blog_title }}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <div class="d-flex align-items-center mb-5">
                    <!--begin::Text-->
                    
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Blog Description</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {!! $blog->blog_description !!}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <div class="d-flex align-items-center mb-5">
                    <!--begin::Text-->
                    
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Meta Title</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{$blog->meta_title}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Section-->

                <!--begin::Section-->
                <div class="d-flex align-items-center mb-5">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Meta Keywords</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{str_replace(' ', ',',$blog->meta_keyword)}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Section-->
                

                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Meta Description</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{$blog->meta_description}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Tags</h4>

                        <!--begin::Desc-->

                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{-- @if(count($blog)>0) --}}
                            @foreach($blog->blogTags as $blogTag)
                                {{ $blogTag->tag->tag }}@if(!$loop->last),@endif
                            @endforeach
                            {{-- @else
                                <p>No tags Found</p>
                            @endif --}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection