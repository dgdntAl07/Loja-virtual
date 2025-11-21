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

                        <?php if (!isset($venda['item'])): ?>
                            <table id="datatables-responsive" class="table dataTable no-footer dtr-inline table-hover"
                                style="width: 100%;" role="grid" aria-describedby="datatables-responsive_info">
                                <thead>
                                    <th>ID</th>
                                    <th>Produtos</th>
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    <?php if (isset($vendas)): ?>
                                        <?php foreach ($vendas as $vd): ?>
                                            <tr>
                                                <td><?= $vd['id']; ?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-outline-success" data-bs-toggle="modal"
                                                        data-bs-target="#produtoVendido<?= $vd['id']; ?>">
                                                        Ver produtos
                                                    </button>

                                                    <!-- Modal dos produtos vendidos -->
                                                    <div class="modal fade" id="produtoVendido<?= $vd['id']; ?>"
                                                        aria-hidden="true" tabindex="-1">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    Produtos Comprados
                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <?php if (!empty($vd['items'])): ?>
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>ID</th>
                                                                                            <th>Produto</th>
                                                                                            <th>Quantidade</th>
                                                                                            <th>Preço</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php foreach ($vd['items'] as $item): ?>
                                                                                            <tr>
                                                                                                <td><?= $item['id']; ?>
                                                                                                </td>
                                                                                                <td><?= $item['nome_produto']?></td>
                                                                                                <td><?= $item['quantidade']?></td>
                                                                                                <td><?= "R$ " . number_format($item['preco'], 2,",", ".")?></td>
                                                                                            </tr>
                                                                                        <?php endforeach; ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            <?php else: ?>
                                                                                <div class="alert alert-danger" role="alert">
                                                                                    Ocorreu um erro na listagem de produtos vendidos!!!
                                                                                </div>
                                                                            <?php endif; ?>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Fim do Modal dos produtos vendidos -->

                                                </td>
                                                <td><?= date("d/m/Y",strtotime($vd['data_venda']) ); ?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-outline-primary">
                                                        Ver comprador
                                                    </button>
                                                </td>
                                                <td><?= "R$ " . number_format($vd['total'], 2, ",", "."); ?></td>
                                                <td>
                                                    <button class="btn btn-link pl-1 link-dark" data-bs-toggle="modal" data-bs-target="#excluirVenda<?= $vd['id']; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                            <path
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                        </svg>
                                                    </button>

                                                    <!-- Modal de Excluir Vendas -->
                                                    <div class="modal fade" id="excluirVenda<?= $vd['id']; ?>" tabindex="-1" aria-labelledby="exModal" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exModal">Excluir venda</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Realmente deseja excluir esta venda?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="POST" action="<?= BASE_URL ?>Vendas/excluirVenda">
                                                                        <input type="hidden" name="id_produto_venda"
                                                                            value="<?= $vd['id'] ?>">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-danger">Enviar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Fim do Modal de Excluir Vendas -->
                                                  
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>  
                        <?php else: ?>
                            <p>Nenhum produto vendido</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>