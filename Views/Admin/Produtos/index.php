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

                            <div class="col-md-6 mt-2 text-end">
                                <a data-bs-toggle="modal" data-bs-target="#addproduto" class="btn btn-secondary">+
                                    Adicionar produtos</a>
                                <a data-bs-toggle="modal" data-bs-target="#lixeira" class="btn btn-danger">
                                    Lixeira</a>
                            </div>

                            <!-- Modal de Adicionar Produto-->
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
                                                                class="form-control" placeholder="15" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Categoria</label>
                                                            <select id="categoria" class="form-select" name="categoria"
                                                                required>
                                                                <option disabled>Selecione o tipo</option>
                                                                <option value="limpeza">Limpeza</option>
                                                                <option value="perfumes">Perfumes</option>
                                                                <option value="cosmeticos">Cosmeticos</option>
                                                                <option value="brindes">Brindes</option>

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
                                                        <button type="button" class="btn btn-danger w-25"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit"
                                                            class="btn btn-primary w-25">Adicionar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- Fim do Modal de Adicionar -->

                            <!-- Modal de Lixeira -->
                            <div class="modal fade" id="lixeira" aria-hidden="true" tabindex="-1">
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
                                                    <?php if (isset($produtos_list)): ?>
                                                        <?php foreach ($produtos_list as $produto): ?>
                                                            <tr>
                                                                <td><?= $produto->id; ?></td>
                                                                <td><?= $produto->nome_produto; ?></td>
                                                                <td><?= $produto->categoria; ?></td>
                                                                <td class="table-action">
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#excluirproduto<?= $produto->id; ?>">
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
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#restaurarproduto<?= $produto->id; ?>">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" fill="currentColor"
                                                                            class="bi bi-arrow-counterclockwise"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z" />
                                                                            <path
                                                                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466" />
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
                                            <td class="<?= $produto->quantidade > 0 ? 'table-success' : 'table-danger'; ?>">
                                                <?= $produto->quantidade > 0 ? "Disponivel" : "Indisponivel"; ?>
                                            </td>
                                            <td><?= $produto->preco; ?></td>
                                            <td><?= $produto->categoria; ?></td>
                                            <td class="table-action">
                                                <a data-bs-toggle="modal" data-bs-target="#editproduto<?= $produto->id; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                    </svg>
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#removerproduto<?= $produto->id; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Modal de Editar Produto -->
                                        <div class="modal fade" id="editproduto<?= $produto->id; ?>" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Editar produto
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="<?= BASE_URL . 'Produtos/editProduto'; ?>">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="nome" class="form-label">Nome</label>
                                                                        <input class="form-control" type="text" id="nome"
                                                                            name="nome_produto_edit"
                                                                            placeholder="<?= $produto->nome_produto; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <div class="form-control">
                                                                        <label for="textarea"
                                                                            class="form-label">Descrição</label>
                                                                        <textarea class="form-control" name="descricao_edit"
                                                                            id="textarea"
                                                                            placeholder="<?= $produto->descricao; ?>"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="name" class="form-label">Quantidade</label>
                                                                        <input type="text" id="quantidade"
                                                                            name="quantidade_edit" class="form-control"
                                                                            placeholder="<?= $produto->quantidade; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Categoria</label>
                                                                        <select id="categoria" class="form-select"
                                                                            name="categoria_edit">
                                                                            <option disabled>Selecione o tipo</option>
                                                                            <option value="Limpeza">Limpeza</option>
                                                                            <option value="perfumes">Perfumes</option>
                                                                            <option value="cosmeticos">Cosmeticos</option>
                                                                            <option value="brindes">Brindes</option>

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
                                                                        <input type="text" id="preco" name="preco_edit"
                                                                            class="form-control" placeholder="Ex: R$20.00">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="name" class="form-label">Situação</label>
                                                                    <div class="d-flex">
                                                                        <div class="form-check m-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="situacao_edit" id="flexRadioDefault1"
                                                                                value="1">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault1">
                                                                                Disponivel
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check m-2">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="situacao_edit" id="flexRadioDefault2"
                                                                                value="0">
                                                                            <label class="form-check-label"
                                                                                for="flexRadioDefault2">
                                                                                Indisponivel
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-end">
                                                                    <button type="button" class="btn btn-danger w-25"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-warning w-25">Gravar
                                                                        Alterações</button>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_produto_edit"
                                                                value="<?= $produto->id; ?>">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fim Modal Editar -->

                                        <!-- Modal de Remover Produto -->
                                        <div class="modal fade" id="removerproduto<?= $produto->id; ?>" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmação de Remoção</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <form method="POST" action=" <?= BASE_URL . 'Produtos/ #'; ?> ">
                                                            <p>Tem certeza que deseja remover este item da sua lista de
                                                                produtos?
                                                            </p>
                                                            <h6>Este item ainda poderá ser restaurado na lixeira.</h6>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-danger">Remover</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fim Modal de Remover Produto -->

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