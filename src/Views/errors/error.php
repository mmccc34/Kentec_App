<div class="container my-5">
  <div class="alert alert-danger text-center shadow-sm p-4 rounded">
    <h2 class="fw-bold"><?php echo $errorType; ?></h2>
    <h3 class="mt-3"><?php echo $errorMessage; ?></h3>
    <?php
    if($errorType==="Error : 401" && !$_SESSION['IS_AUTHENTICATED']){
      echo "<a href='/login' class='btn btn-primary'>Se connecter</a>";
    }
    ?>
  </div>
</div>