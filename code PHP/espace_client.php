<?php
require_once"fonction.inc.php";
session_start();
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");

    session_start ();
    if (!isset($_SESSION['id_client']) or !isset($_SESSION['password'])) {
          header('Location: ./connexion.php');
         exit();
        echo"<p style='color:red;'>redirection vers la page d'authentification ...</p>";
        exit();
    }
if( !isset($_POST['changer']) && !empty($_POST['id_client']) && !empty($_POST['password'])&& !empty($_POST['password_valid']) ){
            if ($_POST['password']==$_POST['password_valid']){
                $mdp=$_POST['password'];

                    $query=" UPDATE client SET mot_de_passe_personne = ".$_POST['password']." WHERE id_client=".$_POST['id_client']." ";
                    $result=pg_query($db,$query);
                    $row_count= pg_num_rows($result);
                    pg_free_result($result);

            }else {
                echo "<p> Vous n\'avez pas tapé deux fois le même mot de passe !</p> ";
            }

}  
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <title>Espace Client</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <style>
        #file{
            display: none;
        }
        .input-lable{
            margin-left: 30%;
        }
        .input-lable:hover{
            cursor: pointer;
        }
        .submit-lable{
            background: linear-gradient(to bottom right, white #53af57);
            border: 1px solid;
        }
        .submit-lable:hover{
            cursor: pointer;
            transform: scale(1.2);
            background-color:#424242;
            box-shadow: 5px 5px 5px #000;
        }
    </style>
    </head>
    <body>
 <header><a href="https://www.u-cergy.fr/fr/index.php"><img src="ucp.png" alt="ucp" width="150" height="80"></a>
							<?php
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();
       
		?></header>
<h1 style="text-align: center;color: #8A2BE2">Espace Client</h1>
    <section >
        <h2 style="text-align: center;"> Profil</h2>
        <article style="text-align: center;">
        <p>
            <?php 
                echo selectQuery_HTMLTable("SELECT * FROM client WHERE id_client=".$_SESSION['id_client']);
            ?>  
			</p></article>
    </section>
     <section>
       
        <div style="padding:1%; text-align: center;">
            <form id="register_form" method="post" onsubmit="return false;">
              <h2 style=" text-align: center;"> changé votre mot de passe:</h2>
                <label for="id_client">Identifiant :</label><small id="id_client"></small>
                
                <input type="text" placeholder="votre Idetifiant" id="id_client" name="id_client" required/>
                
                <label for="password">votre nouveau mot de passe :</label><small id="passwd"></small>
                
                <input type="password" placeholder="votre mot de passe" id="password" name="password" required/>
                
                <label for="password_valid">confirmer votre mot de passe :</label><small id="password_valid"></small>
                <input type="password_valid" placeholder="votre mot de passe" id="password_valid" name="password_valid" required/>
               
                 
                <input type="submit" value="changer" name="changer">

            </form>
         </div>  
    </section>

    </body>
</html>