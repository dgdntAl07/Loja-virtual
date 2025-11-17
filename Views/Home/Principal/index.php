<div class="container py-4">

    <h2 class="mb-4 text-center">Lista de Produtos</h2>

    <div class="row g-4">
        <?php if (!empty($produtos_list)): ?>
            <?php foreach ($produtos_list as $produto): ?>
                <div class="col-sm-3">
                    <div class="card shadow-sm border-0" style="width: 18rem;">

                        <?php if (!empty($produto->imagens)): ?>
                            <img src="<?= BASE_URL . $produto->imagens; ?>" class="card-img-top"
                                alt="<?= htmlspecialchars($produto->nome_produto); ?>">
                        <?php else: ?>
                            <div class="card-img-placeholder">
                                None
                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($produto->nome_produto); ?></h5>
                            <p class="card-text text-muted small mb-2">
                                <?= nl2br(htmlspecialchars($produto->descricao)); ?>
                            </p>

                            <ul class="list-unstyled mb-3">
                                <li><strong>Categoria:</strong> <?= htmlspecialchars($produto->id_ctg); ?></li>
                                <li><strong>Quantidade:</strong> <?= $produto->quantidade; ?></li>
                                <li><strong>Preço:</strong> R$ <?= number_format($produto->preco, 2, ',', '.'); ?></li>
                            </ul>



                            <form action="<?= BASE_URL; ?>Carrinho/adicionar" method="POST">
                                <input type="hidden" name="produto_id" value="<?= $produto->id; ?>">
                                <button type="submit" class="btn btn-primary w-100">
                                    Adicionar ao Carrinho
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">Nenhum produto encontrado.</p>
            </div>
        <?php endif; ?>
    </div>
</div>