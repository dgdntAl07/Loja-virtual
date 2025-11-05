<header>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://preview.redd.it/xs5huy10hfk61.jpg?auto=webp&s=460ae63015f46abf7a040c9391aebce4a175e4ed"
                        class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://preview.redd.it/xs5huy10hfk61.jpg?auto=webp&s=460ae63015f46abf7a040c9391aebce4a175e4ed"
                        class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://preview.redd.it/xs5huy10hfk61.jpg?auto=webp&s=460ae63015f46abf7a040c9391aebce4a175e4ed"
                        class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</header>

<main>
    <div class="container py-4">
        <h2 class="mb-4 text-center">Lista de Produtos</h2>

        <div class="row g-4">
            <?php if (!empty($produtos_list)): ?>
                <?php foreach ($produtos_list as $produto): ?>
    <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">

            <?php if (!empty($produto->imagens)): ?>
                <img src="<?= BASE_URL . $produto->imagens; ?>" 
                     class="card-img-top"
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
                    <li><strong>Categoria:</strong> <?= htmlspecialchars($produto->categoria); ?></li>
                    <li><strong>Quantidade:</strong> <?= $produto->quantidade; ?></li>
                    <li><strong>Preço:</strong> R$ <?= number_format($produto->preco, 2, ',', '.'); ?></li>
                    <li>
                        <strong>Situação:</strong>
                        <span class="<?= $produto->situacao == 1 ? 'status-disponivel' : 'status-indisponivel'; ?>">
                            <?= $produto->situacao == 1 ? 'Disponível' : 'Indisponível'; ?>
                        </span>
                    </li>
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
</main>