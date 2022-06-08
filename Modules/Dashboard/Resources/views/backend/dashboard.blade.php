@extends('dashboard::layouts.app')

@section('title')
<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
    Dashboard </h5>
@endsection

@section('content')
<!--begin::Dashboard-->
<!--begin::Row-->
<div class="row">
    <div class="col-lg-6 col-xxl-8">
        <!--begin::Mixed Widget 1-->
        <h3>Recent Blog</h3>
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Total Views</th>
                    <th scope="col">Daily views</th>
                    <th scope="col">Weekly views</th>
                    <th scope="col">Monthly views</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog )
                      <tr>
                        <th scope="row">{{ $blog->blog_title }}</th>
                        <th scope="row">{{ $blog->count }}</th>

                        <th scope="row">
                          <?php $countdaily=0; ?>
                          @foreach($dailyCount as $dailycount)
                          @if($dailycount->blog_id == $blog->id)
                           <?php $countdaily++; ?>
                          @endif 
                          @endforeach
                          {{ $countdaily }}
                        </th>

                        <th scope="row">
                          <?php $count = 0; ?>
                          @foreach($weeklyCount as $weeklycount)
                            @if($weeklycount->blog_id == $blog->id) 
                            <?php $count++; ?>
                            @endif
                          @endforeach
                          {{ $count }}
                        </th>

                        <th scope="row">
                          <?php $counts = 0; ?>
                          @foreach($monthlyCount as $monthlycount)
                            @if($monthlycount->blog_id == $blog->id)
                            <?php $counts++; ?>
                            @endif
                          @endforeach  
                          {{ $count }}
                        </th>

                      </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
        <!--end::Mixed Widget 1-->
    </div>
</div>    
@endsection