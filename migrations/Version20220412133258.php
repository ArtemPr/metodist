<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412133258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_academic_plan');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE user_academic_plan (user_id INT NOT NULL, academic_plan_id INT NOT NULL, PRIMARY KEY(user_id, academic_plan_id))');
        $this->addSql('CREATE INDEX idx_af0c623b6d17c83d ON user_academic_plan (academic_plan_id)');
        $this->addSql('CREATE INDEX idx_af0c623ba76ed395 ON user_academic_plan (user_id)');
        $this->addSql('ALTER TABLE user_academic_plan ADD CONSTRAINT fk_af0c623ba76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_academic_plan ADD CONSTRAINT fk_af0c623b6d17c83d FOREIGN KEY (academic_plan_id) REFERENCES academic_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
