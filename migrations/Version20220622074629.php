<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220622074629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE explorer (id INT AUTO_INCREMENT NOT NULL, reflexive_id INT NOT NULL, explorer VARCHAR(255) NOT NULL, INDEX IDX_E7FFACEE7F948584 (reflexive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formuler (id INT AUTO_INCREMENT NOT NULL, reflexive_id INT NOT NULL, formuler VARCHAR(255) NOT NULL, INDEX IDX_92BDB8777F948584 (reflexive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE explorer ADD CONSTRAINT FK_E7FFACEE7F948584 FOREIGN KEY (reflexive_id) REFERENCES sequence_reflexive (id)');
        $this->addSql('ALTER TABLE formuler ADD CONSTRAINT FK_92BDB8777F948584 FOREIGN KEY (reflexive_id) REFERENCES sequence_reflexive (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE explorer');
        $this->addSql('DROP TABLE formuler');
    }
}
