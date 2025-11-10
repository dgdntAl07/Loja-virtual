<main class="content">
    <div type="btn" class="btn m-3">
        <a href="<?= BASE_URL; ?>" class="text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
        </a>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-md-12 d-flex justify-content-between">
                <h2> Aqui é o seu Carrinho</h2>
                <form action="<?= BASE_URL; ?>Carrinho/limparcarrinho" method="POST">
                    <button type="submit" class="btn btn-warning">Limpar carrinho</button>
                </form>
            </div>

        </div>

        <?php if (!empty($carrinho)): ?>
            <table class="table">
                <tr class="text-center">
                    <th class="text-center">Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ações</th>
                </tr>

                <?php $total = 0; ?>
                <?php foreach ($carrinho as $item): ?>
                    <?php $subtotal = $item['preco'] * $item['quantidade']; ?>
                    <?php $total += $subtotal; ?>
                    <tr class="text-center">
                        <td><?= htmlspecialchars($item['nome']) ?></td>
                        <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                        <td><?= $item['quantidade'] ?></td>
                        <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                        <td class="d-flex gap-2 align-items-center justify-content-center">

                            <a data-bs-toggle="modal" data-bs-target="#removercarrinho<?= $item['id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </a>

                            <form method="POST" action="<?= BASE_URL; ?>Carrinho/subQuantCarrinho">
                                <input type="hidden" name="id_produto" value="<?= $item['id']; ?>">
                                <button type="submit" class="btn btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-dash" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                    </svg>
                                </button>
                            </form>

                            <form method="POST" action="<?= BASE_URL; ?>Carrinho/addQuantCarrinho">
                                <input type="hidden" name="id_produto" value="<?= $item['id']; ?>">
                                <button type="submit" class="btn btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                </button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal de Remover Produto do carrinho -->
                    <div class="modal fade" id="removercarrinho<?= $item['id']; ?>" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Remover do Carrinho
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    Tem certeza que remover o produto
                                    <strong><?= $item['nome']; ?></strong> do seu carrinho?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="<?= BASE_URL; ?>Carrinho/removercarrinho">
                                        <input type="hidden" name="id_rmv_produto" value="<?= $item['id']; ?>">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Sim</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- Fim do Modal de Remover Produtos -->

                <?php endforeach; ?>

                <tr class="justify-content-between">
                    <br>
                    <td class="text-center" colspan="3"><strong>Total:</strong></td>
                    <td class="text-center"><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td>
                    <td></td>
                </tr>

            </table>

            <form action="<?= BASE_URL; ?>Carrinho/finalizarCompra" method="POST">
                <button onclick="compraFinalizada()" id="comprar" type="submit" class="btn btn-success">Finalizar
                    Compra</button>
            </form>

            <script>
                const button = document.getElementById('comprar')
                const section = document.querySelector('section')

                button.addEventListener('click', () => {
                    section.classList.add('active')
                })
            </script>

        <?php else: ?>
            <p>Seu carrinho esta vazio</p>
        <?php endif; ?>

    </div>
</main>