<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613131010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pre_requis (id INT AUTO_INCREMENT NOT NULL, position_initial_id INT NOT NULL, libeller_requis VARCHAR(255) DEFAULT NULL, INDEX IDX_6DB2F8E1C0E22A24 (position_initial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pre_requis ADD CONSTRAINT FK_6DB2F8E1C0E22A24 FOREIGN KEY (position_initial_id) REFERENCES sposition_initial (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pre_requis');
    }
}
