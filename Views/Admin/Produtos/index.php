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
                    <div class="card-header">
                        <div class="row">

                            <div class="col-md-6 text">
                                <h6 class="card-subtitle m-3 text-muted">Listagem de produtos</h6>
                            </div>
                            <div class="col-md-6  mt-2 text-end">
                                <a data-bs-toggle="modal" data-bs-target="#addproduto" class="btn btn-secondary">+
                                    Adicionar produtos</a>
                            </div>

                            <!-- Modal de Adicionar -->
                            <div class="modal fade" id="addproduto" aria-hidden="true" tabindex="-1">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Adicionar Produtos
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="<?= BASE_URL . 'Produtos/create'; ?>">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="nome" class="form-label">Nome</label>
                                                            <input class="form-control" type="text" id="nome"
                                                                name="nome_produto" placeholder="Nome do Produto"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-control">
                                                            <label for="textarea" class="form-label">Descrição</label>
                                                            <textarea class="form-control" name="descricao"
                                                                id="textarea"
                                                                placeholder="Digite a descrição do novo produto..."
                                                                rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Quantidade</label>
                                                            <input type="text" id="quantidade" name="quantidade"
                                                                class="form-control" placeholder="15"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-label">Categoria</label>
                                                            <select id="categoria"
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
                                                            <input type="text" id="preco" name="preco"
                                                                class="form-control" placeholder="Ex:R$20,00..."
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">Situação</label>
                                                        <div class="d-flex">
                                                            <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="situacao" id="flexRadioDefault1" value="1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Disponivel
                                                                </label>
                                                            </div>
                                                            <div class="form-check m-2">
                                                                <input class="form-check-input" type="radio"
                                                                    name="situacao" id="flexRadioDefault2" value="0">
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Indisponivel
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="button" class="btn btn-secondary w-25"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit"
                                                            class="btn btn-info w-25">Adicionar</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim do Modal de Adicionar -->

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
                        <table id="datatables-responsive" class="table dataTable no-footer dtr-inline table-hover"
                            style="width: 100%;" role="grid" aria-describedby="datatables-responsive_info">
                            <thead>
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Descrição</th>
                                <th>Situação</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <?php if (isset($produtos_list)): ?>
                                    <?php foreach ($produtos_list as $produto): ?>
                                        <tr>
                                            <td><?= $produto->id; ?></td>
                                            <td><?= $produto->nome_produto; ?></td>
                                            <td><?= $produto->quantidade; ?></td>
                                            <td><?= $produto->descricao; ?></td>
                                            <td><?= $produto->situacao; ?></td>
                                            <td><?= $produto->preco; ?></td>
                                            <td><?= $produto->categoria; ?></td>
                                            <td class="table-action p-0 ">
                                                <a data-bs-toggle="modal" data-bs-target="#editproduto<?= $produto->id; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                    </svg>
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#excluirproduto<?= $produto->id; ?>"
                                                    class="m-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal Editar Usuario -->
                                        <div class="modal fade" id="editproduto<?= $produto->id; ?>" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Editar produto
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="name_edit"
                                                                            class="form-label">Produto</label>
                                                                        <input type="text" id="name_edit" name="name_edit"
                                                                            class="form-control"
                                                                            placeholder="<?= $produto->nome_produto; ?>"
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="email_edit" class="form-label">Email</label>
                                                                        <input type="text" name="email_edit" id="email_edit"
                                                                            class="form_control"
                                                                            placeholder="<?= $produto->descricao; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="id_group_edit" id="id_group_edit"
                                                                            class="form-select" required>
                                                                            <option value="act" <?= $produto->situacao == 1 ? 'selected' : ''; ?>>Ativo</option>
                                                                            <option value="int" <?= $produto->situacao == 0 ? 'selected' : ''; ?>>Inativo</option>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="id_produto_edit"
                                                                    value="<?= $produto->id; ?>">
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