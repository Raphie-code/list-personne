<?php

//Recuperer les variable du formulaire "modifier_personne"
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];


// 1: Se connecter à la BDD
try {
    $pdo = new PDO('mysql:host=localhost;dbname=premiere_bdd', 'root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}


//requete prépare pour UPDATE
$req= $pdo->prepare("UPDATE personnes SET nom=:nom, prenom=:prenom, age=:age WHERE id=:id");

//execution de la requete
//stocker dans une variable un message selon echec/validation de la requete

$executeIsOk = $req->execute(array(
	"id" => $id,
	"nom" => $nom,
	"prenom"=> $prenom,
	"age" => $age
	));


if($executeIsOk){

	$message = 'Le contact a été modifié';
}

else{

	$message = 'Echec de la modification du contact';
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page DELETE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<!-- afficher le message d'erreur ou de validation -->

	<h3><?php echo($message) ?></h3>

	<p><a href="../liste_personne.php"> Revenir à la page "liste"</a></p>

</body>
</html>
