<!-- Formulaire pour modifier, basé sur le même schema que add_personne -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page d'acceuil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<?php
// 1: Récupérer l'id de la personne
$id = $_GET['id'];


// 2: Connexion à la BDD
try {
    $pdo = new PDO('mysql:host=localhost;dbname=premiere_bdd', 'root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// 3: récupérer la personne à modifier grace a son id
$req = "SELECT * FROM personnes WHERE id = $id";
$res = $pdo->query($req);

$personne = $res->fetch(PDO::FETCH_ASSOC); /*voir noam pour fetch_assoc qui n'est pas dans la doc php*/

?>

<div class="container">

    <h1 style="text-align: center">Formulaire update</h1>

    <div class="col-12 my-5">

        <h5><u>Modifier une personne</u> :</h5>

        <form class="mt-5" method="POST" action="fct/edit_personne.php">

            <div class="form-group col-6 p-0">
                <label>Nom :</label>
                <?php
                echo("<input class='form-control my-2' type='text' name='nom' id='nom' value='" . $personne['nom'] . "'>");
                ?>
            </div>

            <div class="form-group col-6 p-0">
                <label>Prénom :</label>
                <?php
                echo("<input class='form-control my-2' type='text' name='prenom' id='prenom' value='" . $personne['prenom'] . "'>");
                ?>
            </div>

            <div class="form-group col-6 p-0">
                <label>Âge :</label>
                <?php
                echo("<input class='form-control my-2' type='number' name='age' id='age' value='" . $personne['age'] . "'>");
                ?>
            </div>

            <!-- On transmet l'id du user à la prochaine page à l'aide d'un input type hidden -->
            <?php
            echo("<input type='hidden' name='id' id='id' value='" . $id . "'>");
            ?>

            <button type="submit" class="mt-3 mb-5 btn btn-success">Valider</button>

        </form>


        <p>Pour lister : <a href="liste_personne.php">cliquez ici</a>.</p>

    </div>

</body>
</html>