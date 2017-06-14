<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Association ARME</title>
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
	<div class="header">
			<ul class="logreg">
				<li><a data-toggle="modal" data-target="#loginModal"> Se connecter </a> </li>
				<li><a data-toggle="modal" data-target="#Registration"> S'enregistrer </a></li>
			</ul>
	</div>

	<!--modal login -->
	<div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!--Modal content-->
            <div class="modal-content">
                <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
									&times;</span></button>
                    <h4 class="modal-title">Se connecter</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
								<!-- Email -->
                <div class="form-group">
									<label for="Email" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-4 col-sm-push-1">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-hidden="true">
                    </div>
                </div>
								<!-- mot de passe -->
                <div class="form-group">
									<label for="motdepasse" class="col-sm-2 control-label">Mot de passe:</label>
                    <div class="col-sm-4 col-sm-push-1">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Mot de passe">
                    </div>
                 </div>
								 <!--mdp oublié et s'enregistrer -->
                <div class="form-group">
                    <div class="col-sm-6 col-sm-push-3">
                                <a data-toggle="modal" data-target="#mdpoublieModal"> Mot de passe oublié </a>
                    </div>
										<div class="col-sm-6 col-sm-push-0">
																<a data-toggle="modal" data-target="#Registration"> S'enregistrer </a>
										</div>
                </div>
								<!-- boutton connexion et quitter -->
                <div class="modal-footer">
                        <div class=" col-sm-1 col-sm-push-2">
                            <button type="submit" class="btn btn-primary">connexion</button>
                        </div>
												<div class=" col-sm-2 col-sm-push-7">
				                	<button type="button" class="btn btn-default btn--sm" data-dismiss="modal">Quitter</button>
												</div>
                </div>

                </form>
                </div>
            </div>
        </div>
    </div>

		<!-- mdp oublié -->
		<div id="mdpoublieModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h4 class="modal-title">Mot de passe perdu</h4>
					</div>
					<div class="modal-body">
						<p>Veuillez saisir votre adresse email</p>
						<input type="text" class="form-control" id="nom" email="nom" placeholder="Email" aria-hidden="true">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">Valider</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
					</div>
				</div>
			</div>
		</div>

		<!-- modal register-->
			<div  id="Registration"  class="modal fade" role="dialog">
						<div class="modal-dialog">
								<!--Modal content-->
								<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
										&times;</span></button>
												<h4 class="modal-title">S'enregistrer</h4>
										</div>
										<div class="modal-body">
										<form method="post" id="insert_form11" class="form-horizontal" >
															<!-- civilité -->
																<div class="form-group">
																	<label for="civilité" class="col-sm-2 control-label">Civilité:</label>
																	<div class="col-sm-2 col-sm-push-1">
																			<select class="form-control" >
																					<option>Mme.</option>
																					<option>Mlle.</option>
																					<option>Mr.</option>
																			</select>
																	</div>
															</div>
															<!--nom -->
															<div class="form-group">
																	<label for="nom" class="col-sm-2 control-label">Nom:</label>
																	<div class="col-sm-6 col-sm-push-1">
																			<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" aria-hidden="true">
																	</div>
															</div>
															<!-- prénom -->
															<div class="form-group">
																	<label for="prénom" class="col-sm-2 control-label">Prénom:</label>
																	<div class="col-sm-6 col-sm-push-1">
																			<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" aria-hidden="true">
																	</div>
															</div>
															<!-- mail -->
															<div class="form-group">
																	<label for="Email" class="col-sm-2 control-label">Email:</label>
																	<div class="col-sm-6 col-sm-push-1">
																			<input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-hidden="true">
																	</div>
															</div>
															<!-- mdp -->
															<div class="form-group">
																<label for="motdepasse" class="col-sm-2 control-label">Mot de passe:</label>
																	<div class="col-sm-6 col-sm-push-1">
																			<input type="text" class="form-control" id="mdp" name="mot de passe" placeholder="Mot de passe">
																	</div>
															 </div>
															 <!-- confirmation mdp -->
															 <div class="form-group">
																 <label for="confirmationmotdepasse" class="col-sm-2 control-label">Confirmez:</label>
																	<div class="col-sm-6 col-sm-push-1">
																			<input type="text" class="form-control" id="mdp1" name="mot de passe" placeholder="Mot de passe">
																	</div>
															 </div>
															 <!-- s'enregistrer -->
															<div class="modal-footer">
																	<!-- Enregistrer -->
																	<div class=" col-sm-1 col-sm-push-2">
																			<button type="submit" class="btn btn-primary">S'enregistrer</button>
																	</div>
																	<!-- quitter -->
																	<div class=" col-sm-1 col-sm-push-5">
																		<button type="button" class="btn btn-default btn--sm" data-dismiss="modal">Quitter</button>
																	</div>
															</div>
										</form>
									</div>
								</div>
						</div>
				</div>


	<!-- Navbar Up -->
	<nav class="topnavbar navbar-default topnav">
		<a class="logo" href="#"><img src="image_association/logo/arme_logo_4.png" alt="logo"></a>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
					<span class="sr-only"> Toggle navigaion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>


			</div>
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<!-- menu 1 -->
				<li class="active"><a href="index.php">ACCEUIL</a> </li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle"	data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROJET <span class="caret"></span></a>
					<ul class="dropdown-menu dropdowncostume">
						<li><a href="#">Sport</a></li>
						<li><a href="#">Old</a></li>
						<li><a href="#">New</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<!-- menu 2 -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ARCHIVES <span class="caret"></span></a>
						<ul class="dropdown-menu dropdowncostume">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="3">3</a></li>
						</ul>
				</li>
				<li>

					<!--menu 3 -->
					<a href="#">PARTENARIAT</a>

				</li>
				<li>
					<a href="gerer_membre_admin.php">MEMBRES</a>
				</li>
			</ul>
		</div>
	</nav>
</div>

<!-- fin header -->
