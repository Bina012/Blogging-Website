@extends('dashboard::layouts.app')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
        Tag
    </h5>
@endsection
@section('content')
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Manage Tag
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
                    Tag Tables
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ url('cd-admin/add-tag') }}">
                    <button type="submit" class="btn btn-sm btn-success font-weight-bold">
                        <i class="flaticon2-add"></i> Add tag
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
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tags) > 0)
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tag->tag }}</td>
                                <td>
                                    <span style="display: inline-block;">
                                        <a href="{{ route('tag.edit', ['id' => $tag->id]) }}"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"><i
                                                class="la la-edit"></i></a>
                                    </span>
                                    <span style="display: inline-block;">
                                        <form action="{{ route('tag.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $tag->id }}">
                                            <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete"
                                                onClick="return confirm('Are you sure want to delete Tag?')"><i
                                                    class="la la-trash"></i></button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No Tag Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection
