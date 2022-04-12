<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412111926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_training_centers (user_id INT NOT NULL, training_centers_id INT NOT NULL, PRIMARY KEY(user_id, training_centers_id))');
        $this->addSql('CREATE INDEX IDX_876609E2A76ED395 ON user_training_centers (user_id)');
        $this->addSql('CREATE INDEX IDX_876609E293F7D12F ON user_training_centers (training_centers_id)');
        $this->addSql('ALTER TABLE user_training_centers ADD CONSTRAINT FK_876609E2A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_training_centers ADD CONSTRAINT FK_876609E293F7D12F FOREIGN KEY (training_centers_id) REFERENCES training_centers (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE user_training_centers');
    }
}
