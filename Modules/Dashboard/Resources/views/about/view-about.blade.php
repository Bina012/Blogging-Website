{{-- @extends('dashboard::layouts.app')

@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
    About Us </h5>
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
                        About us page title
                    </h3>
                </div>
                <form class="form">
                    <div class="mt-5 row">
                        <label class="col-6 col-form-label">Status:</label>
                        <div class="col-6">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" checked="checked" name="select" />
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </form>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-sm btn-success font-weight-bold" data-toggle="modal"
                        data-target="#exampleModalSizeXl">
                        <i class="flaticon2-edit"></i> Edit About Us
                    </button>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <img src="{{url('cd-assets/media/stock-600x400/img-6.jpg')}}" alt="" class="w-100 rounded">
                    </div>
                    <div class="col-md-8">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, dolor qui quasi voluptate
                            a
                            cupiditate deserunt ullam dolores soluta facilis, expedita aperiam reiciendis consequatur
                            assumenda!
                            Ipsa beatae laudantium eaque debitis? Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Dolorem voluptates cumque laudantium. Ullam aliquid molestias eveniet voluptatibus soluta
                            omnis
                            saepe dolor est quasi ipsa iusto, fugit aspernatur, amet, asperiores repellat. Lorem ipsum
                            dolor sit
                            amet consectetur adipisicing elit. Repellat, nihil optio voluptates laboriosam repellendus
                            id
                            blanditiis voluptatibus explicabo rem, dolore cupiditate harum neque modi deserunt ducimus,
                            quo
                            dolorum sit vel? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem quasi
                            cupiditate
                            aperiam harum repellat. Delectus facilis eos, sed aspernatur praesentium nobis placeat
                            suscipit
                            voluptas obcaecati ipsam explicabo possimus eaque dolorum. Lorem ipsum dolor sit amet
                            consectetur
                            adipisicing elit. Aspernatur autem consectetur iure, ea placeat aperiam magni aliquam,
                            voluptas
                            alias odio eum reiciendis fuga eaque mollitia molestiae ullam cumque, dolorem illum! Lorem
                            ipsum
                            dolor sit amet consectetur, adipisicing elit. Cumque veritatis perferendis et ab autem
                            tenetur, amet
                            quod officia harum molestiae recusandae odio doloremque alias quis repellendus esse
                            voluptate dicta
                            sapiente?</p>
                    </div>
                </div>

            </div>
            <div class="card-footer justify-content-between">
                <!--begin::Section-->
                <div class="d-flex align-items-center mb-5">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1">
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">SEO Title</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet animi iure incidunt tempore
                            unde inventore nam ipsam, iusto officiis cumque corrupti ex quae. Aperiam deleniti
                            doloremque officiis iure, at corrupti.
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
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">SEO Keywords</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet animi iure incidunt tempore
                            unde inventore nam ipsam, iusto officiis cumque corrupti ex quae. Aperiam deleniti
                            doloremque officiis iure, at corrupti.
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
                        <h4 class="font-weight-bold text-dark-75 font-size-lg">SEO Description</h4>

                        <!--begin::Desc-->
                        <p class="text-dark-50 m-0 font-weight-normal">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet animi iure incidunt tempore
                            unde inventore nam ipsam, iusto officiis cumque corrupti ex quae. Aperiam deleniti
                            doloremque officiis iure, at corrupti.
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



<!--begin::Modal-->
<div class="modal fade" id="exampleModalSizeXl" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit about us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="card-body">
                        <div class="mb-15">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">About Title:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Enter page title here" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">Banner Image:</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" id="kt_image_1">
                                        <div class="image-input-wrapper"
                                            style="background-image: url(cd-assets/media/users/100_1.jpg)"></div>

                                        <label
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="change" data-toggle="tooltip" title=""
                                            data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>

                                        <span
                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                            data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">About Detail:</label>
                                <div class="col-lg-8">
                                    <div class="summernote" id="kt_summernote_1"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">Seo Title:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Enter seo title here" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">Seo Keywords:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Enter keywords title here" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-right">Seo Description:</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" id="exampleTextarea" rows="3"
                                        placeholder="Enter seo description here"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->


<!-- <script>
    var avatar1 = new KTImageInput('kt_image_1');
</script> -->
@endsection --}}