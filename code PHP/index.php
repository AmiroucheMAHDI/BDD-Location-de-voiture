<?php
require_once"fonction.inc.php";
session_start();
$connexion=pg_connect("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");
?>
<!DOCTYPE html>
<html lang="fr">

		<head>
			<title>Accueil</title>
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
				<a href="https://www.u-cergy.fr/fr/index.php"><img src="ucp.png" alt="ucp" width="150" height="80"></a>
							<?php
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();
       
		?></header>
        		
 <section>
      <article>
<?php
 
 $reqtout=pg_query("SELECT prix,description,titre,id_annonce FROM annonce");					 				 					 
  
 $a=pg_num_rows($reqtout);
 
 echo '<table>';
 	echo '<tr style="text-align:center;">';
// $lin = pg_fetch_array($reqtout, 0, PGSQL_NUM); 
 //while($line = pg_fetch_row( $reqtout, null, PGSQL_ASSOC)) {
 //for($i=1;$i<$a+1;){
 while ($row = pg_fetch_row($reqtout)) {

  echo '<td style="padding:10px 50px;text-align:center;" >';
       			//echo '<img src="./photos_annonces/" alt="" />'
       			echo '<img src="photos_annonces/'.$row[3].'.jpg" style="width:200px;height:150px;"/>';
					echo '<p> <br />'.$row[2].'<br /></td>';
						echo '<td>description :'.$row[1].'</a></br></br></br>';
					   echo  'prix :'.$row[0].'€</td>';
					echo '<tr>';
}

 echo '<table>'; 
?>
	 	</article>
</section>
							
        		
        	
        	 
 
	</body>
		
 <footer style="margin-top:0px;" >
					
					
						<p style="text-align:center">Alili-MEZREG-MAHDI</p>
						<p style="text-align:center">||copyright 2018-2019||</p>
						<p style="text-align:center"><a href="https://www.u-cergy.fr/fr/index.html">Université de Cergy Pontoise</a></p>
</footer>
</html>
