<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

         //connexion à la base de donnée
          include_once "connexion.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un employé
          $req = mysqli_query($con , "SELECT * FROM emmargement WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($Nom) && isset($Prenom) && $Telephone && $Email){
               //requête de modification
               $req = mysqli_query($con, "UPDATE emmargement SET Nom = '$Nom' , Prenom = '$Prenom' , Telephone = '$Telephone' , Email = '$Email' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "Participant non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier participant : <?=$row['Nom']?> <?=$row['Prenom']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="Nom" value="<?=$row['Nom']?>">
            <label>Prénom</label>
            <input type="text" name="Prenom" value="<?=$row['Prenom']?>">
            <label>Telephone</label>
            <input type="number" name="Telephone" value="<?=$row['Telephone']?>">
            <label>Email</label>
            <input type="email" name="Email" value="<?=$row['Email']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>