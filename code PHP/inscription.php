<?php
session_start();
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
	if(isset($_POST['nom']) && isset($_POST['prenom'])){
		echo 'a';
	$prenom=$_POST['prenom'];
	$date_nai=$_POST['date_nai'];
	$adresse=$_POST['adresse'];
	$num_permis=$_POST['num_permis'];
	$telephone=$_POST['telephone'];
	$email=$_POST['mail'];
	$password=$_POST['password'];
	$id_client=rand (1,10000);
   $nom=$_POST['nom'];

			$query = pg_query($connexion,"INSERT INTO client VALUES ('$nom', '$prenom', '$date_nai','$adresse', '$email','$password','$telephone','$id_client','$num_permis')");
		}
//(nom_client, prenom_client, date_de_nai_personne, adresse_personne,email_personne,mot_de_passe_personne,numero_telephone,id_client,numero_permis) 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        .check_img{
            margin-right:1%;
            margin-left:1%; 
            height: 5%;
            width: 5%;
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
<div id="container">
         <form action="" method="post">
                <h1>Inscription</h1>
                <label for="nom">Nom :</label><small id="nom"></small>
                <input type="text" placeholder="Votre nom" id="nom" name="nom" maxlength="30" required/>
                <label for="prenom">Prénom :</label><small id="prenom_valid"></small>
                <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" maxlength="30" required/>
  		          <label for="date_naissance">Date de naissance:</label><small id="date_nai"></small>
                <input type="date" placeholder="Date de naissance" id="date_nai" name="date_nai" required/>
                <label for="adresse">Adresse de domicile :</label><small id="adresse_valid"></small>
                <input type="text" placeholder="Votre adresse complète" id="adresse" name="adresse" maxlength="60" required/>
		
                <label for="adresse">numéro de permis :</label><small id="num_permis"></small>
                <input type="int" placeholder="numéro de permis" id="num_permis" name="num_permis" pattern="[0-9]+" required/>
                <label for="telephone">Téléphone :</label><small id="tel_valid"></small>
                <input type="text" placeholder="Votre telephone" id="telephone" name="telephone" maxlength="15" required/>
                <label for="mail">Adresse mail :</label><small id="mail_valid"></small><br/>
                <input type="text" placeholder="Votre mail" id="mail" name="mail" maxlength="50" required/><br/>
                <label for="password">Mot de passe :</label><small id="passwd_valid"></small>
                <input type="password" placeholder="votre mot de passe" id="password" name="password" required/>
    
       
                <input type="submit" value="Je m'inscrie" name="inscrire">
                
        </form>
        <div id="register_status"></div>
</div>

</body>
</html>