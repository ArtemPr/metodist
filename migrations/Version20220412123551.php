<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412123551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_disciplines (user_id INT NOT NULL, disciplines_id INT NOT NULL, PRIMARY KEY(user_id, disciplines_id))');
        $this->addSql('CREATE INDEX IDX_406954DA76ED395 ON user_disciplines (user_id)');
        $this->addSql('CREATE INDEX IDX_406954D90D3DF94 ON user_disciplines (disciplines_id)');
        $this->addSql('ALTER TABLE user_disciplines ADD CONSTRAINT FK_406954DA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_disciplines ADD CONSTRAINT FK_406954D90D3DF94 FOREIGN KEY (disciplines_id) REFERENCES disciplines (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE user_disciplines');
    }
}
