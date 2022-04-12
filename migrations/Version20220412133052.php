<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412133052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_academic_plan (user_id INT NOT NULL, academic_plan_id INT NOT NULL, PRIMARY KEY(user_id, academic_plan_id))');
        $this->addSql('CREATE INDEX IDX_AF0C623BA76ED395 ON user_academic_plan (user_id)');
        $this->addSql('CREATE INDEX IDX_AF0C623B6D17C83D ON user_academic_plan (academic_plan_id)');
        $this->addSql('ALTER TABLE user_academic_plan ADD CONSTRAINT FK_AF0C623BA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_academic_plan ADD CONSTRAINT FK_AF0C623B6D17C83D FOREIGN KEY (academic_plan_id) REFERENCES academic_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE user_academic_plan');
    }
}
