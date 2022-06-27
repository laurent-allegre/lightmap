<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613094116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sposition_initial (id INT AUTO_INCREMENT NOT NULL, parcour_id INT NOT NULL, nom VARCHAR(255) NOT NULL, contexte LONGTEXT NOT NULL, date_debut DATE NOT NULL, heure_debut DATETIME NOT NULL, date_fin DATE NOT NULL, heure_fin DATETIME NOT NULL, INDEX IDX_3FAC23439A561E99 (parcour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sposition_initial ADD CONSTRAINT FK_3FAC23439A561E99 FOREIGN KEY (parcour_id) REFERENCES parcours (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sposition_initial');
    }
}
