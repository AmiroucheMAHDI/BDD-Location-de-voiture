--INSERTION

INSERT INTO admin VALUES(1234,'Amirouche2018','mahdi','Amirouche');
--------------Insertion dans la voiture------------------------
INSERT INTO voiture VALUES('SC-910-sx','207','2017-02-12',12980,'Diesel');
INSERT INTO voiture VALUES('sx-230-fe','206','2006-02-02',222980,'Essence');
INSERT INTO voiture VALUES('DE-320-cd','C5','2014-03-23',82980,'Diesel');
INSERT INTO voiture VALUES('dw-210-ft','106','2005-07-02',170980,'Essence');
INSERT INTO voiture VALUES('dw-320-cp','306','2013-04-23',122980,'Diesel');

    ------------Insertion dans la table client------------------------
  
INSERT INTO client VALUES('anis','mezreg','1996-12-03','61 rue de moulhouse','anisjob@gmal.com','anis1996',015327987,287,987654);
INSERT INTO client VALUES('anis','mezreg','1996-03-29','2 impasse des terrasses','anisjob@gmail.com','anis15',0764357865,1286,3489765);  
INSERT INTO client VALUES('taher','rabhi','1998-03-19','2 rue de port','taher96@gmail.com','taher1989',076420987,1987,3482998);
INSERT INTO client VALUES('amghid','mezreg','1994-03-09','2 impasse des terrasses','amghid@gmail.com','anis15',0664357865,1,3489765);  
INSERT INTO client VALUES('amirouche','rabhi','1991-02-19','2 rue de port','amirouche@gmail.com','taher1989',056420987,2,3482998);

    -------------------Insertion dans la table employer-----------------
INSERT INTO employer VALUES('amghid','Alili','1994-12-29','3 impasse des terrasses','amghid@gmail.com','Amghid1994',72390700,122,239876,'2018-02-10',1297.3);
INSERT INTO employer VALUES('amine','mesbahi','1978-10-09','3 rue de pot','aminemesbahi29@gmail.com','Amine1234',7223330,123,239876,'2013-01-10',1897.3);
INSERT INTO employer VALUES('ahcene','medan','1990-12-12','3 impasse des terrasses','ahcene@gmail.com','Ahcene1992',72323870,124,239826,'2016-02-10',1497.3);
INSERT INTO employer VALUES('amer','paul','1979-11-07','3 rue de pot','amer@gmail.com','Amine1234',7223330,1,239876,'2013-01-10',1897.3);
INSERT INTO employer VALUES('amourdous','tinqlin','1991-12-12','3 impasse des terrasses','amourdous@gmail.com','Ahcene1992',72323870,2,239826,'2016-02-10',1497.3);

    --------------------Insertion dans la table proprietaire------------------

INSERT INTO proprietaire VALUES('amirouche','mahdi','1994-12-29','4 impasse des terrasses','amirouche@gmail.com','amirouche06',72390700,123,'SC-910-sx','2018-10-10');
INSERT INTO proprietaire VALUES('rabeh','belkir','1978-02-12','4 impasse des livres !','belkir78@gmail.com','rabeh78',72328970,234,'sx-230-fe','2014-02-10');
INSERT INTO proprietaire VALUES('mohamed','abbaci','1992-04-11','4 rue des livres !','mohamedabbaci@gmail.com','mohamed92',72322380,345,'DE-320-cd','2017-02-10');
INSERT INTO proprietaire VALUES('tabarwit','lvachir','1978-02-11','4 impasse des livres !','tabarwit@gmail.com','rabeh78',72324970,1,'dw-210-ft','2014-02-10');
INSERT INTO proprietaire VALUES('iaawed','lannee','1992-04-11','4 rue des livres !','amirouche@gmail.com','mohamed92',72322390,2,'dw-320-cp','2017-02-10');

    --------------Insertion dans la table annonce---------------------

INSERT INTO annonce VALUES ('SC-910-sx',122,'voiture trés propre','307 HDI',45.3);
INSERT INTO annonce VALUES ('sx-230-fe',123,'voiture economique','206',25.3);
INSERT INTO annonce VALUES ('DE-320-cd',124,'voiture de luxe','C5',58.3);
INSERT INTO annonce VALUES ('dw-210-ft',1,'Benx','106',25.1);
INSERT INTO annonce VALUES ('dw-320-cp',2,'Confort total','306',58.2);


  --------------Insertion dans la table contrat_employer_proprietaire--------

INSERT INTO contrat_employer_proprietaire VALUES('SC-910-sx',122,123, '2018-11-11', '2018-11-18',86.5,389);
INSERT INTO contrat_employer_proprietaire VALUES('sx-230-fe',124,234, '2016-11-23', '2016-11-29',86.5,39);
INSERT INTO contrat_employer_proprietaire VALUES('DE-320-cd',123,345, '2014-10-23', '2014-11-29',86.5,89);
INSERT INTO contrat_employer_proprietaire VALUES('dw-210-ft',1,2, '2018-11-03', '2018-12-29',86.5,38);
INSERT INTO contrat_employer_proprietaire VALUES('dw-320-cp',1,2, '2018-11-02', '2018-12-20',86.5,88);

    ----------Insertion dans la table contrat_loaction--------------
INSERT INTO contrat_location VALUES('SC-910-sx',122,287,123,298,'2018-11-13','2018-11-15',48.3);
INSERT INTO contrat_location VALUES('sx-230-fe',124,1286,123,299,'2018-11-23','2018-12-03',30.3);
INSERT INTO contrat_location VALUES('DE-320-cd',1,287,2,300,'2018-12-12','2018-12-13',58.3);
