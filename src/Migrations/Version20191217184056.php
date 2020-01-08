<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191217184056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE bande_dessinee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE camping_car_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE immobilier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE livre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE montre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE moto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vehicule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bande_dessinee (id INT NOT NULL, users_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date_limite_de_lalbum VARCHAR(255) DEFAULT NULL, editeur VARCHAR(255) NOT NULL, edition_originale BOOLEAN NOT NULL, vendeur VARCHAR(255) NOT NULL, nb_de_vente INT NOT NULL, etat_general VARCHAR(255) NOT NULL, prix_de_vente DOUBLE PRECISION NOT NULL, lieu_de_vente VARCHAR(255) NOT NULL, id_de_vente INT NOT NULL, date_limite_de_vente VARCHAR(255) DEFAULT NULL, commentaire TEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4BF8564267B3B43D ON bande_dessinee (users_id)');
        $this->addSql('CREATE TABLE camping_car (id INT NOT NULL, users_id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, titre VARCHAR(255) NOT NULL, nbre_de_place INT NOT NULL, nbre_couchage INT NOT NULL, carburant VARCHAR(255) NOT NULL, killomertage INT NOT NULL, marque VARCHAR(255) NOT NULL, longueur INT NOT NULL, hauteur INT NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, type_de_couchage VARCHAR(255) NOT NULL, consommation VARCHAR(255) NOT NULL, equipements VARCHAR(255) NOT NULL, options VARCHAR(255) NOT NULL, extras VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, conditions_de_location TEXT DEFAULT NULL, type_assurance VARCHAR(255) NOT NULL, heure_de_depart VARCHAR(255) NOT NULL, heure_de_retour VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, tarif_de_location DOUBLE PRECISION NOT NULL, tarif_assurance DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_813835C267B3B43D ON camping_car (users_id)');
        $this->addSql('CREATE TABLE immobilier (id INT NOT NULL, users_id INT NOT NULL, type_demande VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, prix_min DOUBLE PRECISION NOT NULL, prix_max DOUBLE PRECISION NOT NULL, pieces_min VARCHAR(255) NOT NULL, surface_habitable_min VARCHAR(255) NOT NULL, surface_habitable_max VARCHAR(255) NOT NULL, type_dobjet VARCHAR(255) NOT NULL, caracteristiques VARCHAR(255) NOT NULL, etage VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, disponibilite_min VARCHAR(255) NOT NULL, disponibilite_max VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, piece_max VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_142D24D267B3B43D ON immobilier (users_id)');
        $this->addSql('CREATE TABLE livre (id INT NOT NULL, users_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date_limite_de_lalbum VARCHAR(255) DEFAULT NULL, editeur VARCHAR(255) NOT NULL, edition_originale BOOLEAN NOT NULL, vendeur VARCHAR(255) NOT NULL, nb_de_vente INT NOT NULL, etat_general VARCHAR(255) NOT NULL, prix_de_vente DOUBLE PRECISION NOT NULL, lieu_de_vente VARCHAR(255) NOT NULL, id_de_vente INT NOT NULL, date_limite_de_vente VARCHAR(255) DEFAULT NULL, commentaire TEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, langue VARCHAR(255) NOT NULL, traducteur VARCHAR(255) NOT NULL, format VARCHAR(255) NOT NULL, collection VARCHAR(255) NOT NULL, dateparution VARCHAR(255) NOT NULL, nbrepage INT NOT NULL, ean VARCHAR(255) NOT NULL, isbn VARCHAR(255) NOT NULL, disponibilite VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AC634F9967B3B43D ON livre (users_id)');
        $this->addSql('CREATE TABLE montre (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE moto (id INT NOT NULL, users_id INT NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, version VARCHAR(255) DEFAULT NULL, prix_min DOUBLE PRECISION NOT NULL, prix_max DOUBLE PRECISION NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, roues_motrices VARCHAR(255) NOT NULL, kilometrage_min VARCHAR(255) NOT NULL, kilometrage_max VARCHAR(255) NOT NULL, carburant VARCHAR(255) NOT NULL, categorie_moto VARCHAR(255) NOT NULL, annee_min VARCHAR(255) NOT NULL, annee_max VARCHAR(255) NOT NULL, categorie_licence VARCHAR(255) NOT NULL, kw_min VARCHAR(255) NOT NULL, kw_max VARCHAR(255) NOT NULL, cylindre_min VARCHAR(255) NOT NULL, cylindre_max VARCHAR(255) NOT NULL, qualites VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, places_min VARCHAR(255) NOT NULL, places_max VARCHAR(255) NOT NULL, equipement VARCHAR(255) NOT NULL, equipement_suplementaire VARCHAR(255) DEFAULT NULL, qualite_equipement VARCHAR(255) DEFAULT NULL, consommation VARCHAR(255) DEFAULT NULL, co2emission_bis VARCHAR(255) DEFAULT NULL, normes_emission VARCHAR(255) DEFAULT NULL, npa_lieu VARCHAR(255) NOT NULL, rayon VARCHAR(255) NOT NULL, age_del_annonce VARCHAR(255) NOT NULL, tri VARCHAR(255) NOT NULL, sigle_qualite VARCHAR(255) NOT NULL, ch_min VARCHAR(255) NOT NULL, ch_max VARCHAR(255) NOT NULL, poids_remarquable_min VARCHAR(255) NOT NULL, poids_remarquable_max VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3DDDBCE467B3B43D ON moto (users_id)');
        $this->addSql('CREATE TABLE utilisateur (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3F85E0677 ON utilisateur (username)');
        $this->addSql('CREATE TABLE vehicule (id INT NOT NULL, users_id INT NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, version VARCHAR(255) DEFAULT NULL, prix_min DOUBLE PRECISION NOT NULL, prix_max DOUBLE PRECISION NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, roues_motrices VARCHAR(255) NOT NULL, kilometrage_min VARCHAR(255) NOT NULL, kilometrage_max VARCHAR(255) NOT NULL, carburant VARCHAR(255) NOT NULL, categorie_vehicule VARCHAR(255) NOT NULL, annee_min VARCHAR(255) NOT NULL, annee_max VARCHAR(255) NOT NULL, categorie_licence VARCHAR(255) NOT NULL, kw_min VARCHAR(255) NOT NULL, kw_max VARCHAR(255) NOT NULL, cylindre_min VARCHAR(255) NOT NULL, cylindre_max VARCHAR(255) NOT NULL, qualites VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, places_min VARCHAR(255) NOT NULL, places_max VARCHAR(255) NOT NULL, equipement VARCHAR(255) NOT NULL, equipement_suplementaire VARCHAR(255) DEFAULT NULL, qualite_equipement VARCHAR(255) DEFAULT NULL, consommation VARCHAR(255) DEFAULT NULL, co2emission_bis VARCHAR(255) DEFAULT NULL, normes_emission VARCHAR(255) DEFAULT NULL, npa_lieu VARCHAR(255) NOT NULL, rayon VARCHAR(255) NOT NULL, age_del_annonce VARCHAR(255) NOT NULL, tri VARCHAR(255) NOT NULL, sigle_qualite VARCHAR(255) NOT NULL, ch_min VARCHAR(255) NOT NULL, ch_max VARCHAR(255) NOT NULL, poids_remarquable_min VARCHAR(255) NOT NULL, poids_remarquable_max VARCHAR(255) NOT NULL, type_carrosserie VARCHAR(255) NOT NULL, nbre_porte_min VARCHAR(255) NOT NULL, nbre_porte_max VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_292FFF1D67B3B43D ON vehicule (users_id)');
        $this->addSql('ALTER TABLE bande_dessinee ADD CONSTRAINT FK_4BF8564267B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE camping_car ADD CONSTRAINT FK_813835C267B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE immobilier ADD CONSTRAINT FK_142D24D267B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9967B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE moto ADD CONSTRAINT FK_3DDDBCE467B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D67B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE bande_dessinee DROP CONSTRAINT FK_4BF8564267B3B43D');
        $this->addSql('ALTER TABLE camping_car DROP CONSTRAINT FK_813835C267B3B43D');
        $this->addSql('ALTER TABLE immobilier DROP CONSTRAINT FK_142D24D267B3B43D');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT FK_AC634F9967B3B43D');
        $this->addSql('ALTER TABLE moto DROP CONSTRAINT FK_3DDDBCE467B3B43D');
        $this->addSql('ALTER TABLE vehicule DROP CONSTRAINT FK_292FFF1D67B3B43D');
        $this->addSql('DROP SEQUENCE bande_dessinee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE camping_car_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE immobilier_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE livre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE montre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE moto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vehicule_id_seq CASCADE');
        $this->addSql('DROP TABLE bande_dessinee');
        $this->addSql('DROP TABLE camping_car');
        $this->addSql('DROP TABLE immobilier');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE montre');
        $this->addSql('DROP TABLE moto');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vehicule');
    }
}
