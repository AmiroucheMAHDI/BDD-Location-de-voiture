<?php
require_once"fonction.inc.php";
session_start();
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");

    session_start ();
    if (!isset($_SESSION['id_employer']) or !isset($_SESSION['password'])) {
          header('Location: ./connexionEmployer.php');
         exit();
        echo"<p style='color:red;'>redirection vers la page d'authentification ...</p>";
       
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
 <header><a href="https://www.u-cergy.fr/fr/index.php"><img src="ucp.png" alt="ucp" width="150" height="80"></a>
							<?php
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();
       
		?></header>
<h1 style="text-align: center;color: #8A2BE2">Nos clients</h1>
 
     <section>
       <?php 
                echo selectQuery_HTMLTable("SELECT * FROM client WHERE id_client=".$_SESSION['id_client']);
       ?>  
    </section>

    </body>
</html>