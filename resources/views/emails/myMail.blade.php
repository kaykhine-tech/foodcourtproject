<style>
	tr.border-top td {
	border-top: 1pt solid black;
	}
	.my-link > a{
		color: black;
		text-decoration: none;
		font-weight: bold;
	}
</style>
<table border="0" cellpadding="0" cellspacing="0" style="padding:16px;background-color: #F1F1F1; font-family:Verdana, Arial,sans-serif; color: #454748; width: 100%; border-collapse:separate;">
<tbody>
	<tr>
		<td align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="590" style="padding:16px;background-color: white; color: #454748; border-collapse:separate;">
			<tbody>
				<tr>
					<td align="center" style="min-width:590px;">
						@if($details['title']=="Order Confirmed")
						<h3 style="text-align:center;">Your Order is already confirmed!</h3>
						<table border="0" cellpadding="0" cellspacing="0" width="590" style="min-width:590px;background-color: white; padding: 0px 8px 0px 8px; border-collapse:separate;">
						<tbody>
							<tr>
								<td valign="top" style="font-size:13px;">
									<div>
										Dear {{$details['customer_name']}},<br>
										It's a good choice. We've confirmed your order from our {{config('app.name')}}.<br>
										Please feel free to contact via <span class="my-link">rango1629@gmail.com</span> if you need any further information.<br>
										Please see below, details.<br>
									</div>
									<div style="margin:16px 0px 16px 0px;">
										<div class="col-12 table-responsive">
											Your delivery address<br>
											{{$details['customer_name']}}<br>
											{{$details['customer_address']}}<br><br>
											<table width="500" style="min-width:500px;text-align:left;">
											<thead>
												<tr>
													<th>Qty</th>
													<th>Product</th>
													<th>Subtotal</th>
												</tr>
											</thead>
											<tbody>
												@foreach($details['items'] as $item)
												<tr>
													<td>{{$item->pivot->qty}}</td>
													<td>{{$item->name}}</td>
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
												<tr class="border-top">
													<td colspan="2">Total</td>
													<td>{{$details['total']}}</td>
												</tr>
											</tbody>
											</table>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
						</table>
						@elseif($details['title']=="Order Cancelled")
						<h3 style="text-align:center;">Your Order is cancelled!</h3>
						<table border="0" cellpadding="0" cellspacing="0" width="500" style="min-width:500px;background-color: white; padding: 0px 8px 0px 8px; border-collapse:separate;">
						<tbody>
							<tr>
								<td valign="top" style="font-size:13px;">
									<div>
										Dear {{$details['customer_name']}},<br>
										We've cancelled your order. If you need any further information, please feel free to contact via <span class="my-link">rango1629@gmail.com</span>.<br>
										Just remember us if you wanna grab a bite next time. Let us be your Chef!
									</div>
								</td>
							</tr>
						</tbody>
						</table>
						@endif
					</td>
				</tr>
			</tbody>
			</table>
		</td>
	</tr>
</tbody>
</table>