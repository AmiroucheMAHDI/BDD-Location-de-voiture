<?php
//connexion administrateur
function authenticate_admin()
    {  
        $id=$_POST['id_admin'];
        $m=$_POST['password'];
       
        $query = pg_query("SELECT id_admin,motdepasse_admin FROM admin 
        							WHERE id_admin ='$id' 
        							AND motdepasse_admin ='$m'
        							 "); 
       
		  $a=pg_num_rows($query);
         if ($a==1){
                        echo 'connexion reussi';
  								header('Location: espace_admin.php');
  								exit();
  								//if(($query=false))
        }else {
				//echo "Identifiant ou mot de passe Incorrect. ";
            $authenticate_error = "<p class='error_msg'>Nom d'utilisateur ou mot de passe incorrect.</p>";
            //header('location: ./connexion_admin.php');
           
        }
    }  
//connexion proprietaire
function authenticate_proprietaire()
    {  
        $id=$_POST['id_proprietaire'];
        $m=$_POST['password'];
       
        $query = pg_query("SELECT id_proprietaire,mot_de_passe_personne FROM proprietaire 
        							WHERE id_proprietaire ='$id' 
        							AND mot_de_passe_personne ='$m'
        							 "); 
       
		  $a=pg_num_rows($query);
         if ($a==1){
      
/*
if (!$dbh) 
 {
     die("Error in connection: " . pg_last_error());
 }*/

                        echo 'connexion reussi';
  								header('Location: ./espace_proprietaire.php');
  								exit();
  								//if(($query=false))
        }else {
				echo "Identifiant ou mot de passe Incorrect. ";
            $authenticate_error = "<p class='error_msg'>Nom d'utilisateur ou mot de passe incorrect.</p>";
            header('location: connexion_pro.php');
           
        }
    }  
//connexion client
function authenticate()
    {   
    	  $id=$_POST['id_client'];
        $m=$_POST['password'];
       
        $query = pg_query("SELECT id_client,mot_de_passe_personne FROM client 
        							WHERE id_client ='$id' 
        							AND mot_de_passe_personne ='$m'
        							 ");
       
		  $a=pg_num_rows($query);
        if ($a==1){
            
                       
                        echo 'connexion reussi';
  								header('Location: espace_client.php');
  								exit();
        }else{

            $authenticate_error = "<p class='error_msg'>Nom d'utilisateur ou mot de passe incorrect.</p>";
            //header('location: connexion.php');
        }
    }  
//fonction de connexion employé
function authenticate_client()
    {   
        $id=$_POST['id_employer'];
        $m=$_POST['password'];
        $db = pg_query("SELECT id_employer,mot_de_passe_personne 
                        FROM employer 
                        WHERE id_employer ='$id' 
                        AND mot_de_passe_personne ='$m'
        ");

        $a=pg_num_rows($db);

        if ($a==1){
            					echo 'connexion reussi';
  									//header('Location: https://10.40.128.22/~amezrag/bd/nos_client.php');
  									exit();

        }else{

            $authenticate_error = "<p class='error_msg'>Nom d'utilisateur ou mot de passe incorrect.</p>";
            header('location: ./connexionEmploye.php');
        }
    }  
# Cette fonction prend en paramètre une requete SELECT et retourne le résultat sous forme d'un tableau HTML

function selectQuery_HTMLTable($selectQuery)
{	
	$result = pg_query($selectQuery);
	$table="<table>\n";
	$table.="\t<tr>\n";
	$i = 0;
	while ($i < pg_num_fields($result)){
		$fieldName = pg_field_name($result, $i);
		$table.="<th>". $fieldName ."</th>";
		$i++;
	}
	$table.="\t</tr>\n";
	while ($line = pg_fetch_array($result,NULL, PGSQL_ASSOC)) {
	    $table.="\t<tr>\n";
	    foreach ($line as $col_value) {
	        $table.="\t\t<td>$col_value</td>\n";
	    }
	    $table.="\t</tr>\n";
	}
	$table.="</table>\n";
	return $table;
}

# Cette fonction prend en parametre une requete SELECT sur une colone de la table SQL, et retourne le résultat sous forme d'une liste deroulante HTML

function selectColumn_HTMLScrList($selectQuery)
{
	$result = pg_query($selectQuery);
	$fieldName=pg_field_name($result,0);

	$scrList="\t<select name='".$fieldName."'>\n";
	while ($line = pg_fetch_array($result,NULL, PGSQL_NUM)) {
	    $scrList.="\t\t<option value='".$line[0]."'>".$line[0]."</option>\n";
	}
	$scrList.="\t</select>";

	return $scrList;

}


# cette fonction retourne tout le contenu d'une base de données sous forme de tableaux HTML

function dataBaseContent()
{
	$tables=pg_query("SELECT tablename FROM pg_tables
						 WHERE schemaname NOT IN ('pg_catalog','information_schema');");
	$db='';
	while ($line=pg_fetch_array($tables,NULL,PGSQL_NUM)){
		$db.=$line[0];
		$db.="<br/>";
		$db.=selectQuery_HTMLTable("SELECT * FROM ".$line[0]);
		$db.="<br/>";
	}
	return $db;
}

# cette fonction permet la connexion à une base de données en récupérant les informations de connexion depuis un fichier des configuration

function connexion_DB($configfile)
{
	$handle = fopen($configfile,"r");
	if ($handle) {
		$connex_info='';
		while (($buffer = fgets($handle)) !== false) {
			$connex_info.=$buffer." ";
 	  	}
 	  	$connexion_db = pg_connect($connex_info);
 	  	if($connexion_db){
 	  		fclose($handle);
 	  		return $connexion_db;
 	  	}else{
 	  		exit('Connexion impossible : ' . pg_last_error());
 	  	}
	}else{
		exit('Connexion impossible: probleme de fichier de configuration');
	}
}


?>