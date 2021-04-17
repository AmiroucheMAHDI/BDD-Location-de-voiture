-----------------------Requetes impbriquer filtre annonces------------
SELECT id_annonce FROM
 annonce WHERE matricule_voitur IN(
 SELECT matricule FROM voiture WHERE energie='Diesel' AND marque='C5' AND date_mise_circulation='2014-03-23');
