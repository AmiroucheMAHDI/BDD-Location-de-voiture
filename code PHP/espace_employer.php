
<!DOCTYPE html>
<html lang="fr">

		<head>
			<title>Mon espace</title>
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
 
 </style>
		</head>
		<body>
			<header><a href="https://www.u-cergy.fr/fr/index.php"><img src="ucp.png" alt="ucp" width="150" height="80"></a>
							<?php
    	require_once("menu.php");
    	$obj=new Config();
         $obj->choisir_head();
       
		?></header>
 <section>
      <article>
     
   

						 


	     	</article>
	    <article>
	    
	    </article>
				</section>
							
        		
        	
        	 
 
	</body>
		<?php
		/*
			<footer>
        					<div class="par">
        					<div id="texte">
 							<p>©2018 Réalisé par Groupe Projet 21</p> 
 							<p>Université de Cergy-Pontoise
								33, boulevard du Port
								95011 Cergy-Pontoise cedex
								Tél. 01 34 25 60 00</p>
							</div>
							</div>
							<div id="fig">
							<figure>
									<img src="image/icone.jpg" alt="fcb"  width="70" height="30">
							</figure>
							 </div>   		
        		</footer>
        		*/
        		?>
 <footer style="margin-top:0px;" >
					<p class="p1">
						<a href="./index.html" style="margin-right:0;">Retour</a>
					</p>
					
						<p style="text-align:center">Alili-MEZREG-MAHDI</p>
						<p style="text-align:center">||copyright 2018-2019||</p>
						<p style="text-align:center"><a href="https://www.u-cergy.fr/fr/index.html">Université de Cergy Pontoise</a></p>
</footer>
</html>
