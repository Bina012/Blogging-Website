@extends('dashboard::layouts.app')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
        Blog
    </h5>
@endsection
@section('content')
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Manage Blog
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
                    Blog Tables
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ url('cd-admin/add-blog') }}">
                    <button type="submit" class="btn btn-sm btn-success font-weight-bold">
                        <i class="flaticon2-add"></i> Add blog
                    </button>
                </a>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered " id="#">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Blog Title</th>
                        <th>Blog Category</th>
                        {{-- <th>Blog Image</th> --}}
                        
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->blogCategory->category_name }}</td>
                                {{-- <td><img src='{{ url('uploads/images/blog/' . $blog->image) }}' height="50px"
                                        width="50px">
                                </td> --}}
                                
                                <td>
                                    @if ($blog->blog_status == 1)
                                        <span class="badge  badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge  badge-pill badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($blog->blog_feature == 0)
                                        <span class="badge  badge-pill">Not Featured</span>
                                    @else
                                        <span class="badge  badge-pill badge-success">Featured</span>
                                    @endif
                                </td>
                                <td>
                                    <span>
                                        <a href="{{ route('blog.view', ['id' => $blog->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" title="view"><i
                                                class="la la-eye"></i></a>
                                    </span>
                                    <span style="display: inline-block;">
                                        <a href="{{ route('blog.edit', ['id' => $blog->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"><i
                                                class="la la-edit"></i></a>
                                    </span>
                                    <span style="display: inline-block;">
                                        <form action="{{ route('blog.blogStatus') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $blog->id }}">
                                            @if ($blog->blog_status == 1)
                                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Status"
                                                    onClick="return confirm('Are you sure want to inactive Blog?')"><i
                                                        class="fa fa-solid fa-angle-up"></i></button>
                                            @else
                                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Status"
                                                    onClick="return confirm('Are you sure want to active Blog?')"><i
                                                        class="fa fa-solid fa-angle-down"></i></button>
                                            @endif
                                        </form>
                                    </span>
                                    <span style="display: inline-block;">
                                        <form action="{{ route('blog.blogFeature') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $blog->id }}">
                                            @if ($blog->blog_feature == 0)
                                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="feature"
                                                    onClick="return confirm('Are you sure want to feature Blog?')"><i
                                                        class="fa fa-solid fa-angle-up"></i></button>
                                            @else
                                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="feature"
                                                    onClick="return confirm('Are you sure want to uneature Blog?')"><i
                                                        class="fa fa-solid fa-check"></i></button>
                                            @endif
                                        </form>
                                    </span>
                                    <span style="display: inline-block;">
                                        <form action="{{ route('blog.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $blog->id }}">
                                            <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete"
                                                onClick="return confirm('Are you sure want to delete Blog?')"><i
                                                    class="la la-trash"></i></button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No Blog Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection
