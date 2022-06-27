<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220621142313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE difficulter (id INT AUTO_INCREMENT NOT NULL, reflexive_id INT NOT NULL, difficulter VARCHAR(255) NOT NULL, INDEX IDX_BA7036467F948584 (reflexive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preference (id INT AUTO_INCREMENT NOT NULL, reflexive_id INT NOT NULL, preference VARCHAR(255) NOT NULL, INDEX IDX_5D69B0537F948584 (reflexive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE difficulter ADD CONSTRAINT FK_BA7036467F948584 FOREIGN KEY (reflexive_id) REFERENCES sequence_reflexive (id)');
        $this->addSql('ALTER TABLE preference ADD CONSTRAINT FK_5D69B0537F948584 FOREIGN KEY (reflexive_id) REFERENCES sequence_reflexive (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE difficulter');
        $this->addSql('DROP TABLE preference');
    }
}
