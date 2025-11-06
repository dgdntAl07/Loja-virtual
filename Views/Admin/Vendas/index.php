<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Vendas</strong></h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Vendas</a></li>
						<li class="breadcrumb-item active" aria-current="page">Index</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <div class="row">
                            <div class="col-md-6 text">
                                <h6 class="card-subtitle m-3 text-muted">Histórico de Vendas do Mês</h6>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="#" class="btn btn-secondary">algo</a>
                                <a href="#" class="btn btn-secondary">algo</a>
                            </div>
                        </div>
					</div>
					<div class="card-body">
                        <?php if (isset($Erro) && !empty($Erro)): ?>
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-md-3">
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <div class="alert-message">
                                            <?= $Erro; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($success) && !empty($success)): ?>
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-md-4">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <div class="alert-message pe-5">
                                            <?= $success; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

						<?php if(!isset($providerName)):?>

							<table id="datatables-responsive" class="table dataTable no-footer dtr-inline table-hover"
                            style="width: 100%;" role="grid" aria-describedby="datatables-responsive_info">
							<thead>
								<th>ID</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
								<th>Total</th>
                                <th>Categoria</th>
                                <th>Ações</th>
							</thead>
							<tbody>

							</tbody>
							</table>

						<?php else:?>
							<p>Nenhum produto vendido</p>
						<?php endif;?>
							
					</div>
				</div>
			</div>
		</div>

	</div>
</main>