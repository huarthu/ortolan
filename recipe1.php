<!DOCTYPE html>
<html lang="fr">

  <head>
  		<?php
		$recette = $_GET["idrecette"];
		$bdd = new PDO('mysql:host=localhost;dbname=p_web2;charset=utf8', 'root', 'root');
		$reponse = $bdd->query('SELECT * FROM t_recipe WHERE idrecette="'.$recette.'"');	
			$userReponse = $bdd->query('SELECT * FROM t_user');
			$user = $userReponse->fetch();
			$donnees = $reponse->fetch();
			
			if($donnees)
			{
		?>
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
    <link href="css/clean-blog.min.css" rel="stylesheet">

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
    <header class="masthead" style="background-image: url('<?php echo $donnees["recImage"]?>')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>
				<?php
					echo $donnees['recTitle'];
				?>
			  </h1>
              <h2 class="subheading">
			  <?php
				echo $donnees['recDescription'];
			  ?>
				</h2>
              <span class="meta">Posté par
                <?php
				echo $user['usrName'];
				echo ' ';
				echo $user['usrSurname'];
				?>
                Le 
				<?php
				echo $donnees['recDate'];
				?>
				</span>
				<div id="rating">
					<a href="#5" title="Donner 5 étoiles">☆</a>
					<a href="#4" title="Donner 4 étoiles">☆</a>
					<a href="#3" title="Donner 3 étoiles">☆</a>
					<a href="#2" title="Donner 2 étoiles">☆</a>
					<a href="#1" title="Donner 1 étoile">☆</a>
				</div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
			<div class="recipe">
              <i class="fa fa-cog" aria-hidden="true"></i>
			  <p>
              <?php
				echo $donnees['recTimeWork'];
				?>
				</p>
              <i class="fa fa-fire" aria-hidden="true"></i>
              <p>
			  <?php
				echo $donnees['recTimeCook'];
				?>
			  </p>
              <i class="fa fa-paw" aria-hidden="true"></i>
			</div>
          <div class="col-lg-8 col-md-10 mx-auto">
		  <p>
            <?php
				echo $donnees['recRecipe']
			?>
			</p>
          </div>
        </div>
      </div>
    </article>

    <hr>
	<?php
		
		} 
		else
		{
			echo "popi";
		}
		?>
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

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
