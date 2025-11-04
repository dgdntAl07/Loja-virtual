<main class="content">
    <div class="container">
        <h2>🛒 Seu Carrinho</h2>

        <?php if (!empty($carrinho)): ?>
            <table border="1" cellpadding="8">
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                </tr>

                <?php $total = 0; ?>
                <?php foreach ($carrinho as $item): ?>
                    <?php $subtotal = $item['preco'] * $item['quantidade']; ?>
                    <?php $total += $subtotal; ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nome']) ?></td>
                        <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                        <td><?= $item['quantidade'] ?></td>
                        <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td>
                </tr>
            </table>

            <form action="/Carrinho/finalizarCompra" method="POST">
                <button type="submit">Finalizar Compra</button>
            </form>
        <?php else: ?>
            <p>Seu carrinho está vazio 😕</p>
        <?php endif; ?>

    </div>
</main>