<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191218151757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE moto ADD prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE moto ADD kilometrage VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD annee VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD kw VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD cylindre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD places VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD ch VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD poids_remarquable VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto DROP prix_min');
        $this->addSql('ALTER TABLE moto DROP prix_max');
        $this->addSql('ALTER TABLE moto DROP kilometrage_min');
        $this->addSql('ALTER TABLE moto DROP kilometrage_max');
        $this->addSql('ALTER TABLE moto DROP annee_min');
        $this->addSql('ALTER TABLE moto DROP annee_max');
        $this->addSql('ALTER TABLE moto DROP kw_min');
        $this->addSql('ALTER TABLE moto DROP kw_max');
        $this->addSql('ALTER TABLE moto DROP cylindre_min');
        $this->addSql('ALTER TABLE moto DROP cylindre_max');
        $this->addSql('ALTER TABLE moto DROP places_min');
        $this->addSql('ALTER TABLE moto DROP places_max');
        $this->addSql('ALTER TABLE moto DROP ch_min');
        $this->addSql('ALTER TABLE moto DROP ch_max');
        $this->addSql('ALTER TABLE moto DROP poids_remarquable_min');
        $this->addSql('ALTER TABLE moto DROP poids_remarquable_max');
        $this->addSql('ALTER TABLE vehicule ADD prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD kilometrage VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD annee VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD kw VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD cylindre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD places VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD ch VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD poids_remarquable VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD nbre_porte VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule DROP prix_min');
        $this->addSql('ALTER TABLE vehicule DROP prix_max');
        $this->addSql('ALTER TABLE vehicule DROP kilometrage_min');
        $this->addSql('ALTER TABLE vehicule DROP kilometrage_max');
        $this->addSql('ALTER TABLE vehicule DROP annee_min');
        $this->addSql('ALTER TABLE vehicule DROP annee_max');
        $this->addSql('ALTER TABLE vehicule DROP kw_min');
        $this->addSql('ALTER TABLE vehicule DROP kw_max');
        $this->addSql('ALTER TABLE vehicule DROP cylindre_min');
        $this->addSql('ALTER TABLE vehicule DROP cylindre_max');
        $this->addSql('ALTER TABLE vehicule DROP places_min');
        $this->addSql('ALTER TABLE vehicule DROP places_max');
        $this->addSql('ALTER TABLE vehicule DROP ch_min');
        $this->addSql('ALTER TABLE vehicule DROP ch_max');
        $this->addSql('ALTER TABLE vehicule DROP poids_remarquable_min');
        $this->addSql('ALTER TABLE vehicule DROP poids_remarquable_max');
        $this->addSql('ALTER TABLE vehicule DROP nbre_porte_min');
        $this->addSql('ALTER TABLE vehicule DROP nbre_porte_max');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE moto ADD prix_max DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE moto ADD kilometrage_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD kilometrage_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD annee_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD annee_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD kw_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD kw_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD cylindre_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD cylindre_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD places_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD places_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD ch_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD ch_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD poids_remarquable_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto ADD poids_remarquable_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE moto DROP kilometrage');
        $this->addSql('ALTER TABLE moto DROP annee');
        $this->addSql('ALTER TABLE moto DROP kw');
        $this->addSql('ALTER TABLE moto DROP cylindre');
        $this->addSql('ALTER TABLE moto DROP places');
        $this->addSql('ALTER TABLE moto DROP ch');
        $this->addSql('ALTER TABLE moto DROP poids_remarquable');
        $this->addSql('ALTER TABLE moto RENAME COLUMN prix TO prix_min');
        $this->addSql('ALTER TABLE vehicule ADD prix_max DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD kilometrage_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD kilometrage_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD annee_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD annee_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD kw_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD kw_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD cylindre_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD cylindre_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD places_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD places_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD ch_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD ch_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD poids_remarquable_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD poids_remarquable_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD nbre_porte_min VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD nbre_porte_max VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vehicule DROP kilometrage');
        $this->addSql('ALTER TABLE vehicule DROP annee');
        $this->addSql('ALTER TABLE vehicule DROP kw');
        $this->addSql('ALTER TABLE vehicule DROP cylindre');
        $this->addSql('ALTER TABLE vehicule DROP places');
        $this->addSql('ALTER TABLE vehicule DROP ch');
        $this->addSql('ALTER TABLE vehicule DROP poids_remarquable');
        $this->addSql('ALTER TABLE vehicule DROP nbre_porte');
        $this->addSql('ALTER TABLE vehicule RENAME COLUMN prix TO prix_min');
    }
}
