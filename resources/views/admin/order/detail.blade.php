@extends('layouts.admintemplate')
@section('content')
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="mt-4 d-inline-block">Invoice</h3>
			<div class="card mt-4 mb-4 shadow ">
				<div class="card-header">
					<div class="col-md-12 mb-3">
						<form class="d-inline-block" onsubmit="return confirm('Are you sure to CONFIRM?')" action="#" method="POST">
							<input type="hidden" name="id" value="">
							<input type="hidden" name="status" value="1">
							<button class="btn btn-outline-info">
							<i class="icofont-tick-mark">Confirm</i>
							</button>
						</form>
						<form class="d-inline-block" onsubmit="return confirm('Are you sure to DELIVER?')" action="#" method="POST">
							<input type="hidden" name="id" value="">
							<input type="hidden" name="status" value="2">
							<button class="btn btn-outline-dark">
							<i class="icofont-delivery-time">Deliver</i>
							</button>
						</form>
						<form class="d-inline-block" onsubmit="return confirm('Are you sure to SUCCESS?')" action="#" method="POST">
							<input type="hidden" name="id" value="">
							<input type="hidden" name="status" value="3">
							<button class="btn btn-outline-success">
							<i class="icofont-thumbs-upk">Success</i>
							</button>
						</form>
						<form class="d-inline-block" onsubmit="return confirm('Are you sure to CANCEL?')" action="#" method="POST">
							<input type="hidden" name="id" value="">
							<input type="hidden" name="status" value="4">
							<button class="btn btn-outline-danger">
							<i class="icofont-close">Cancel</i>
							</button>
						</form>
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
									<b>Order Date: {{date('F d, Y h:mA', strtotime($order->date))}}</b><br>
									<b>Total: {{$order->total}} Ks<br>
								</div>
							</div>
							<div class="row">
								<div class="col-12 table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Product</th>
												<th>Serial #</th>
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
													<strike>{{$item->price}} Ks</strike>
													<span class="d-block">{{$item->discount}} Ks</span>
													@else
													{{$item->price}} Ks
													@endif
												</td>
												<td>{{$item->pivot->qty}}</td>
												<td>
													@if($item->discount)
													@php
													$dis_price = $item->discount * $item->pivot->qty;
													@endphp
													{{$dis_price}} Ks
													@else
													@php
													$price = $item->price * $item->pivot->qty;
													@endphp
													{{$price}} Ks
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
@endsection