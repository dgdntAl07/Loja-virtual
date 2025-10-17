<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-xl-3">

            <div class="col-auto d-none d-sm-block">
                <h3><strong>Produtos</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Produtos</a></li>
						<li class="breadcrumb-item active" aria-current="page">Index</li>
					</ol>
				</nav>
			</div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="car-header">
                        <div class="row">

                            <div class="col-md-6 text">
                                <h6 class="card-subtitle m-3 text-muted">Listagem de produtos</h6>
                            </div>
                            <div class="col-md-6  mt-2 text-end">
                                <a data-bs-toggle="modal" data-bs-target="#addproduto" class="btn btn-secondary">+ Adicionar produtos</a>
                            </div>

                            <!-- Modal de Adicionar -->
                            <div class="modal fade" id="addproduto" aria-hidden="true" tabindex="-1">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Adicionar Produtos
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="nome" class="form-label">Nome</label>
                                                            <input class="form-control" type="text" id="nome" name="nome_produto" placeholder="Nome do Produto" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-control">
                                                            <label for="textarea" class="form-label">Descrição</label>
                                                            <textarea class="form-control" name="descricao" id="textarea" placeholder="Digite a descrição do novo produto..." rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label for="type_produto"
																class="form-label">Categoria</label>
															<select name="type_produto" id="type_produto"
																class="form-select" name="categoria" required>
																<option disabled>Selecione o tipo</option>
																<option value="1">Limpeza</option>
																<option value="2">Perfumes</option>
																<option value="3">Cosmeticos</option>
																<option value="4">Brindes</option>

																<?php foreach ($permissions_list as $permission): ?>
																	<option value="<?= $permission['id']; ?>">
																		<?= $permission['name']; ?>
																	</option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Preço</label>
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="Ex:R$20,00..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">Situação</label>
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadio1" id="situacao">
                                                                <label class="form-check-label" for="flexRadio1">Disponivel</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadio2" id="situacao">
                                                                <label class="form-check-label" for="flexRadio2">Indisponivel</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim do Modal de Adicionar -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>