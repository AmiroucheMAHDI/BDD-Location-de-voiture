<?php
session_start();
require_once"fonction.inc.php";
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
?>
<!DOCTYPE html>
<html lang="fr">

		<head>
			<title>affichage achats clients </title>
         <meta charset="utf-8">
			<link href="styl.css" rel="stylesheet" type="text/css"/>
 <style>


 fieldset {
     width: 500px;
     }
 div.left {
     width: 50%;
     float: left;
     }
 div.left p {
     text-align: right;
     margin-right: 30px;
     }
 div.right {
     width: 50%;
     float: left;
     }
article p {
  text-align: center;
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

        				

        		
 <section>
      <article>
     <p>affichege de l'essemble des clients par ordre d'achat (meilleurs cliens)</p>
    
<?php
function dataBaseConten()
{




	echo '<br/>';

echo '<table>';
	$reqtout=pg_query("   SELECT id_client,SUM(prix)
 FROM contrat_location
 GROUP BY id_client;
");
 

while($line = pg_fetch_row($reqtout)) {

 $req=pg_query("   SELECT *
 FROM client
 WHERE id_client='$line[0]';
");

while($lin = pg_fetch_row($req)) {
				

				echo '<td >---'.$lin[0].'---</td>';
				echo '<td >--'.$lin[1].'--</td>';
				echo '<td >--'.$lin[2].'--</td>';
				echo '<td >--'.$lin[3].'--</td>';
				echo '<td >--'.$lin[4].'--</td>';
				echo '<td >--'.$lin[5].'--</td>';
				echo '<td >--'.$lin[6].'--</td>';
				echo '<td >--'.$line[1].'£</td>';
				echo '<br/>';echo '<br/>';

				
			echo	'</tr>';	
		}}echo '</table>';}		
		
		echo 		 dataBaseConten();

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
