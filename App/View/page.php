<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Website</title>
    <link rel="stylesheet" href="<?= CONFIG['assets'] ?>css/style.css" />
    <link rel="stylesheet" href="Public/Assets/css/style.css">
    <link href="<?= CONFIG['assets'] ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FONT AWESOME-->
    <script src="https://kit.fontawesome.com/c4a32da8f9.js" crossorigin="anonymous"></script>
</head>

<body class="body">
    <?php
    /**
     * Con esto se carga el body completo de la página, de modo 
     * que todas las librerías son compartidas entre los diferentes
     * layouts del sistema
     */
    include_once($pageLayoutPath);
    ?>

    <script src="<?= CONFIG['assets'] ?>js/scripts.js"></script>
    <script src="<?= CONFIG['assets'] ?>bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

</body>

</html>