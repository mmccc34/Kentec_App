<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/build/app.css">
    <script defer src="./../build/app.bundle.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

  <title><?php if (isset($title)) echo $title; ?></title>
</head>

<body>
  <?php include_once __DIR__ . '/partials/header.php'; ?>

  <img src="/build/images/kentec-logo.svg" alt="Logo Kentec" class="img-fluid mb-4 d-block mx-auto" style="max-width: 25%; height: auto; margin: 15px 0px;">

  <?php include_once $view;?>

  <?php include_once __DIR__ . '/partials/footer.php'; ?>
</body>

</html>