@extends('layouts.admintemplate')
@section('content')
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="mt-4 d-inline-block">Invoice</h3>
			<div class="card mt-4 mb-4 shadow ">
				<div class="card-header">
					<div class="col-md-12 mb-3">
						<a href="" data-id="{{route('orders.order_confirm',$order->id)}}" data-bs-toggle="modal" class="btn my-btn confirm_btn" id="confirm">
                    		<i class="fas fa-check"></i> Confirm
                    	</a>
						<a href="" data-id="{{route('orders.order_cancel',$order->id)}}" data-bs-toggle="modal" class="btn my-btn cancel_btn" id="cancel">
                    		<i class="fas fa-times"></i> Cancel
                    	</a>
						<a href="{{route('orders.index')}}" class="btn my-icon-btn float-end">
			                <i class="fas fa-angle-double-left"></i>
			            </a>
					</div>
				</div>
				<div class="card-body">
					<div class="col-md-12">
						<div class="tile">
							<section class="invoice">
								<div class="row mb-4">
									<div class="col-6">
										{{-- <img src="logo" class="img-fluid w-25"> --}}
									</div>
									<div class="col-6">
										<h5 class="text-right"></h5>
									</div>
								</div>
								<div class="row invoice-info">
									<div class="col-4">From
									<address><strong>K&H Food Court</strong><br>7 Pyi Yeik Mon<br>Kamaryut Township<br>Yangon<br>Email: {{Auth::user()->email}}</address>
								</div>
								<div class="col-4">To
									<address>
										<strong>{{$order->user->name}}</strong>
										<br>{{$order->user->address}}
										<br>{{$order->user->ph_no}}
										<br>{{$order->user->email}}
									</address>
								</div>
								<div class="col-4">
									<b>Invoice #{{$order->voucher_no}}</b><br><br>
									<b>Order Date: {{date('F d, Y h:mA', strtotime($order->order_date))}}</b><br>
									<b>Total: {{number_format($order->total)}} Ks<br>
								</div>
							</div>
							<div class="row">
								<div class="col-12 table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Product</th>
												<th>Code No.</th>
												<th>Unit Price</th>
												<th>Qty</th>
												<th>Subtotal</th>
											</tr>
										</thead>
										<tbody>
											@foreach($order->items as $item)
											<tr>
												<td>{{$item->name}}</td>
												<td>{{$item->code_no}}</td>
												<td>
													@if($item->discount)
														<strike>
															{{number_format($item->price)}} Ks
														</strike>
														<span class="d-block">
															{{number_format($item->discount)}} Ks
														</span>
													@else
														{{number_format($item->price)}} Ks
													@endif
												</td>
												<td>{{$item->pivot->qty}}</td>
												<td>
													@if($item->discount)
													@php
														$dis_price = $item->discount * $item->pivot->qty;
													@endphp
														{{number_format($dis_price)}} Ks
													@else
													@php
														$price = $item->price * $item->pivot->qty;
													@endphp
														{{number_format($price)}} Ks
													@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</div>

<div class="modal fade" id="confirmModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="" id="confirmModalForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure to confirm the order?</h4>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="btnsubmit" value="Yes" class="btn my-btn">
                    <button type="button" class="btn my-btn" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="" id="cancelModalForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure to cancel the order?</h4>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="btnsubmit" value="Yes" class="btn my-btn">
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

            $('.confirm_btn').click(function(){
                var id = $(this).data('id');                
                $('#confirmModalForm').attr('action',id);
                $('#confirmModal').modal('show');
                

            })

            $('.cancel_btn').click(function(){
                var id = $(this).data('id');                
                $('#cancelModalForm').attr('action',id);
                $('#cancelModal').modal('show');
            })

            var status = {!! json_encode($order->status) !!};

            if(status == 1){
            	var element = document.getElementById("confirm");
				element.setAttribute("class", "disabled");
		    }
		    else if(status == 2){
		    	var confirm_element = document.getElementById("confirm");
		    	var cancel_element = document.getElementById("cancel");
		    	confirm_element.setAttribute("class", "disabled"); 
				cancel_element.setAttribute("class", "disabled"); 
		    }
        })
    </script>
@endsection