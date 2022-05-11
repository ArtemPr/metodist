<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511145117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP CONSTRAINT fk_d8698a7693f7d12f');
        $this->addSql('DROP INDEX idx_d8698a7693f7d12f');
        $this->addSql('ALTER TABLE document DROP training_centers_id');
        $this->addSql('ALTER TABLE training_centers ADD document_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE training_centers ADD CONSTRAINT FK_FA734B3FC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FA734B3FC33F7837 ON training_centers (document_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE training_centers DROP CONSTRAINT FK_FA734B3FC33F7837');
        $this->addSql('DROP INDEX IDX_FA734B3FC33F7837');
        $this->addSql('ALTER TABLE training_centers DROP document_id');
        $this->addSql('ALTER TABLE document ADD training_centers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT fk_d8698a7693f7d12f FOREIGN KEY (training_centers_id) REFERENCES training_centers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d8698a7693f7d12f ON document (training_centers_id)');
    }
}
