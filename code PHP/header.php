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
 					 <li><a href="./filtrer.php">Filtrer</a></li>
 					 <li><a href="./recherche.php">Recherche</a></li>
                <li ><a href="connexion.html">Profile</a></li>
               </ul>
        		</nav>';
}

public function head_employe()
{
	echo"
<nav >
					<ul >
 					 <li><a href=\"./filtrer.php\">Filtrer</a></li>
 					 <li><a href=\"./recherche.php\">Recherche</a></li>
                <li ><a href=\"connexion.html\">Profile</a></li>
               </ul>
        		</nav>";
}
public function head_admin()
{
	echo'
<nav >
					<ul >
 					 <li><a href="./filtrer.php">Filtrer</a></li>
 					 <li><a href="./recherche.php">Recherche</a></li>
                <li ><a href=\"connexion.html">Profile</a></li>
               </ul>
  	</nav>';
}}
