@extends('dashboard::layouts.app')
@section('title')
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
        Enquiry
    </h5>
@endsection
@section('content')
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Manage Enquiry
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
                    Enquiry Tables
                </h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered" id="enquiry_table" name= "enquiry_table">
                <thead>
                   <tr>
                    <tr>
                        <th><i class=""></i> SN</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                   </tr>
                </thead>
                <tbody>
                    @if (count($enquiries) > 0)
                        @foreach ($enquiries as $enquiry)
                            <input type="hidden" name="id" id="id" value="{{ $enquiry['id'] }}">
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $enquiry['email'] }}</td>
                                
                                <td>
                                    <form action="{{ route('enquiry.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $enquiry->id }}">
                                        <button type="submit"
                                            class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this item')">
                                            <i class="la la-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>Empty</td>
                        </tr>
                    @endif

                </tbody>
                
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
@endsection

