<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Lixeira</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . "Produtos"; ?>">Produtos</a></li>
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

                        <table id="datatables-responsive" class="table dataTable no-footer dtr-inline table-hover"
                            style="width: 100%;" role="grid" aria-describedby="datatables-responsive_info">
                            <thead>
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </thead>

                            <tbody>
                                <?php if (isset($produtos_lixeira)): ?>
                                    <?php foreach ($produtos_lixeira as $produto_lixeira): ?>
                                        <tr>
                                            <td><?= $produto_lixeira->id; ?></td>
                                            <td><?= $produto_lixeira->nome_produto; ?></td>
                                            <td><?= $produto_lixeira->quantidade; ?></td>
                                            <td><?= $produto_lixeira->descricao; ?></td>
                                            <td
                                                class="<?= $produto_lixeira->quantidade > 0 ? 'table-success' : 'table-danger'; ?>">
                                                <?= $produto_lixeira->quantidade > 0 ? "Disponivel" : "Indisponivel"; ?>
                                            </td>
                                            <td><?= $produto_lixeira->preco; ?></td>
                                            <td><?= $produto_lixeira->categoria; ?></td>
                                            <td class="table-action">
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#excluirproduto<?= $produto_lixeira->id; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </a>
                                                <a data-bs-toggle="modal "
                                                    data-bs-target="#restaurarproduto<?= $produto_lixeira->id; ?>">
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

                                        <!-- Modal de Lixeira -->
                                        <div class="modal fade" id="excluirproduto" aria-hidden="true" tabindex="-1">
                                            <div class="modal-dialog modal-md modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Lixeira
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Produto</th>
                                                                    <th>Categoria</th>
                                                                    <th>Excluir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (isset($produtos_lixeira)): ?>
                                                                    <?php foreach ($produtos_lixeira as $produto_lixeira): ?>
                                                                        <tr>
                                                                            <td><?= $produto_lixeira->id; ?></td>
                                                                            <td><?= $produto_lixeira->nome_produto; ?></td>
                                                                            <td><?= $produto_lixeira->categoria; ?></td>
                                                                            <td class="table-action">
                                                                                <a data-bs-toggle="modal"
                                                                                    data-bs-target="#excluirproduto<?= $produto_lixeira->id; ?>">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                                        height="16" fill="currentColor"
                                                                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                                                        <path
                                                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 
                                                                                16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 
                                                                                1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 
                                                                                0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 
                                                                                0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 
                                                                                0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                                                    </svg>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fim do Modal de Lixeira -->
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