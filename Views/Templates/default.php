<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL;?>Assets/css/style.css">

    <!-- Bootstrap connection -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <!-- Load CSS -->
    <?php if(isset($viewData['CSS'])){echo $viewData['CSS'];}; ?>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <!-- load content -->
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>        
    </div>
        <!-- load JavaScript -->
    <?php if (isset($viewData['JS'])) {
        echo $viewData['JS'];
    }; ?>
</body>
</html>