<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Relatórios</strong></h3>
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

			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<h5>Total de Vendas do Mês</h5>
						<h3 class="card-text">
							R$ <?= $sumTotalVendas['total']; ?>
						</h3>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Saldo Bancário
							<span class="badge bg-secondary">4</span>
						</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
								aria-valuemin="0" aria-valuemax="100">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Produtos a serem repostos
							<span class="badge bg-secondary">4</span>
						</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
								aria-valuemin="0" aria-valuemax="100">
							</div>
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
								<canvas id="grafico2"></canvas>
							</div>

							<div class="col-md-5">
								<h5>Informações</h5>
							</div>

							<!-- Gráfico de Categorias de interresse -->
							<script>
								const ctx2 = document.getElementById('grafico2');

								const months = [
									'Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun',
									'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
								];

								const categorias = <?= json_encode($countCtg); ?>;

								let nomeCtg = [];
								let qtdCtg = [];

								for (let i = 0; i < categorias.length; i++) {
									nomeCtg.push(categorias[i].nome_categoria);
									qtdCtg.push(categorias[i].total_itens);
								}

								new Chart(ctx2, {
									type: 'line',
									data: {
										labels: months, // ← nomes das categorias no eixo X
										datasets: [{
											label: "Quantidade",
											data: qtdCtg,
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
	</div>
</main>