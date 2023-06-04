<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emmargement Simplon</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <img src="images/logo.png" alt="" left="850px" width="100px" height="85px" border-radius="15px">
        <h1>EMMARGEMENT SIMPLON</h1>
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png">Emmarger</a>
        <div class="table-container">
        <table>
            <tr id="items" class="barre">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($con , "SELECT * FROM emmargement");
                if(mysqli_num_rows($req) == 0 ){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Aucun participant n'a été ajouteé !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['Nom']?></td>
                            <td><?=$row['Prenom']?></td>
                            <td><?=$row['Telephone']?></td>
                            <td><?=$row['Email']?></td>
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>" id="delete"><img src="images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
        </div>
        
   
   
   
   
    </div>
    
</body>
</html>