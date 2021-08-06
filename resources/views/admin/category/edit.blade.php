@extends('layouts.admintemplate')
@section('content')
	<div id="layoutSidenav_content">
		<main>
            <div class="container-fluid px-4">
            	<h3 class="mt-4">Category Edit Form</h3>
            	<div class="card mb-4 shadow ">
                    <div class="card-header">
                    	<h6 class="m-0 font-weight-bold d-inline-block">Edit Category</h6>     	
                    </div>

                    <div class="card-body">
                    	<form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
                    		@csrf
                    		@method('PUT')
                    		<div class="row mb-3">
						    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
						    <div class="col-sm-10">
						    	<input type="text" name="name" class="form-control" id="inputName" value="{{$category->name}}">
						    	@if ($errors->has('name'))
				                    <span class="text-danger">{{ $errors->first('name') }}</span>
				                @endif
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
						    <div class="col-sm-10">
						    	<input type="file" name="photo" class="form-control-file" id="inputPhoto">
						    	<img src="{{$category->photo}}" alt="photo" class="w-25">
						    	@if ($errors->has('photo'))
				                    <span class="text-danger">{{ $errors->first('photo') }}</span>
				                @endif
						    </div>
						  </div>
						  <div class="row mb-3">
			                <div class="col-sm-10 offset-sm-2">
			                  <button type="submit" class="btn my-submit-btn">Save</button>
			                  <a href="{{route('categories.index')}}" style="margin-left: 5px;" class="btn my-btn">Cancel</a>
			                </div>
			              </div>  
						</form>
                    </div>
                </div>
            </div>
        </main>
	</div>
@endsection