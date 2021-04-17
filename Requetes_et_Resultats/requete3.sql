 --affichage l'identifiant, nom et prénom des employes par leur salaire
SELECT id_employer,nom_personne, prenom_personne,date_embauche FROM
 employer WHERE salaire_employer>1200 AND salaire_employer<2000;
