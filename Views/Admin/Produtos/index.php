<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Estoque</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">Estoque</a></li>
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
                                <a href="<?= BASE_URL . "Lixeira"; ?>" class="btn btn-danger">Lixeira</a>
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

                                        <form method="POST" enctype="multipart/form-data"
                                            action="<?= BASE_URL . 'Produtos/create'; ?>">
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
                                                                class="form-control"
                                                                placeholder="Digite a quantidade..." required>
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
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Preço</label>
                                                            <input type="text" id="preco" name="preco"
                                                                class="form-control"
                                                                placeholder="Digite o preço do produto..." required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Selecione uma
                                                            imagem</label>
                                                        <input class="form-control" name="imagem" type="file"
                                                            id="formFile">
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
                                            <td><?= "R$" . number_format($produto->preco, 2, ',', '.'); ?></td>
                                            <td><?= $produto->categoria; ?></td>
                                            <td class="table-action">
                                                <a data-bs-toggle="modal" data-bs-target="#editproduto<?= $produto->id; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                    </svg>
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#enviarLixeira<?= $produto->id; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
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
                                                                <div class="col-md-12 mb-3">
                                                                    <div class="form-group">
                                                                        <label for="name" class="form-label">Preço</label>
                                                                        <input type="text" id="preco" name="preco_edit"
                                                                            class="form-control"
                                                                            placeholder="<?= number_format($produto->preco, 2, ',', '.'); ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Selecione uma
                                                                        imagem</label>
                                                                    <input class="form-control" name="imagem" type="file"
                                                                        id="formFile">
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

                                        <!-- Modal de Remoção do Produto -->
                                        <div class="modal fade" id="enviarLixeira<?= $produto->id; ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title">Enviar para Lixeira</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tem certeza que deseja enviar o produto
                                                        <strong><?= $produto->nome_produto; ?></strong> para a lixeira?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="<?= BASE_URL ?>Lixeira/enviarLixeira">
                                                            <input type="hidden" name="id_produto_excluir"
                                                                value="<?= $produto->id; ?>">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Enviar</button>
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