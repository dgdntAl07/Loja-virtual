<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Dashboards</strong></h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Relatórios</a></li>
						<li class="breadcrumb-item active" aria-current="page">Index</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Empty card</h5>
					</div>
					<div class="card-body">
						<div class="row d-flex justify-content-evenly">
							<div class="col-md-4">
								<h6 class="text-center">Produtos Mais Vendidos</h6>
								<canvas id="grafico1"></canvas>
							</div>
							<div class="col-md-4">
								<h6 class="text-center">Vendas do Ano</h6>
								<canvas id="grafico2"></canvas>
							</div>
						</div>

						<!-- Gráfico de Vendas-->
						<script>
							const ctx = document.getElementById('grafico1');

							new Chart(ctx, {
								type: 'bar',
								data: {
									labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
									datasets: [{
										label: '# of Votes',
										data: [12, 16, 3, 5, 2, 3],
										borderWidth: 1
									}]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
							});
						</script>

						<!-- Gráfico de Produtos Mais Vendidos -->
						<script>
							const ctx2 = document.getElementById('grafico2');

							new Chart(ctx2, {
								type: 'pie',
								data: {
									labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
									datasets: [{
										label: '# of Votes',
										data: [12, 16, 3, 5, 2, 3],
										borderWidth: 1
									}]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
							});
						</script>

					</div>
				</div>
			</div>
		</div>

	</div>
</main>