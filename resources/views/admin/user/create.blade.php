@extends('layouts.admintemplate')
@section('content')
	<div id="layoutSidenav_content">
		<main>
            <div class="container-fluid px-4">
            	<h3 class="mt-4">User Create Form</h3>
            	<div class="card mb-4 shadow ">
                    <div class="card-header">
                    	<h6 class="m-0 font-weight-bold d-inline-block">New User</h6>
                    </div>

                    <div class="card-body">
                    	<form method="post" action="{{route('users.store')}}" >
                    		@csrf
                    		<div class="row mb-3">
						    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
						    <div class="col-sm-10">
						    	<input type="text" name="name" id="inputName" value="{{ old('name') }}">
						    	@if ($errors->has('name'))
				                    <span class="text-danger">{{ $errors->first('name') }}</span>
				                @endif
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						    	<input type="email" name="email" id="inputEmail" value="{{ old('email') }}">
						    	@if ($errors->has('email'))
				                    <span class="text-danger">{{ $errors->first('email') }}</span>
				                @endif
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label for="inputContact" class="col-sm-2 col-form-label">Contact</label>
						    <div class="col-sm-10">
						    	<input type="text" name="ph_no" id="inputContact" value="{{ old('ph_no') }}">
						    	@if ($errors->has('ph_no'))
				                    <span class="text-danger">{{ $errors->first('ph_no') }}</span>
				                @endif
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
						    <div class="col-sm-10">
						    	<input type="password" name="password" id="inputPassword" value="{{ old('password') }}">
						    	@if ($errors->has('password'))
				                    <span class="text-danger">{{ $errors->first('password') }}</span>
				                @endif
						    </div>
						  </div>
						  <div class="row mb-3">
						    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
						    <div class="col-sm-10">
						    	<input type="address" name="address" id="inputAddress" value="{{ old('address') }}">
						    	@if ($errors->has('address'))
				                    <span class="text-danger">{{ $errors->first('address') }}</span>
				                @endif
						    </div>
						  </div>
						  <div class="row mb-3">
			                <div class="col-sm-10 offset-sm-2">
			                  <button type="submit" class="btn my-submit-btn">Save</button>
			                  <a href="{{route('users.index')}}" style="margin-left: 5px;" class="btn my-btn">Cancel</a>
			                </div>
			              </div>  
						</form>
                    </div>
                </div>
            </div>
        </main>
	</div>
@endsection