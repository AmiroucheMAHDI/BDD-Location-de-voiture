<?php
 session_start();

require_once"fonction.inc.php";
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
$authenticate_error = null;

   
?>  
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connexion Employer</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
 
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
            <h1>Connexion Employé(e)</h1>  
                <label><b>Identifiant:</b></label>
                <input type="text" placeholder="Identifiant" id="id_employer" name="id_employer" maxlength="30" required/><br/>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" minlength="5" maxlength="20" required>
                <?php
                    if($authenticate_error != null){
                        echo($authenticate_error);
                    }
if(isset($_POST['id_employer']) && isset($_POST['password']) ){
       if(!empty($_POST['id_employer']) && !empty($_POST['password'])){
        $_SESSION['id_employer']=$_POST['id_employer'];
        $_SESSION['password']=$_POST['password'];
        authenticate_client();
       }elseif(isset($_SESSION['id_employer']) && isset($_SESSION['password'])){
        authenticate_client();
       }}
                ?>
                <input type="submit" id='submit' name="LOGIN" value='se connecter' >
        </form>
       
    </div>
    <footer style="margin-top:0px;" >
					<p class="p1">
						<a href="./index.html" style="margin-right:0;">Retour</a>
					</p>
					
						<p style="text-align:center">Alili-MEZREG-MAHDI</p>
						<p style="text-align:center">||copyright 2018-2019||</p>
						<p style="text-align:center"><a href="https://www.u-cergy.fr/fr/index.html">Université de Cergy Pontoise</a></p>
</footer>
</body>
</html>  