 --affichage l'identifiant, nom et prénom les proprietaires qui ont ce type de voiture
 SELECT id_proprietaire,nom_personne, prenom_personne FROM         
 proprietaire WHERE matricule_voitur IN (
 SELECT matricule FROM voiture WHERE energie='Diesel' AND marque='C5' AND date_mise_circulation='2014-03-23');
