<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/css/style.css">

    <!-- Bootstrap connection -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Load CSS -->
    <?php if (isset($viewData['CSS'])) {
        echo $viewData['CSS'];
    }; ?>
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">Loja <strong>Virtual</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="navbar-toggle-icon"></span>
            </button>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav flex-grow-1 gap-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Categorias</a>
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
                        <a href="#" class="nav-link text-white">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- load content -->
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    <!-- load JavaScript -->
    <?php if (isset($viewData['JS'])) {
        echo $viewData['JS'];
    }; ?>

</body>

</html>