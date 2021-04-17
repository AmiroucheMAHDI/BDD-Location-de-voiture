<?php
session_start();
session_unset ();
session_destroy();
header("refresh:1;url=https://10.40.128.22/~amezrag/bd/filtrer.php"); 
echo"<p style='color:red;'>déconnexion ...</p>";
exit();
?>