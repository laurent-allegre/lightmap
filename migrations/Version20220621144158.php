<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220621144158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE argcont (id INT AUTO_INCREMENT NOT NULL, reflexive_id INT NOT NULL, argcont VARCHAR(255) NOT NULL, INDEX IDX_1B5BB8447F948584 (reflexive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE argpro (id INT AUTO_INCREMENT NOT NULL, reflexive_id INT NOT NULL, argpro VARCHAR(255) NOT NULL, INDEX IDX_C37C0EA47F948584 (reflexive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE argcont ADD CONSTRAINT FK_1B5BB8447F948584 FOREIGN KEY (reflexive_id) REFERENCES sequence_reflexive (id)');
        $this->addSql('ALTER TABLE argpro ADD CONSTRAINT FK_C37C0EA47F948584 FOREIGN KEY (reflexive_id) REFERENCES sequence_reflexive (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE argcont');
        $this->addSql('DROP TABLE argpro');
    }
}
