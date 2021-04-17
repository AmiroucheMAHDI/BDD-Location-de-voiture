<?php
session_start();
require_once"fonction.inc.php";
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
?>
<!DOCTYPE html>
<html lang="fr">

		<head>
			<title>FILTRER</title>
         <meta charset="utf-8">
			<link href="styl.css" rel="stylesheet" type="text/css"/>
 <style>
 header{
  	  background-image: url(./image/head.png);
	  background-size: 100%;	
			  			
 			 }

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
 table {
 border-width:1px; 
 border-style:solid; 
 border-color:black;
 width:50%;
 }
td { 
 border-width:1px;
 border-style:solid; 
 border-color:red;
 width:50%;
 }
 
 </style>
		</head>
		<body>
			
				<header>
						
					<?php
									echo '<a href="https://www.u-cergy.fr/fr/index.html"><img src="ucp.png" alt="ucp" width="150" height="80"></a>';
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();

       
		?>
				</header>

        				

        		
 <section>
      <article style="text-align:center;">
     <fieldset>FILTRER
      <form method="post" action="" >
      
				
						<label name='marque'>Marque </label>
						<?php
			echo selectColumn_HTMLScrList("SELECT DISTINCT marque FROM voiture");
						?>
						<label name='energie'>Energie</label>
						<?php
							echo selectColumn_HTMLScrList("SELECT DISTINCT energie FROM voiture");
						?>
						<label name='date_mise_circulation'>Année</label>
					
				<select name="date_mise_circulation">
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>

    
</select>

						
					<input type="submit" value="FILTRER" name="FILTRER">
				
			</form></fieldset>
<?php
# Cette fonction prend en paramètre une requete SELECT et retourne le résultat sous forme d'un tableau HTML


//if(isset($_POST['Filtrer']) && isset($_POST['Marque']) && isset($_POST['Energie']) && isset($_POST['Année'])){
				//echo "<p>Vous avez choisi la carte mère \"".$_POST['carte_mere']."\" et le processeur \"".$_POST['processeur']."\"</p>";
				if(isset($_POST['Marque'])){
$marque=$_POST['marque'];
$energie=$_POST['energie'];
$annee=$_POST['date_mise_circulation'];			
$req= "SELECT id_annonce FROM annonce 
						 WHERE matricule_voitur IN 
						 ( SELECT matricule FROM voiture 
						 WHERE energie='$energie' 
						 AND marque='$marque' 
						 )";}
function dataBaseConten()
{
$annee=$_POST['date_mise_circulation'];
$marque=$_POST['marque'];
$energie=$_POST['energie'];

$r=$_POST['marque'];
$tables=pg_query("SELECT id_annonce FROM annonce 
						 WHERE matricule_voitur IN 
						 ( SELECT matricule FROM voiture 
						 WHERE energie='$energie' 
						 AND marque='$marque'
                   AND( select date_part('year', date_mise_circulation))=$annee
						 )");

	echo '<br/>';
$a=pg_num_rows($tables);
echo '<table>';
	
while($line = pg_fetch_row($tables, null, PGSQL_ASSOC)) {
foreach($line as $row) {
 
  $reqprix=pg_query("SELECT prix FROM annonce 
						 WHERE id_annonce=$row");
  $reqdescription=pg_query("SELECT description FROM annonce 
						 WHERE id_annonce=$row");
  $reqtitre=pg_query("SELECT titre FROM annonce 
						 WHERE id_annonce=$row");	
						 				 		
						 				 		
$reqtout=pg_query("SELECT prix,description,titre,id_annonce FROM annonce 
						 WHERE id_annonce=$row");					 				 					 
$lin = pg_fetch_array($reqtout, 0, PGSQL_NUM);

				
				
					echo '<td >';
					echo '<p><img src="photos_annonces/'.$lin[3].'.jpg" style="width:200px;height:150px;"/><br />'.$lin[1].'<br /></td>';
						echo '<td>marque:        '.$lin[2].'</a></br></br></br>';
					   echo  'prix :   '.$lin[0].'€</td>';
					   
					
					echo '<tr>';
					
		}}}
		if (isset($_POST['marque'])){	
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
					
					
						<p style="text-align:center">Alili-MEZREG-MAHDI</p>
						<p style="text-align:center">||copyright 2018-2019||</p>
						<p style="text-align:center"><a href="https://www.u-cergy.fr/fr/index.html">Université de Cergy Pontoise</a></p>
</footer>
</html>
