  --affichage prix de toutes les location d'un client
 SELECT SUM(prix) FROM contrat_location GROUP BY id_client;
