<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220506120201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training_centers ADD phone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE training_centers ADD email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE training_centers ADD url VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE training_centers DROP phone');
        $this->addSql('ALTER TABLE training_centers DROP email');
        $this->addSql('ALTER TABLE training_centers DROP url');
    }
}
