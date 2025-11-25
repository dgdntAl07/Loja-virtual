<main class="content">
    <div class="container py-4">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Images/banner_carrosel.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <div class="col-md-6 px-0 d-flex align-items-center flex-column">
                            <h1 class="display-5 fst-italic text-dark">Title of a longer featured blog post</h1>
                            <p class="lead my-3 text-dark">Multiple lines of text that form the lede, informing new
                                readers quickly and efficiently about what’s most interesting in this post’s contents.
                            </p>
                            <p class="lead mb-0"><a href="#" class="text-dark fw-bold">Continue reading...</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Images/banner_carrosel.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <div class="col-md-6 px-0 d-flex align-items-center flex-column">
                            <h1 class="display-5 fst-italic text-dark">Title of a longer featured blog post</h1>
                            <p class="lead my-3 text-dark">Multiple lines of text that form the lede, informing new
                                readers quickly and efficiently about what’s most interesting in this post’s contents.
                            </p>
                            <p class="lead mb-0"><a href="#" class="text-dark fw-bold">Continue reading...</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Images/banner_carrosel.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <div class="col-md-6 px-0 d-flex align-items-center flex-column">
                            <h1 class="display-5 fst-italic text-dark">Title of a longer featured blog post</h1>
                            <p class="lead my-3 text-dark">Multiple lines of text that form the lede, informing new
                                readers quickly and efficiently about what’s most interesting in this post’s contents.
                            </p>
                            <p class="lead mb-0"><a href="#" class="text-dark fw-bold">Continue reading...</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h2 class="m-5 text-center">Lista de Produtos</h2>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php if (!empty($produtos_list)): ?>
                <?php foreach ($produtos_list as $produto): ?>
                    <div class="col mb-5">
                        <div class="card shadow-sm border-0 h-100 mx-auto" style="width: 18rem;">

                            <?php if (!empty($produto->imagens)): ?>
                                <img src="<?= BASE_URL . $produto->imagens; ?>" class="card-img-top img-responsive"
                                    style="width: 120px; height: 200px;" alt="<?= htmlspecialchars($produto->nome_produto); ?>">
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
                                    <li><strong>Categoria:</strong> <?= htmlspecialchars($produto->nome_categoria); ?></li>
                                    <li><strong>Quantidade:</strong> <?= htmlspecialchars($produto->quantidade); ?></li>
                                    <li><strong>Preço:</strong> R$ <?= number_format($produto->preco, 2, ',', '.'); ?></li>
                                </ul>

                                <div class="d-flex medio text-warning mb-2 p-1 gap-2">
                                    <h5>Stars: </h5>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>

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