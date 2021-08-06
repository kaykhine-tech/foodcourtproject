@extends('layouts.admintemplate')
@section('content')
	<div id="layoutSidenav_content">
		<main>
            <div class="container-fluid px-4">           	
                <div class="card mt-4 mb-4 shadow ">
                    <div class="card-header">
                        <h3 class="m-0 font-weight-bold d-inline-block">Users</h3>
                    	<a href="{{route('users.create')}}" class="btn my-submit-btn float-end">Add User</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                	<th>No.</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                	<th>No.</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>

                            	@php
                            		$i = 1;
                            	@endphp

                            	@foreach($users as $user)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>                                        
                                        {{$user->name}}
                                    </td>
                                    <td>{{$user->ph_no}}</td>
                                    <td>
                                    	<a href="" data-id="{{route('users.destroy',$user->id)}}" data-bs-toggle="modal" class="btn my-btn deletebtn">
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