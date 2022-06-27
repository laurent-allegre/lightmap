<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620121836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mise_en_situation (id INT AUTO_INCREMENT NOT NULL, parcour_id INT NOT NULL, nom VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, outils LONGTEXT DEFAULT NULL, methode LONGTEXT DEFAULT NULL, elements_preuve LONGTEXT DEFAULT NULL, date_debut DATETIME NOT NULL, heure_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, heure_fin DATETIME NOT NULL, INDEX IDX_8D43C0AA9A561E99 (parcour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mise_en_situation ADD CONSTRAINT FK_8D43C0AA9A561E99 FOREIGN KEY (parcour_id) REFERENCES parcours (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mise_en_situation');
    }
}
