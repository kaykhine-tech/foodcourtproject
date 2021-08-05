@extends('layouts.admintemplate')
@section('content')
	<div id="layoutSidenav_content">
		<main>
            <div class="container-fluid px-4">          	
                <div class="card mt-4 mb-4 shadow ">
                    <div class="card-header">
                        <h3 class="m-0 font-weight-bold d-inline-block">Categories</h3>
                    	<a href="{{route('categories.create')}}" class="btn my-submit-btn float-end">Add Category</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                	<th>No.</th>
                                    <th>Name</th>
                                    <th>Number of Items</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                	<th>No.</th>
                                    <th>Name</th>
                                    <th>Number of Items</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>

                            	@php
                            		$i = 1;
                            	@endphp

                            	@foreach($categories as $category)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <img src="{{asset($category->photo)}}" class="my-img">
                                        {{$category->name}}
                                    </td>
                                    <td>{{count($category->items)}}</td>
                                    <td>
                                    	<a href="{{route('categories.edit',$category->id)}}" class="btn my-btn">
                                    		<i class="far fa-edit"></i> Edit
                                    	</a>

                                    	<a href="" data-id="{{route('categories.destroy',$category->id)}}" data-bs-toggle="modal" class="btn my-btn deletebtn">
                                    		<i class="fas fa-trash-alt"></i> Delete
                                    	</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
	</div>
    
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="" id="deleteModalForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h4 class="modal-title">Are you sure to delete?</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="btnsubmit" value="Delete" class="btn my-btn">
                        <button type="button" class="btn my-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.deletebtn').click(function(){
                var id = $(this).data('id');
                // console.log(id);
                $('#deleteModalForm').attr('action',id);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection