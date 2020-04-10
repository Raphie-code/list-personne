<?php
// 1: Récupérer les variables du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];


// 2: Se connecter à la BDD
try {
    $pdo = new PDO('mysql:host=localhost;dbname=premiere_bdd', 'root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// 3: Stocker les variables dans la base de données
$req = $pdo->prepare("INSERT INTO personnes (nom, prenom, age) VALUES (:nom, :prenom, :age)");
$req->execute(array(
        "nom" => $nom, 
        "prenom" => $prenom,
        "age" => $age
        ));


// 4: Rediriger vers la liste des personnes
header('Location: http://localhost/tpnoam/liste_personne.php');

exit();