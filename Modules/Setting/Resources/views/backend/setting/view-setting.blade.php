@extends('dashboard::layouts.app')

@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
    Setting </h5>
@endsection

@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Profile Personal Information-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">

                        <!--begin::User-->
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                <div class="symbol-label"
                                    style="background-image:url('{{ url("uploads/images/setting/".$setting['image'])}}')">
                                </div>
                            </div>
                            <div>
                                <p class="font-weight-bolder font-size-h5 text-dark-75">
                                    {{ $setting['company_name'] }}
                                </p>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">Email</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['email1'] }}</p>
                            </div>
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">Phone</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['contact1'] }}</p>
                            </div>
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">Address</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['address'] }}</p>
                            </div>
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">Google Map Iframe</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['google_location'] }}</p>
                            </div>
                            @if($setting['fax_no'])
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">Fax No.</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['fax_no'] }}</p>
                            </div>
                            @endif
                            @if($setting['po_box_no'])
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">P.O.Box No.</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['po_box_no'] }}</p>
                            </div>
                            @endif
                            @if( $setting['facebook_link'])
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">Facebook</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['facebook_link'] }}</p>
                            </div>
                            @endif
                            @if( $setting['insta_link'])
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">Instagram</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['insta_link'] }}</p>
                            </div>
                            @endif
                        
                            @if($setting['linkedin_link'])
                            <div class="bg-light p-3 align-items-center justify-content-between mb-5">
                                <div class="h6">LinkedIn</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['linkedin_link'] }}</p>
                            </div>
                            @endif
                            @if($setting['twitter_link'])
                            <div class="bg-light p-3 align-items-center justify-content-between mb-2">
                                <div class="h6">Twitter</div>
                                <p class="font-weight-boldest mb-0">{{ $setting['twitter_link']  }}</p>
                            </div>
                            @endif
                        </div>
                        <!--end::Contact-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Form-->
                    <form class="form" action="{{ route("cd-admin.updatesetting") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$setting->id}}" />
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Your Information</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Update your informaiton</span>
                        </div>
                        <div class="card-toolbar">
                            <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                        </div>
                    </div>
                    <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mb-6">Edit Your Info</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Logo</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="image-input image-input-outline" id="kt_profile_avatar"
                                        style="background-image: url(cd-assets/media/users/blank.png)">
                                        <div class="image-input-wrapper"
                                            style="background-image: url('{{asset("uploads/images/setting/".$setting['image'])}}')"></div>

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
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" name="company_name" type="text"
                                        value="{{ $setting['company_name'] }}" />
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                                </div>
                            </div>

                            <div id="kt_repeater_1">
                                <div class="row">

                                    <label class="col-xl-3 col-lg-3 col-form-label">Contact</label>
                                    <div  class="col-lg-9">
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-md-4">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <input class="form-control form-control-lg form-control-solid" name="email"
                                                        type="text"  value="{{ $setting['email1'] }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-lg form-control-solid" name="contact"
                                                    type="text" value="{{ $setting['contact1'] }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="address" type="text"
                                            value="{{ $setting['address'] }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Google Map Iframe</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="google_location" type="text"
                                            value="{{ $setting['google_location'] }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Fax No and P.O.Box</label>
                                <div class="col-lg-3 col-xl-3">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="fax_no" type="text"
                                            value="{{ $setting['fax_no'] }}" />
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="po_box_no" type="text"
                                            value="{{ $setting['po_box_no'] }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mt-10 mb-6">Edit Your Info</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Facebook</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="facebook_link" type="text"
                                            value="{{ $setting['facebook_link'] }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Instagram</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="insta_link" type="text"
                                            value="{{ $setting['insta_link'] }}" />
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">LinkedIn</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="linkedin_link" type="text"
                                            value="{{ $setting['linkedin_link'] }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Twitter</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input class="form-control form-control-lg form-control-solid" name="twitter_link" type="text"
                                            value="{{ $setting['twitter_link'] }}" />
                                    </div>
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