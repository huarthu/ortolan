<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=p_web2;charset=utf8', 'root', 'root');
?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ortolan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Ortolan</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">A propos</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="recipe.php">Recettes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">Ajouter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/add.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Ajouter une recette</h1>
              <span class="subheading">Pour partager une recette, remplissez ce formulaire.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
	<?php
	if(!isset($_SESSION['user']))
	{
		echo "Connectez-vous pour ajouter une recette";
	}
	else
	{
		$idUserRequest = $bdd->query('SELECT usrAdmin from t_user where usrMail = "'.$_SESSION['user'].'";');
		$idUser = $idUserRequest->fetch();
		if($idUser[0] == '1')
		{
			
		?>
		<p>Veuillez remplire tous les champs de ce formulaire</p>
		<form name="addRecipe" action="send.php" method="post" id="addRecipe" enctype="multipart/form-data">
            <div class="control-group">
              <div class="control-group">
				<div class="vegan">
					<label>Vegan</label>
					<input type="checkbox" id="veganFood" name="veganForm">
				</div>
            </div>
			  <div class="form-group floating-label-form-group controls">
                <label>Titre de la recette</label>
                <input type="text" class="form-control" placeholder="Titre de la recette" id="title" name="titleForm" required data-validation-required-message="Veuillez entrer le nom de la recette.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
			 <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Description de la recette" id="description" name="descriptionForm" required data-validation-required-message="Veuillez entrer la description de la recette.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Temps de préparation</label>
                <input type="text" class="form-control" placeholder="Temps de préparation" id="work" name="timeWorkForm" required data-validation-required-message="Veuillez entrer un temps de préparation.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Temps de cuisson</label>
                <input type="text" class="form-control" placeholder="Temps de cuisson" id="baking" name="timeCookForm" required data-validation-required-message="Veuillez entrer un temps de cuisson.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Liste des ingrédients</label>
                <input type="text" class="form-control" placeholder="Liste ingrédients" id="baking" name="timeCookForm" required data-validation-required-message="Veuillez entrer un temps de cuisson.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Recette</label>
                <textarea rows="20" class="form-control" placeholder="Recette" id="recipe" name="recipeForm" required data-validation-required-message="Veuillez écrire une recette."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Photo de la recette</label>
                <input type="file" class="form-control"id="file" name="fileToUpload" required data-validation-required-message="Veuillez insérer une image.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<br>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Ajouter</button>
            </div>
          </form>
		<?php
		
		}
		else
		{
			echo "Vous n'êtes pas autoriser à ajouter une recette.";
		}
	}
		?>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://twitter.com/OrtolanOfficiel?lang=fr" target="_blank"">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="mailto:ortolancontact@gmail.com">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; ETML 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
