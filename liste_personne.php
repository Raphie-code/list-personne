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

<h1 style="text-align: center">Liste des contacts</h1>	

<div class="col-12 my-5">

<?php
// 1: Connexion à la BDD 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=premiere_bdd', 'root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?> 

<table class="table">
	<tr>
		<th>Id</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Âge</th>
	</tr>


<?php

// 2: récupérer la liste des personnes dans la bdd
$sql =  'SELECT * FROM personnes';
$res = $pdo->query($sql);

$personnes = $res->fetchAll(PDO::FETCH_ASSOC); /*voir noam pour fetch_assoc qui n'est pas dans la doc php*/


foreach ($personnes as $personne) {
	echo("<tr>");
	echo("<td>".$personne['id']."</td>");
    echo("<td>".$personne['nom']."</td>");
    echo("<td>".$personne['prenom']."</td>");
    echo("<td>".$personne['age']."</td>"); 

// Lien boutton pour supprimer ou modifier une personne    
    echo("<td>" . "<form action='fct/delet_personne.php' method='GET'><input type='hidden' name='id' value='".$personne["id"]."'><button type='submit' class='btn btn-danger'>Supprimer</button></form>" . "</td>");

    echo("<td>" . "<form action='modifier_personne.php' method='GET'><input type='hidden' name='id' value='".$personne["id"]."'><button type='submit' class='btn btn-info'>Modifier</button></form>" . "</td>");
	echo("</tr>");

 } ?>



</table>



<p>Pour ajouter un contact <a href="index.php">cliquez ici</a>.</p>

</div>

</body>
</html>