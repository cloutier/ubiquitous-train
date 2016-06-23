<?php
require "options.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Papa Joe Pizza</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">Pizza Papa Joe</h3>
      </div>
      <?php 
        if ($_GET['error'] == "condiments") {
          echo '<div class="alert alert-warning">Veuillez choisir 3 condiments et une grosseur de pizza</div>';
	} elseif ($_GET['error'] == "email") {
          echo '<div class="alert alert-warning">Veuillez rentrer un email valide</div>';
	} elseif ($_GET['error'] == "refresh") {
          echo '<div class="alert alert-warning">Veuillez rafraichir la page</div>';
	}
      ?>
      <form action="submit.php" method="post">
        <div class="jumbotron">
          <h3>Choisissez la grosseur de votre pizza</h3>
          <div class="btn-group btn-group-lg" data-toggle="buttons">
            <?php
              foreach($pizzaSizes as $size => $price) {
                echo '<label class="btn btn-primary">';
                  echo '<input type="radio" name="size[' . hash('md5', "$size,$price") .']" autocomplete="off">' . $size . ' (' . money_format('%i', $price) . '$)';
                echo '</label>';
              }
             ?>
          </div>
        </div>
        <div class="row marketing">
          <h3> Choisissez 3 condiments: </h3>
          <div class="col-lg-12" data-toggle="buttons">
            <?php 
              foreach($condiments as $name => $price) {
                echo '<label class="btn btn-lg btn-default" style="margin:10px;" >';
                  echo '<input type="checkbox" name="condiments[' . hash('md5', "$name,$price") .']" autocomplete="off">' . $name . ' (' . money_format('%i', $price) . '$)';
                echo '</label>';
              }
            ?>
          </div>
        </div>
       <p><input type="text" name="email" class="form-control" placeholder="email" aria-describedby="basic-addon1"></p>
  
        <p><input type="submit" class="btn btn-lg btn-success" href="#" role="button" value="Commander"></p>
      </form>
        
      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
