<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Dashboards</strong></h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
						<li class="breadcrumb-item active" aria-current="page">Index</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row row mb-2 mb-xl-3">
			<div class="col-auto ms-auto text-end mt-n1">
				<select class="form-select" aria-label="Default select example">
					<option selected>Selecione o Mês...</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<div class="col-12 d-flex justify-content-between">
							<h5 class="">Receita Mensal</h5>
							<h5 class="">
								R$ <?= $sumTotalVendas['total']; ?>
							</h5>
						</div>
						<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
								aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<div class="col-12 d-flex justify-content-between">
							<h5 class="">Receita Mensal</h5>
							<h5 class="">
								R$ <?= $sumTotalVendas['total']; ?>
							</h5>
						</div>
						<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
								aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<div class="col-12 d-flex justify-content-between">
							<h5 class="">Receita Mensal</h5>
							<h5 class="">
								R$ <?= $sumTotalVendas['total']; ?>
							</h5>
						</div>
						<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
								aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<div class="row d-flex gap-1">
							<div class="col-md-12">
								<h6 class="text-center">Estoque</h6>
								<canvas id="grafico3"></canvas>
							</div>



							<!-- Gráfico de Estoque-->
							<script>
								const ctx3 = document.getElementById('grafico3');

								const Estoque = <?= json_encode($countEstoque); ?>;

								let nomeProduto = [];
								let qtdEstoque = [];

								for (let i = 0; i < Estoque.length; i++) {
									nomeProduto.push(Estoque[i].produto);
									qtdEstoque.push(Estoque[i].total_itens);
								}

								new Chart(ctx3, {
									type: 'pie',
									data: {
										labels: nomeProduto,
										datasets: [{
											label: '#',
											data: qtdEstoque,
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

			<div class="col-8">
				<div class="card">
					<div class="card-body">
						<div class="row d-flex">
							<div class="col-md-11">
								<h6 class="text-center">Produtos Mais Vendidos</h6>
								<canvas id="grafico1"></canvas>
							</div>
						</div>

						<!-- Gráfico de Produtos mais Vendidos-->
						<script>
							const ctx = document.getElementById('grafico1');
							const produtos = <?= json_encode($products); ?>;

							let labelNames = [];
							for (let i = 0; i < produtos.length; i++) {
								labelNames.push(produtos[i].nome_produto);
							};

							let labelQnt = [];
							for (let i = 0; i < produtos.length; i++) {
								labelQnt.push(produtos[i].qtd);
							}

							new Chart(ctx, {
								type: 'bar',
								data: {
									labels: labelNames,
									datasets: [{
										label: 'Unidades vendidas',
										data: labelQnt,
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

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row d-flex gap-1">
							<div class="col-md-6">
								<h6 class="text-center">Categorias de Maior Interesse</h6>
								<div id="chart1" style="width: 100%; min-height: 400px;"></div>
							</div>

							

							

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</main>