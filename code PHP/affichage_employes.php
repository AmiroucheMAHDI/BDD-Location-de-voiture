<?php
session_start();
require_once"fonction.inc.php";
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
?>

<!DOCTYPE html>
<html lang="fr">

		<head>
			<title>Affichage employes</title>
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
     <p>Recherche des employes par salaires</p>
      <form method="post" action="">
      
					<label name='max'>Max</label>
					
				<select name="max">
    <option value="1000">1000</option>
    <option value="1500">1500</option>
    <option value="2000">2000</option>
     <option value="2500">2500</option>
      <option value="3000">3000</option>
       <option value="350000">plus de 3500</option>
</select>
<label name='max'>Min</label>
					
				<select name="min">
				<option value="0">moin de 1000</option>
    <option value="1000">1000</option>
    <option value="1500">1500</option>
    <option value="2000">2000</option>
     <option value="2500">2500</option>
      <option value="3000">3000</option>
       <option value="3500">plus de 3500</option>
</select>
					<input type="submit" value="Recherche" name="Recherche">
				</fieldset>
			</form>
<?php
function dataBaseConten()
{
$max=$_POST["max"];
$min=$_POST["min"];


	echo '<br/>';
if($max>$min){
echo '<table><tr>';
	$reqtout=pg_query( "SELECT * FROM employer WHERE salaire_employer>'$min' AND salaire_employer<'$max';");
while($lin = pg_fetch_row($reqtout)) {

 

				echo '<td >---'.$lin[0].'---</td>';
				echo '<td >--'.$lin[1].'--</td>';
				echo '<td >--'.$lin[2].'--</td>';
				echo '<td >--'.$lin[3].'--</td>';
				echo '<td >--'.$lin[4].'--</td>';
				echo '<td >--'.$lin[5].'--</td>';
				echo '<td >--'.$lin[6].'--</td>';
				echo '<td >--'.$lin[10].'Â£</td>';
				echo '<br/>';echo '<br/>';

				
			echo	'</tr>';	
		}	}else echo'<p>Le salaire max doit etre superieur à salaire min</p>';}
	
		echo 		 dataBaseConten();
//selectQuery_HTMLTable("SELECT * FROM employer WHERE salaire_employer>'$min' AND salaire_employer<'$max';");
?>

	     	</article>
	   
				</section>
							
        		
        	
        	 
 
<?php
	pg_close($connexion);
?>
		</body>
	

</<html>
