<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page d'acceuil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	
<div class="container">

<h1 style="text-align: center">Formulaire personnes BDD</h1>	

<div class="col-12 my-5">

<h5><u>Ajouter une personne</u> :</h5>

<form class="mt-5" method="POST" action="fct/add_personne.php">

	<div class="form-group col-6 p-0">
		<label>Nom :</label>
		<input class="form-control my-2"  type="text" placeholder="ex : Dupont" name="nom" id="nom">
	</div> 


	<div class="form-group col-6 p-0">	
		<label>Prénom :</label>
		<input class="form-control my-2"  type="text" placeholder="ex : Marie" name="prenom" id="prenom">
	</div>

	<div class="form-group col-6 p-0">	
		<label>Âge :</label>
		<input class="form-control my-2"  type="number" placeholder="ex : 29" name="age" id="age">
	</div>



	<button type="submit" class="mt-3 mb-5 btn btn-success">Valider</button>

</form>


<p>Pour lister : <a href="liste_personne.php">cliquez ici</a>.</p>

</div>

</body>
</html>