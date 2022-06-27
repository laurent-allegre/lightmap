<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220608073422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parcours ADD formateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE parcours ADD CONSTRAINT FK_99B1DEE3155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateurs (id)');
        $this->addSql('CREATE INDEX IDX_99B1DEE3155D8F51 ON parcours (formateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parcours DROP FOREIGN KEY FK_99B1DEE3155D8F51');
        $this->addSql('DROP INDEX IDX_99B1DEE3155D8F51 ON parcours');
        $this->addSql('ALTER TABLE parcours DROP formateur_id');
    }
}
