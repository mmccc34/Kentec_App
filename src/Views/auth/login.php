<div class="container">
      <div class="d-flex justify-content-center vh-50 align-items-center flex-column" style="margin: 40px";>

          <form class="w-50" method="post" action="">
          <h4 class="text-danger"><?php if (isset($message))  echo $message;?></h4>
          <label for="login" class="form-label">Email</label>
          <input type="email" class="form-control" id="login" name="email" required/>
          <label for="pwd" class="form-label">Mot De Passe</label>
          <input type="password" class="form-control" id="pwd" name="password" required/>
          
          <button type="submit" class="btn btn-success mt-3">Se Connecter</button>
    </form>
    <div>        <a href="/register" class="btn btn-primary" style="margin-top: 25px;">Créer un compte</a>
    </div>
      </div>