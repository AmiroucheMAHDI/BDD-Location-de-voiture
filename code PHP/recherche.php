<?php
session_start();
require_once"fonction.inc.php";
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
?>
<!DOCTYPE html>
<html lang="fr">

		<head>
			<title>Recherche</title>
         <meta charset="utf-8">
			<link href="styl.css" rel="stylesheet" type="text/css"/>

 
		</head>
		<body>
			
				<header>
						<a href="https://www.u-cergy.fr/fr/index.php"><img src="ucp.png" alt="ucp" width="150" height="80"></a>
							<?php
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();
       
		?>
				</header>


        		
 <section>
      <article>
     <p>Recherche d'annonce par mots cles</p>
      <form method="post" action="">
      
					<input type="text" value="" id="n" name="n">
					<input type="submit" value="Recherche" name="Recherche">
				</fieldset>
			</form>
<?php
function dataBaseConten()
{
$n=$_POST["n"];

$tables=pg_query("SELECT * FROM annonce WHERE description LIKE '$n'");

	echo '<br/>';

echo '<table>';
	$reqtout=pg_query("SELECT prix,description,titre FROM annonce  ");
while($lin = pg_fetch_row($reqtout)) {

 
						 				 	if ((strpos(strtolower($lin[1]),strtolower($n))!==false)||(strpos(strtolower($lin[2]),strtolower($n))!==false)){	
				echo '<td >';
					echo '<p>Déscription de l\'annonce : <br />'.$lin[1].'<br /></td>';
						echo '<td>'.$lin[2].'</a></br></br></br>';
					   echo  ''.$lin[0].'€</td>';
					echo '<tr>';
					
		}}		}
		if(isset($_POST['n'])){
		echo 		 dataBaseConten();
}
?>

	     	</article>
	   
				</section>
							
        		
        	
        	 
 
<?php
	pg_close($connexion);
?>
		</body>
	
 <footer style="margin-top:0px;" >
					<p class="p1">
						<a href="./index.html" style="margin-right:0;">Retour</a>
					</p>
					
						<p style="text-align:center">Alili-MEZREG-MAHDI</p>
						<p style="text-align:center">||copyright 2018-2019||</p>
						<p style="text-align:center"><a href="https://www.u-cergy.fr/fr/index.html">Université de Cergy Pontoise</a></p>
</footer>
</html>
