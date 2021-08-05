@extends('layouts.admintemplate')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4 d-inline-block">Orders Test</h3>
            <div class="card mt-4 mb-4 shadow ">
                <h6 class="card-header">Search Order History</h6>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <th>Voucher No</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    {{Carbon\Carbon::parse($order->orderdate)->format('d-m-Y')}}
                                </td>
                                <td>{{$order->voucher_no}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    <a href="{{route('orders.show',$order->id)}}" class="btn my-btn">
                                        <i class="fas fa-info-circle"></i> Details
                                    </a>
                                    <a href="" data-id="{{route('orders.destroy',$order->id)}}" data-bs-toggle="modal" class="btn my-btn deletebtn">
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