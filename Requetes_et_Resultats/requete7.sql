---Afficher les mielleurs clients de l'agence---
SELECT id_client,SUM(prix)
 FROM contrat_location
 GROUP BY id_client
