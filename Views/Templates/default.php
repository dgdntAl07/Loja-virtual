<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/css/style.css">

    <!-- Bootstrap connection -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Load CSS -->
    <?php if (isset($viewData['CSS'])) {
        echo $viewData['CSS'];
    }
    ; ?>

    <link rel="shortcut icon" href="<?= BASE_URL; ?>Images/favicon_BellaFragrance.png" type="image/x-icon">
    <title>Bella Fragrance</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom shadow-sm mb-3 ">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <img src="<?= BASE_URL; ?>Images/favicon_BellaFragrance.png" alt="Logo do site" class="img-fluid img-thumbnail">
                </div>
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
                        <a href="#" class="nav-link text-white">Principal</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Categorias</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Limpeza</a></li>
                            <li><a class="dropdown-item" href="#">Perfumes</a></li>
                            <li><a class="dropdown-item" href="#">Cósmeticos</a></li>
                            <li><a class="dropdown-item" href="#">Brindes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Política de Privacidade</a>
                    </li>
                </ul>

            </div>

            <div class="align-self-end">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL . "Login"; ?>" class="nav-link text-white">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASE_URL . "Carrinho"; ?>" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <main>
        <!-- load content -->
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </main>
    <!-- load JavaScript -->
    <?php if (isset($viewData['JS'])) {
        echo $viewData['JS'];
    }
    ; ?>

    <footer class="border-top text-muted align-content-lg-end bg-light">
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