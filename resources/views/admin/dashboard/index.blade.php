@extends('layouts.admintemplate')
@section('content')
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h3 class="mt-4">Dashboard</h3>
			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">
							<h3 class="card-title h2">{{number_format($today_order_count)}}</h3>
							<span>
								{{-- <i class="fa fa-shopping-basket" aria-hidden="true"></i> --}}
								<i class="fas fa-dollar-sign"></i>
								Today Orders
							</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-warning text-white mb-4">
						<div class="card-body">
							<h3 class="card-title h2">{{number_format($customer_count)}}</h3>
							<span>
								<i class="fas fa-users" aria-hidden="true"></i>
								Customers
							</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-body">
							<h3 class="card-title h2">{{number_format($category_count)}}</h3>
							<span>
								<i class="fas fa-tags" aria-hidden="true"></i>
								Categories
							</span>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-danger text-white mb-4">
						<div class="card-body">
							<h3 class="card-title h2">{{number_format($item_count)}}</h3>
							<span>
								<i class="fas fa-hamburger" aria-hidden="true"></i>
								Items
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-chart-area me-1"></i>
							Monthly Sales
						</div>
						<div class="card-body">
							<canvas id="myAreaChart" width="100%" height="40"></canvas>
						</div>
					</div>
				</div>
				{{-- <div class="col-xl">
					<div class="card mb-4">

						<div class="card-header">
							<i class="fas fa-chart-bar me-1"></i>
							Monthly Sales
						</div>
						<div class="card-body">
							<canvas id="myBarChart" width="100%" height="40"></canvas>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</main>
</div>
@endsection

<script type="text/javascript">
	var bar_data = {!! json_encode($monthly_sale) !!};
	var graph_data = @json($monthly_sale);

	//pass 'bar_data' variable to /public/backend_assets/demo/chart-bar-demo.js
	//pass 'graph_data' variable to /public/backend_assets/demo/chart-area-demo.js
</script>