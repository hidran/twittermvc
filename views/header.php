<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
  </head>
  <body  class="d-flex flex-column h-100">
  <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Twitter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Your timeline <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Your tweets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Public profiles</a>
        </li>
      </ul>
 

        <?php
        if(empty($_SESSION['userloggedin'])):?>
        <button data-toggle="modal" data-target="#loginsignup" class="btn btn-outline-success my-2 my-sm-0" type="button">Login/Signup</button>
       <?php else: ?>
        <form method="post" action="actions.php" id="logoutForm">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input type="hidden" name="action" value="logout">
        <button id="logout" class="btn btn-outline-success my-2 my-sm-0" type="button">logout</button>
        </form>
        <?php endif;?>
    </div>
  </nav>
</header>