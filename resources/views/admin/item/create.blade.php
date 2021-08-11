@extends('layouts.admintemplate')
@section('content')
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="mt-4">Item Create Form</h3>
			<div class="card mb-4 shadow ">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold d-inline-block">New Item</h6>
				</div>
				<div class="card-body">
					<form method="post" action="{{route('items.store',$code_no)}}" enctype="multipart/form-data">
						@csrf
						<div class="row mb-3">
							<label for="inputCodeno" class="col-sm-2 col-form-label">CodeNo</label>
							<div class="col-sm-10">
								<input type="text" name="code_no" class="form-control" id="inputCodeno" value="{{$code_no}}" disabled>
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputName" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-10">
								<input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}">
								@if ($errors->has('name'))
								<span class="text-danger">{{ $errors->first('name') }}</span>
								@endif
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
							<div class="col-sm-10">
								<input type="file" name="photo" class="form-control-file" id="inputPhoto">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
							<div class="col-sm-10">
								<input type="text" name="price" class="form-control" id="inputPrice" value="{{ old('price') }}">
								@if ($errors->has('price'))
								<span class="text-danger">{{ $errors->first('price') }}</span>
								@endif
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
							<div class="col-sm-10">
								<input type="text" name="discount" class="form-control" id="inputDiscount" value="{{ old('discount') }}">
								@if ($errors->has('discount'))
								<span class="text-danger">{{ $errors->first('discount') }}</span>
								@endif
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
							<div class="col-sm-10">
								<input type="text" name="description" class="form-control" id="inputDescription">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputCategory" class="col-sm-2 col-form-label">Category ID</label>
							<div class="col-sm-10">
								<select name="category_id" class="form-control" id="inputCategory">
									<optgroup label="Choose Category">
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</optgroup>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn my-submit-btn">Save</button>
								<a href="{{route('items.index')}}" style="margin-left: 5px;" class="btn my-btn">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
</div>
@endsection