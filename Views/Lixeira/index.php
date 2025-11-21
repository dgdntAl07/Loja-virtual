<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Lixeira</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "Produtos"; ?>">Estoque</a></li>
                        <li class="breadcrumb-item"><a href="#">Lixeira</a></li>
                        <li class="breadcrumb-item active" aria-current="page">index</li>
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
                                <h6 class="card-subtitle m-3 text-muted">Itens na lixeira</h6>
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

                        <?php if(!empty($produtos_lixeira)): ?>
                            <table id="datatables-responsive" class="table dataTable no-footer dtr-inline table-hover"
                                style="width: 100%;" role="grid" aria-describedby="datatables-responsive_info">
                                <thead>
                                    <th>ID</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </thead>

                                <tbody>
                                    <?php if (isset($produtos_lixeira)): ?>
                                        <?php foreach ($produtos_lixeira as $produtos_lixeira): ?>
                                            <tr>
                                                <td><?= $produtos_lixeira->id; ?></td>
                                                <td><?= $produtos_lixeira->nome_produto; ?></td>
                                                <td><?= $produtos_lixeira->quantidade; ?></td>
                                                <td><?= $produtos_lixeira->descricao; ?></td>
                                                <td><?= "R$" . number_format($produtos_lixeira->preco, 2, ',', '.'); ?></td>
                                                <td><?= $produtos_lixeira->nome_categoria; ?></td>
                                                <td class="table-action">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#excluirproduto<?= $produtos_lixeira->id; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                        </svg>
                                                    </a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#restaurarproduto<?= $produtos_lixeira->id; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-arrow-counterclockwise"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z" />
                                                            <path
                                                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="restaurarproduto<?= $produtos_lixeira->id; ?>" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success text-white">
                                                            <h5 class="modal-title">Restaurar Produto</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Deseja realmente restaurar o produto
                                                            <strong><?= $produtos_lixeira->nome_produto; ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= BASE_URL ?>Lixeira/restaurarProduto">
                                                                <input type="hidden" name="id_produto_restaurar"
                                                                    value="<?= $produtos_lixeira->id; ?>">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-success">Restaurar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="excluirproduto<?= $produtos_lixeira->id; ?>" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title">Excluir Produto</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Deseja realmente excluir o produto
                                                            <strong><?= $produtos_lixeira->nome_produto; ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="<?= BASE_URL ?>Lixeira/delProduto">
                                                                <input type="hidden" name="id_produto_excluir"
                                                                    value="<?= $produtos_lixeira->id; ?>">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php endif; ?>


                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Não há items na lixeira</p>
                        <?php endif; ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>