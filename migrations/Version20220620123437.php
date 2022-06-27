<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620123437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resultats (id INT AUTO_INCREMENT NOT NULL, situation_id INT NOT NULL, resultat VARCHAR(255) NOT NULL, INDEX IDX_55ED97023408E8AF (situation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taches (id INT AUTO_INCREMENT NOT NULL, situation_id INT NOT NULL, tache VARCHAR(255) NOT NULL, INDEX IDX_3BF2CD983408E8AF (situation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resultats ADD CONSTRAINT FK_55ED97023408E8AF FOREIGN KEY (situation_id) REFERENCES mise_en_situation (id)');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD983408E8AF FOREIGN KEY (situation_id) REFERENCES mise_en_situation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE resultats');
        $this->addSql('DROP TABLE taches');
    }
}
