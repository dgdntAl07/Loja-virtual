<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
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
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-subtitle mt-2 text-muted">Listagem dos Produtos</h4>
							</div>
							<div class="col-md-6 mb-3 text-end">
								<a data-bs-toggle="modal" data-bs-target="#addproduto" class="btn btn-secondary">+
									Adicionar Produtos</a>
							</div>
							<!-- MODAL ADICIONAR USUARIO -->
							<div class="modal fade" id="addproduto" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-md modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											Adicionar Produtos
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<form method="POST">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="name" class="form-label">Nome</label>
															<input type="text" id="name" name="name"
																class="form-control" placeholder="Nome do Produto"
																required>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-control">
															<label for="exampleFormControlTextarea1"
																class="form-label">Descrição</label>
															<textarea class="form-control"
																id="exampleFormControlTextarea1" rows="3"></textarea>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="type_produto"
																class="form-label">Quantidade</label>
															<input type="text" id="name" name="name"
																class="form-control" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="type_produto"
																class="form-label">Categoria</label>
															<select name="type_produto" id="type_produto"
																class="form-select" required>
																<option disabled>Selecione o tipo</option>
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
															<input type="text" id="name" name="name"
																class="form-control" required>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<label for="name" class="form-label">Situação</label>
														<div class="d-flex">
															<div class="form-check">
																<input class="form-check-input" type="radio"
																	name="flexRadioDefault" id="flexRadioDefault1">
																<label class="form-check-label" for="flexRadioDefault1">
																	Default radio
																</label>
															</div>
															<div class="form-check">
																<input class="form-check-input" type="radio"
																	name="flexRadioDefault" id="flexRadioDefault2" checked>
																<label class="form-check-label" for="flexRadioDefault2">
																	Default checked radio
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer d-flex justify-content-end">
												<button type="button" class="btn btn-secondary w-25"
													data-bs-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-info w-25">Adicionar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL ADICIONAR USUARIO -->
							<hr>
						</div>
					</div>
					<div class="card-body">
						<?php if (isset($Erro) && !empty($Erro)): ?>
							<div class="row mb-3 d-flex justify-content-center">
								<div class="col-md-3">
									<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="btn-close" data-bs-dismiss="alert"
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
						<table id="datatables-reponsive" class="table dataTable no-footer dtr-inline table-hover"
							style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
							<thead>
								<tr>
									<th>ID</th>
									<th>Produto</th>
									<th>Quantidade</th>
									<th>Descrição</th>
									<th>Preço</th>
									<th>Situação</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>

								<?php if (isset($produtos_list)): ?>
									<?php foreach ($produtos_list as $produto): ?>
										<tr>
											<td><?= $produto['name']; ?></td>
											<td><?= $produto['email']; ?></td>
											<td><?= $produto['name_group']; ?></td>
											<td class="<?= ($produto['situation'] == 1) ? 'table-success' : 'table-danger'; ?>">
												<?= ($produto['situation'] == 1) ? 'Disponivel' : 'Indisponivel'; ?></td>
											<td class="table-action" width="75">
												<a data-bs-toggle="modal" data-bs-target="#editproduto<?= $produto['id']; ?>"
													class="ms-2">
													<i data-feather="file-text"></i>
												</a>
												<a data-bs-toggle="modal" data-bs-target="#editproduto<?= $produto['id']; ?>"
													class="ms-2">
													<i class="bi bi-trash3"></i>
												</a>
											</td>


										</tr>
										<!-- MODAL EDITAR USUARIO -->
										<div class="modal fade" id="editproduto<?= $produto['id']; ?>" tabindex="-1"
											role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														Alterar Usuário
														<button type="button" class="btn-close" data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<form method="POST">
														<div class="modal-body">
															<div class="row">
																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="name_edit" class="form-label">Nome</label>
																		<input type="text" id="name_edit" name="name_edit"
																			class="form-control"
																			placeholder="<?= $produto['name']; ?>" disabled>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="email_edit"
																			class="form-label">E-mail</label>
																		<input type="email" id="email_edit" name="email_edit"
																			class="form-control"
																			placeholder="<?= $produto['email']; ?>">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="id_group_edit" class="form-label">Tipo do
																			usuário</label>
																		<select name="id_group_edit" id="id_group_edit"
																			class="form-select" required>
																			<?php foreach ($permissions_list as $permission): ?>
																				<option value="<?= $permission['id']; ?>"
																					<?= $permission['id'] == $produto['id_group'] ? 'selected' : ''; ?>><?= $permission['name']; ?>
																				</option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="situation"
																			class="form-label">Situação</label>
																		<select name="situation" id="situation"
																			class="form-select" required>
																			<option value="act" <?= $produto['situation'] == 1 ? 'selected' : ''; ?>>Ativo</option>
																			<option value="int" <?= $produto['situation'] == 0 ? 'selected' : ''; ?>>Inativo</option>
																		</select>
																	</div>
																</div>
																<input type="hidden" name="id_produto_edit"
																	value="<?= $produto['id']; ?>">
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-end">
															<button type="button" class="btn btn-secondary"
																data-bs-dismiss="modal">Cancelar</button>
															<button type="submit" class="btn btn-warning">Gravar
																Alterações</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL EDITAR USUARIO -->
									<?php endforeach; ?>
								<?php endif; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>