DROP DATABASE IF EXISTS annexee;
CREATE DATABASE annexee;
USE annexee;

DROP TABLE IF EXISTS utilisateur;
CREATE TABLE utilisateur (
                             idUtilisateur int(11) NOT NULL AUTO_INCREMENT,
                             nom varchar(30),
                             prenom varchar(30),
                             email varchar(50) NOT NULL UNIQUE,
                             mdp varchar(255),
                             dateNaiss DATE,
                             adresse varchar(100),
                             tel varchar(12),
                             classe varchar(50),
                             ville varchar(50),
                             cp varchar(5),
                             sex enum("Feminin", "Masculin"),
                             pays varchar(50),
                             etat enum("En attente","Valide","Refusee"),
                             role enum("admin", "user") NOT NULL DEFAULT 'user',
                             PRIMARY KEY (idUtilisateur)
);
DROP TABLE IF EXISTS carte;
CREATE TABLE carte (
                       idCarte int(11) NOT NULL AUTO_INCREMENT,
                       idUtilisateur int(11) NOT NULL,
                       numero_carte int(16) NOT NULL,
                       duree_validitee DATE,
                       PRIMARY KEY (idCarte),
                       FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur)
                           ON UPDATE CASCADE
                           ON DELETE CASCADE
);



DROP TABLE IF EXISTS salle;
CREATE TABLE salle (
                       idSalle int(11) NOT NULL AUTO_INCREMENT,
                       libelle varchar(100) NOT NULL,
                       etat enum("Disponible","Occupee") NOT NULL,
                       PRIMARY KEY (idSalle)
);

DROP TABLE IF EXISTS reservation;
CREATE TABLE reservation (
                             idReservation int(11) AUTO_INCREMENT,
                             idUtilisateur int(11),
                             idSalle int(11),
                             dateHeureDeboccup DATE NOT NULL,
                             heure_deb_occup TIME NOT NULL,
                             nbPersonne int(11),
                             heure_fin_occup TIME NOT NULL,
                             etat enum("Reservez","Pas reserver") NOT NULL DEFAULT 'Pas reserver',
                             PRIMARY KEY (idReservation),
                             FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur)
                                 ON UPDATE CASCADE
                                 ON DELETE CASCADE,
                             FOREIGN KEY (idSalle) REFERENCES salle (idSalle)
                                 ON UPDATE CASCADE
                                 ON DELETE CASCADE
);

CREATE TABLE contacts (
                          idContact INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255) NOT NULL,
                          email VARCHAR(255) NOT NULL,
                          phone VARCHAR(20),
                          website VARCHAR(255),
                          message TEXT NOT NULL,
                          timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS avis;
CREATE TABLE avis (
                      idAvis int(11) NOT NULL AUTO_INCREMENT,
                      commentaire text NOT NULL,
                      idUtilisateur int(11) NOT NULL,
                      idSalle int(11) NOT NULL,
                      PRIMARY KEY (idAvis),
                      FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur)
                          ON UPDATE CASCADE
                          ON DELETE CASCADE,
                      FOREIGN KEY (idSalle) REFERENCES salle (idSalle)
                          ON UPDATE CASCADE
                          ON DELETE CASCADE
);

DROP TABLE IF EXISTS box;
CREATE TABLE box (
                     idSalle int(11) NOT NULL,
                     PRIMARY KEY (idSalle),
                     FOREIGN KEY(idSalle) REFERENCES salle (idSalle)
                         ON UPDATE CASCADE
                         ON DELETE CASCADE
);

DROP TABLE IF EXISTS salle_groupe;
CREATE TABLE salle_groupe (
                              idSalle int(11) NOT NULL,
                              PRIMARY KEY (idSalle),
                              FOREIGN KEY(idSalle) REFERENCES salle (idSalle)
                                  ON UPDATE CASCADE
                                  ON DELETE CASCADE
);

DROP TABLE IF EXISTS salle_commune;
CREATE TABLE salle_commune (
                               idSalle int(11) NOT NULL,
                               PRIMARY KEY (idSalle),
                               FOREIGN KEY(idSalle) REFERENCES salle (idSalle)
                                   ON UPDATE CASCADE
                                   ON DELETE CASCADE
);

DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
                       idAdmin int(11) NOT NULL AUTO_INCREMENT,
                       email varchar(50) NOT NULL UNIQUE,
                       mdp varchar(255) NOT NULL,
                       PRIMARY KEY(idAdmin)
);