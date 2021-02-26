<?php
/**
 * 1. Le dossier SQL contient l'export de ma table user.
 * 2. Trouvez comment importer cette table dans une des bases de données que vous avez créées, si vous le souhaitez vous pouvez en créer une nouvelle pour cet exercice.
 * 3. Assurez vous que les données soient bien présentes dans la table.
 * 4. Créez votre objet de connexion à la base de données comme nous l'avons vu
 * 5. Insérez un nouvel utilisateur dans la base de données user
 * 6. Modifiez cet utilisateur directement après avoir envoyé les données ( on imagine que vous vous êtes trompé )
 */

// TODO Votre code ici.
try {
    $dbname = "table_test_php";
    $server = "localhost";
    $password = "";
    $user = "root";

    $con = new PDO("mysql:host = $server;dbname=$dbname;charset=UTF8", $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = 'Bulle';
    $id = 2;

    $stm = $con->prepare("UPDATE user SET nom = :nom WHERE id = :id");

    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':id', $id);

    //envoie de la requête
    $stm->execute();
    echo"utilisateur est bien modifié";

}
catch(PDOException $exception) {
    echo " Une erreur est survenue ! " .$exception->getMessage();
}



/**
 * Théorie
 * --------
 * Pour obtenir l'ID du dernier élément inséré en base de données, vous pouvez utiliser la méthode: $bdd->lastInsertId()
 *
 * $result = $bdd->execute();
 * if($result) {
 *     $id = $bdd->lastInsertId();
 * }
 */