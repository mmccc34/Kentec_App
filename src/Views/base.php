<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/build/app.css">

    <title><?php echo $title?></title>
</head>
<body>
    <?php include_once __DIR__ .'/partials/header.php'; ?>

    <?php include_once __DIR__ . $view; ?>

    <?php include_once __DIR__ . '/partials/footer.php';; ?>
</body>
</html>