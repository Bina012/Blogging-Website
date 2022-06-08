@extends('dashboard::layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-10 ">
         <div class="card">
            <div class="card-header bg-info">
               <h6 class="text-white">Edit About us</h6>
            </div>
            <div class="card-body">
               <form method="post" action="{{route('about.update')}}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="slug" value="{{$item->slug}}" />
                  <div class="form-group">
                     <label>Title </label>
                     <input type="text" name="title" class="form-control" id="exampleFormControlInput1"autocomplete="off" value="{{$item->title}}" required/>
                     @error('title')
                     <span style="color: red;">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label>Description</label>
                     <textarea name="description" class="form-control summernote" autocomplete="off" >{!! $item->description !!}</textarea>
                     @error('description')
                     <span style="color: red;">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="form-group">
							<label>Main Image:</label>
							<input type="file" name="image"  class="form-control" autocomplete="off" onChange="mainThamUrl(this)"/><br>
							<img src="{{url('/uploads/images/about/'.$item->image)}}" id="mainThmb" height="90" width="90">
						</div>
                  <div class="form-group">
                     <label>Our Mission</label>
                     <textarea name="our_mission" class="form-control summernote" autocomplete="off" >{!! $item->our_mission !!}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Our Vision</label>
                     <textarea name="our_vision" class="form-control summernote" autocomplete="off" >{!! $item->our_vision !!}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Seo Title</label>
                     <input type="text" name="seo_title" class="form-control" autocomplete="off" value="{{$item->seo_title}}" />
                  </div>
                  <div class="form-group">
                     <label>Seo Description</label>
                     <textarea class="form-control" name="seo_description">{{$item->seo_description}}</textarea>
                     
                  </div>
                  <div class="form-group">
                     <label>Seo Keywords</label>
                     <input type="text" name="seo_keyword" class="form-control" autocomplete="off" value="{{$item->seo_keyword}}" />
                     
                  </div>

                  <div class="text-center" style="margin-top: 10px;">
                     <button type="submit" class="btn btn-success">Update About Us</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- summernote css/js -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
   $('.summernote').summernote({
   		height: 150
   	});
</script>
<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
{{-- @include('include.message') --}}
@endsection
