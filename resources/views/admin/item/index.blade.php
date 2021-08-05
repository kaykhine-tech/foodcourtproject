@extends('layouts.admintemplate')
@section('content')
	<div id="layoutSidenav_content">
		<main>
            <div class="container-fluid px-4">           	
                <div class="card mt-4 mb-4 shadow ">
                    <div class="card-header">
                        <h3 class="m-0 font-weight-bold d-inline-block">Items</h3>
                    	<a href="{{route('items.create')}}" class="btn my-submit-btn float-end">Add Item</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                	<th>No.</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                	<th>No.</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>

                            	@php
                            		$i = 1;
                            	@endphp

                            	@foreach($items as $item)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <img src="{{asset($item->photo)}}" class="my-img">
                                        {{$item->name}}
                                    </td>
                                    <td>{{$item->category->name}}</td>
                                    <td>
                                      @if($item->discount)
                                      <strike>{{$item->price}} Ks</strike> 
                                      <span class="d-block">{{$item->discount}} Ks</span>
                                      @else
                                      {{$item->price}} Ks
                                      @endif                  
                                    </td>
                                    <td>
                                    	<a href="{{route('items.edit',$item->id)}}" class="btn my-btn">
                                    		<i class="far fa-edit"></i> Edit
                                    	</a>

                                    	<a href="" data-id="{{route('items.destroy',$item->id)}}" data-bs-toggle="modal" class="btn my-btn deletebtn">
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