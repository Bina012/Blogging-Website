@extends('dashboard::layouts.app')

@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
    View Blog Category</h5>
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
                        View Blog Category Details
                    </h3>
                </div>
               
                <div class="card-toolbar">
                    <a href="{{route('blogcategory.edit',['id' => $blogCategorys->id])}}"><button type="submit" class="btn btn-sm btn-success font-weight-bold">
                        <i class="flaticon2-edit"></i> Edit Blog Category
                    </button></a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url("uploads/images/blogcategory/".$blogCategorys->image)}}" alt="" class="w-100 rounded">
                    </div>
                    
                </div>

            </div>

            

            <div class="card-footer justify-content-between">
                <!--begin::Section-->
                <div class="d-flex align-items-center mb-5">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">

                        
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Category Name</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{$blogCategorys->category_name}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>

                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Image Alternative</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{$blogCategorys->image_alternative}}
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
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Meta Title</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{$blogCategorys->meta_title}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Meta Keyword</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{$blogCategorys->meta_keyword}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <div class="d-flex align-items-center">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">Meta Description</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            {{$blogCategorys->meta_description}}
                        </p>
                        <!--end::Desc-->
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Section-->

            </div>
        </div>
    </div>
</div>

@endsection