@extends('dashboard::layouts.app')
@section('content')
    <section id="basic-examples">
        <div class="row match-height">
            <div class="col-xl-12 col-md-12 col-sm-12">
                @if (count($items) > 0)
                    @foreach ($items as $item)
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('about.edit') }}" method="GET" style="text-align: center">
                                        <input type="hidden" name="slug" value="{{ $item->slug }}" />
                                        <div class="card-toolbar">
                                            <button type="submit" class="btn btn-success mr-2">Edit</button>
                                        </div>
                                    </form>
                                    <h5 class="mt-1">{{ $item->title }}</h5>
                                    <?php $about_description = strip_tags($item->description);  ?>
                                    <p class="card-text  mb-0">{{ $about_description }}</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Our Mission: </h4>
                                            <p class="card-text  mb-0">{!! $item->our_mission !!}</p>
                                        </div>
                                        <div class="col-md-6">
                                        <h4>Our Vision: </h4>
                                            <p class="card-text  mb-0"> {!! $item->our_vision !!}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Seo: </h4>
                                            <p class="card-text  mb-0"><b>Seo Title:</b> {{ $item->seo_title }}</p>
                                            <p class="card-text  mb-0"><b>Seo Description:</b> {{ Str::limit($item->seo_description,100) }}...</p>
                                            <p class="card-text  mb-0"><b>Seo Keywords:</b> {{ $item->seo_keyword }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Banner Image: </h4>
                                            <img src="{{ asset('uploads/images/about/'.$item->image) }}" alt="{{ $item->title }}" width="80%" height="80%">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <tr>
                        <td>Empty</td>
                    </tr>
                @endif
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#usertable").on('change', '.change_status', function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                var me = this;
                $.ajax({
                    url: "/cd-admin/changestatus",
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    success: function(result) {

                        if (result.id == null) {
                            toastr.error('Failed to Update Status');
                        } else {
                            toastr.success('Status Updated successfully');
                            if (result.status == "inactive") {
                                $(me).removeClass('btn-success').addClass("btn-danger");
                            } else {
                                $(me).removeClass('btn-danger').addClass("btn-success");
                            }
                        }
                    },
                });


            })
        })
    </script>

@endsection
