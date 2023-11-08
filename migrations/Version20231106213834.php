<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106213834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Cellulaires (id INT AUTO_INCREMENT NOT NULL, numero_serie INT NOT NULL, etat_disponible TINYINT(1) NOT NULL, marque VARCHAR(40) DEFAULT NULL, modele VARCHAR(40) DEFAULT NULL, date_acquisition DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', date_sortie DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', systeme VARCHAR(255) DEFAULT NULL, cpu VARCHAR(255) DEFAULT NULL, gpu VARCHAR(255) DEFAULT NULL, card_slot INT DEFAULT NULL, stockage INT DEFAULT NULL, memoire INT DEFAULT NULL, notes VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Gestionnaires (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_93EAE22DE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Ordinateurs (id INT AUTO_INCREMENT NOT NULL, usager_id INT DEFAULT NULL, numero_serie INT NOT NULL, etat_disponible TINYINT(1) NOT NULL, marque VARCHAR(40) DEFAULT NULL, modele VARCHAR(40) DEFAULT NULL, date_acquisition DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', date_sortie DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', systeme VARCHAR(255) DEFAULT NULL, cpu VARCHAR(255) DEFAULT NULL, gpu VARCHAR(255) DEFAULT NULL, memoire INT DEFAULT NULL, disques LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', notes VARCHAR(255) DEFAULT NULL, INDEX IDX_8C1459684F36F0FC (usager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Peripheriques (id INT AUTO_INCREMENT NOT NULL, numero_serie INT NOT NULL, etat_disponible TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, marque VARCHAR(40) DEFAULT NULL, modele VARCHAR(40) DEFAULT NULL, notes VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Usagers (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(40) NOT NULL, nom VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Ordinateurs ADD CONSTRAINT FK_8C1459684F36F0FC FOREIGN KEY (usager_id) REFERENCES Usagers (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Ordinateurs DROP FOREIGN KEY FK_8C1459684F36F0FC');
        $this->addSql('DROP TABLE Cellulaires');
        $this->addSql('DROP TABLE Gestionnaires');
        $this->addSql('DROP TABLE Ordinateurs');
        $this->addSql('DROP TABLE Peripheriques');
        $this->addSql('DROP TABLE Usagers');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
