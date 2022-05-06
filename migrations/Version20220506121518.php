<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506121518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training_centers ADD external_upload_bakalavrmagistr_id VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE training_centers ADD external_upload_sdo_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE training_centers DROP external_upload_bakalavrmagistr_id');
        $this->addSql('ALTER TABLE training_centers DROP external_upload_sdo_id');
    }
}
