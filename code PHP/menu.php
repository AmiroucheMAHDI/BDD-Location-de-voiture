
<?php

class Config{
  
      
      function ifsessionExists(){
             
             
              if( isset($_SESSION['id_employer']))
             {
                 return 3;
             }
                 else if( isset($_SESSION['id_admin']))
             {
                     return 4;
             }
                else if( isset($_SESSION['id_client']))
             {
              return 1;   
             }
                 
                    
         else{
               return 6;
             }
         }
         
         function choisir_head()
         {
             	
	


	$obj=new Config();
	$b=$obj->ifsessionExists();
	
	 	
	$head= new Header();
	
	if($b==1)
	    {
	       return  $head->head_client();
	    }
	   
	    else if($b==3)
	    {
	        
           return $head->head_employe();
	    }
	    else if($b==4)
	    {
	        
           return $head->head_admin();
	    }
	   
	    else if($b==6)
	    {
	      return $head->head();
	    }
	    
    }
}

class Header{
	

public function head()
{
	 echo'
<nav >
					<ul >
 					 <li><a href="./filtrer.php">Filtrer</a></li>
 					 <li><a href="./recherche.php">Recherche</a></li>
                <li ><a href="connexion.html">Profile</a></li>
               </ul>
        		</nav>';
}

public function head_client()
{
	echo'
<nav >
					<ul >
 					 <li><a href="filtrer.php">Filtrer</a></li>
 					 <li><a href="recherche.php">Recherche</a></li>
 					 <li><a href="espace_client.php">Mon espace</a></li>
                <li ><a href="deconnexion.php">Deconnecter</a></li>
               </ul>
        		</nav>';
}

public function head_employe()
{
	echo"
<nav >
					<ul >
 					 <li><a href=\"filtrer.php\">Filtrer</a></li>
 					 <li><a href=\"espace_employer.php\">Mon Espace</a></li>
 					 <li><a href=\"affichage-clients-achats.php\">Best clients</a></li>

 					  <li><a href=\"nos_client.php\">Clients</a></li>
 					 <li><a href=\"recherche.php\">Recherche</a></li>
                <li ><a href=\"deconnexion.php\">Deconnexion</a></li>
               </ul>
        		</nav>";
}
public function head_admin()
{
	echo'
<nav >
					<ul >
					 <li><a href="espace_proprietaire.php.php">Filtrer</a></li>
 					 <li><a href="filtrer.php">Filtrer</a></li>
 					 <li><a href="recherche.php">Recherche</a></li>
                <li ><a href=\"deconnexion.php">Deconnexion</a></li>
               </ul>
  	</nav>';
}
}

?>