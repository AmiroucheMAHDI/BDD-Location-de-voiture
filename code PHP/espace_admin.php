
<!DOCTYPE html>
<html lang="fr">

		<head>
			<title>administrateur</title>
         <meta charset="utf-8">
			<link href="./style.css" rel="stylesheet" type="text/css"/>
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
 
 </style>
		</head>
		<body>
			<header><a href="https://www.u-cergy.fr/fr/index.php"><img src="ucp.png" alt="ucp" width="150" height="80"></a>
							<?php
							session_start();
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();
       
		?></header>
 <section>
      <article>
     
   

						 


	     	</article>
	    
				</section>
		
 
	</body>
	
 <footer style="margin-top:0px;" >
					
					
						<p style="text-align:center">Alili-MEZREG-MAHDI</p>
						<p style="text-align:center">||copyright 2018-2019||</p>
						<p style="text-align:center"><a href="https://www.u-cergy.fr/fr/index.html">Université de Cergy Pontoise</a></p>
</footer>
</html>
