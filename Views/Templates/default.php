<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Sem funcionar, olhar depois dos ajustes!!! -->
    <!-- <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/css/style.css"> -->

    <!-- Bootstrap connection -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Load CSS -->
    <?php if (isset($viewData['CSS'])) {
        echo $viewData['CSS'];
    }; ?>

    <!-- Estilização -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>

    <link rel="shortcut icon" href="<?= BASE_URL; ?>Images/favicon_BellaFragrance.png" type="image/x-icon">
    <title>Bella Fragrance</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg border-bottom shadow-sm mb-3 navbar-dark bg-dark"> <!-- -->
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <a class="navbar-brand" href="<?= BASE_URL; ?>">Bella<strong>Fragrance</strong></a>
                </div>
            </div>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbar-collapse">
                <span class="navbar-toggle-icon">
                    <i class="bi bi-list-nested"></i>
                </span>
            </button>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav flex-grow-1 gap-3">

                    <li class="nav-item">
                        <a href="<?= BASE_URL; ?>" class="nav-link">Início</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Categorias</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item">Selecione uma categoria</a>
                            </li>
                            <?php foreach ($viewData['categ'] as $cat): ?>
                                <li>
                                    <a class="dropdown-item"
                                        href="<?= BASE_URL . '?id_ctg=' . $cat['id_categoria'] ?>"><?= $cat['nome_categoria'] ?></a>
                                </li>
                            <?php endforeach; ?>



                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Contatos</a>
                    </li>

                </ul>
            </div>

            <div class="align-self-end">
                <ul class="navbar-nav gap-2">

                    <li class="nav-item d-flex align-items-center">
                        <a href="<?= BASE_URL . "Cadastro"; ?> " class="nav-link">Cadastro</a>
                    </li>

                    <li class="nav-item d-flex align-items-center">
                        <a href="<?= BASE_URL . "Login"; ?>" class="nav-link">Login</a>
                    </li>

                    <li>
                        <button class="btn btn-outline-dark p-0" type="submit">
                            <a href="<?= BASE_URL . "Carrinho"; ?>" class="nav-link link-white">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </a>
                        </button>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <main class="align-content-lg-start">
        <!-- load content -->
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </main>
    <!-- load JavaScript -->
    <?php if (isset($viewData['JS'])) {
        echo $viewData['JS'];
    }; ?>

    <footer class="border-top text-muted bg-light">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-4 text-center text-md-left">
                    &copy 2025 - Loja Virtual
                </div>
                <div class="col-12 col-md-4 text-center">
                    <a href="#" class="text-decoration-none text-dark">Politica de Privacidade</a>
                </div>
                <div class="col-12 col-md-4 text-center text-md-right">
                    <a href="#" class="text-decoration-none text-dark">Administrar</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>