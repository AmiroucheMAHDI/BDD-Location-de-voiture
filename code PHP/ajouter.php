<?php
session_start();
require_once"fonction.inc.php";
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
    session_start ();
    if (!isset($_SESSION['id_employer']) or !isset($_SESSION['password'])) {
          header('Location: ./connexionEmployer.php');
         exit();
        echo"<p style='color:red;'>redirection vers la page d'authentification ...</p>";
    }
 if (isset($_SESSION['deposer'])&& !empty($_POST['titre']) && !empty($_POST['prix']) && !empty($_POST['description'])){
    $id= $_SESSION['id_employer'];
    $titre=$_POST['titre'];
    $prix=$_POST['prix'];
    $description=$_POST['description'];
    $matricule=$_POST['matricule'];
    $id_annonce=rand (1,10000);
            $result = mysql_query('SELECT EXISTS (SELECT *FROM voiture WHERE ="' . $matricule . '" ) AS article_exists');
            $req = mysql_fetch_array($result);
            if ($req['article_exists'] == true) {
                    .           $query = pg_query($db,"INSERT INTO annonce VALUES ('$matricule', '$id_annonce', '$description','$titre','$prix')");


            } else {
                echo"<p style='color:red;'>cette votoire n\'existe pas dans notre agence !</p>"; 
            }

                

 }else{
    echo"<p style='color:red;'>il faut completer votre formulaires </p>";

 }

 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <title>Espace Employer</title>
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
 <header>
 <a href="https://www.u-cergy.fr/fr/index.html"><img src="ucp.png" alt="ucp" width="150" height="80"></a>
							<?php
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();
       
		?>
 </header>
<h1 style="text-align: center;color: #8A2BE2">Espace Employé(e)</h1>
 
     <section>
        <h2 style="margin-left: 10%;"> Depot D'annonce</h2>
        <div style="padding:1%; text-align: center;">
            <form id="register_form" method="" onsubmit="return false;">
              <h2 style="margin-left: 10%;"> Annonce:</h2>

                <label for="matricule">Matricule:</label><small id="matricule"></small>
                <input type="text" placeholder="matricule" id="matricule" name="titre" required/>
                <label for="titre">Titre:</label><small id="titre"></small>
                <input type="text" placeholder="titre" id="titre" name="titre" required/>
                <label for="prix">prix:</label><small id="passwd"></small>
                <input type="prix" placeholder="votre mot de passe" id="prix" name="prix" required/>
                 <label for="discription">Description du véhuicule:</label><small id="discription"></small>
                <input type="description" placeholder="description" id="description" name="description" required/>
                <label for="discription">Image du véhuicule:</label><small id="discription"></small>
                 <input type="file" name="image" accept="image/*" required/>
 
                <input type="submit" value="Deposer" name="deposer">

            </form>
         </div>  
    </section>

    </body>
</html>