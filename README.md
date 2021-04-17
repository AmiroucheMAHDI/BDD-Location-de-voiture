## Introduction :
Ceci une solution complète de location de Voitures en ligne qui offre les fonctions standard de fonctionnement d’une Société de Location de Voitures à savoir chercher une Voiture, réserver une voiture, connaître sa facture. Ce site dispose d’une interface graphique Web, et il existe trois profils de personnes qui peuvent utiliser cette Société de Location en Ligne :
* Administrateur du Site.
* Employer de l’agence.
* Propriétaire.
* Client.
## Élaboration du modèle logique :
Le modèle logique est déduit du modèle conceptuel de données. On crée d’abord les tables à partir des « entités » du modèle conceptuel. On obtient les tables suivantes : \
`Admin`(id_admin, motdepasse_admin, nom_admin, prenom_admin) \
`Personne` (nom_personne, prenom_personne, date_de_nai_personne,adresse_personne, email, email_personne, mot_de_passe_personne,numero_telephone) \
`Employer` (#id_employer, siret_agence, date_embauche,salaire_employer) \
`Voiture` (#matricule, marque, date_mise_circulation, kilométrage,Energie) \
`Client` (#id_client, numero_permis) \
`Proprietaire`(#matricule_voitur, id_proprietaire) \
`Contrat_employer_proprietaire`( date_debut, date_fin , montant,id_contrat, #id_employer_contrat,#matricule_contrat) \
`Contrat_location`(date_debut, date_fin, prix, id_contrat_location,#id_annonce_location, #id_client_location, #id_employer_location,#matricule_location) \
Il reste ensuite à créer la table formée par l’association «Ajouter». \
En effet, les cardinalités de cette association nous obligent à créer des tables. Ces deux tables sont les suivantes : \
`Ajouter`(#date_embauche) 
## Fonctionnalités :
### Administrateur du Site :
* S’authentifie dans le système.
* Faire un inventaire complet de toutes Voitures .
* Poster un message pour afficher une promotion a tous les client.
* Supprimer un employé du système.
* Consulter les statistiques des voitures par année.
### Employé :
Après l’identification de l’employé, on se retrouve avec 5 liens : Recherche, affichage des clients par leurs achats, affichage de tous les clients, un filtre d’annonce et Déconnexion. On va sur le lien ‘Recherche’,ça nous permet de faire la recherche parmi les annonces existantes à partir d’un mot clé. \
La condition pour faire une location est que l’exemplaire ne soit pas loué, c’est que la voiture est réservée pour la même période. Car le système de gestion de base de données de la société doit faire en sorte qu’une voiture ne peut être louée qu’une seul fois par jour. \
Les deux autres pages ‘affichage des clients par leurs achats’ et ‘ affichage de tous les clients ‘ permettent d’afficher les montants entrés dans la base de données pour évaluer ‘agence financièrement.
###Client :
Après l’identification du client, on se retrouve avec 3 liens : Recherche, filtre et Déconnexion. On va sur le lien ‘Recherche’, ça nous permet de faire la recherche parmi les annonces existantes à partir d’un mot clé. \
La page ‘filtrer’ permet de filtrer les annonces d’après l’année de mise en circulation, l’énergie de la voiture ainsi que sa marque. \
En ce qui concerne la partie interne de la location c’est à dire le stockage des données, cela consiste à remplir la table annonce avec les informations qui en été fournie par l’identification du client et de l’employé qui a publier l’annonce ainsi, les dates choisis. \
## Conclusion :
Ce projet avait pour but de créer une base de données, de la remplir et ensuite de pouvoir effectuer des requêtes sur celle-ci. Pour arriver à la conception de la base de données, une phase théorique fut nécessaire : le modèle entité association et le modèle relationnel. Cettepremière phase nous a permis de mettre en œuvre la partie théorique du cours de base de données. Ensuite est arrivé la création et le remplissage de la base de données qui nous a permis d’apprendre le langage PostgreSQL. En effet, ce langage nous était un peu sombre. Cette partiemet en œuvre la partie pratique du cours. Ce projet nous a aussi permis de faire appel à des notions qu’on a vu l’année passée dans le langage PHP ou encore utiliser des logiciels tels que pgAdmin et Query
