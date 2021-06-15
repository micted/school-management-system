@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">
							<div class="icon bg-primary-light rounded w-60 h-60">
								<i class="fas fa-user-graduate"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Students</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $student_count }}</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">
							<div class="icon bg-warning-light rounded w-60 h-60">
								<i class="text-warning mr-0 font-size-24 mdi mdi-account-multiple"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Employees</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $employee_count }} </h3>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">
							<div class="icon bg-info-light rounded w-60 h-60">
								<i class="fas fa-coins font-size-24"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Total Costs</p>
								<h3 class="text-white mb-0 font-weight-500">{{ round($other_cost+$emp_salary) }} Birr</h3>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">
							<div class="icon bg-danger-light rounded w-60 h-60">
								<i class="fas fa-school font-size-24"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Total Classes</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $classes }}</h3>
							</div>
						</div>
					</div>
				</div>

				<!-- EARNING SUMMARY -->

				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header">
							<a class="box-title" href="#">
								Chart
							</a>
						</div>
						<div class="box-body py-0">
							<div class="row">
								<div class="col-lg-6 col-12">
									<div class="box no-shadow mb-0">
										<div class="box-body px-0">
											<div class="d-flex justify-content-start align-items-center">
												<div>
													<div id="chart41"></div>
												</div>
												<div>
													<h5>Profit</h5>
													<h4 class="text-white my-0 font-weight-500">{{ round(($other_cost+$emp_salary)-$student_fee) }} Birr</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="box no-shadow mb-0">
										<div class="box-body px-0">
											<div class="d-flex justify-content-start align-items-center">
												<div>
													<div id="chart42"></div>
												</div>
												<div>
													<h5>Discount</h5>
													<h4 class="text-white my-0 font-weight-500">{{$discount}}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- CHART -->
							<div id="linechart" style="width: 450px; height: 390px "></div>

						</div>
					</div>
				</div>

				<div class="col-xl-6 col-12">
					<div class="box bg-success bg-img" style="background-image: url(../images/gallery/bg-1.png)">
						<div class="box-body text-center">
							<img src="{{ asset('backend/images/trophy.png') }}" class="mt-50" alt="" />
							<div class="max-w-500 mx-auto">
								<h2 class="text-white mb-20 font-weight-500">Highest salary is {{ round($salary) }} birr</h2>
								<p class="text-white-50 mb-10 font-size-20">Number one highest paid staff in your school</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="box overflow-hidden">
								<div class="box-body pb-0">
									<div>
										<h2 class="text-white mb-0 font-weight-500">{{$users}}</h2>
										<p class="text-mute mb-0 font-size-20">Total Users</p>
									</div>
								</div>
								<div class="box-body p-0">
									<div id="revenue1"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="box overflow-hidden">
								<div class="box-body pb-0">
									<div>
										<h2 class="text-white mb-0 font-weight-500">{{$subjects}}</h2>
										<p class="text-mute mb-0 font-size-20">Total Given School Subjects</p>
									</div>
								</div>
								<div class="box-body p-0">
									<div id="revenue2"></div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<script type="text/javascript">
					var increment = <?php echo $increment; ?>;
					console.log(increment);
					google.charts.load('current', {
						'packages': ['corechart']
					});
					google.charts.setOnLoadCallback(lineChart);

					function lineChart() {
						var data = google.visualization.arrayToDataTable(increment);
						var options = {
							title: 'INCREMENT',
							titleColor: 'white',
							titleStyle: 'bold',
							backgroundColor: '#8275F4',
							curveType: 'function',
							legend: {
								position: 'bottom'
							}
							
						};
						var chart = new google.visualization.LineChart(document.getElementById('linechart'));
						chart.draw(data, options);
					}
				</script>
		</section>
		<!-- /.content -->
	</div>
</div>

@endsection