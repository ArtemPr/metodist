<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414144235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_literature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category_literature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE category_literature_literature (category_literature_id INT NOT NULL, literature_id INT NOT NULL, PRIMARY KEY(category_literature_id, literature_id))');
        $this->addSql('CREATE INDEX IDX_E481A0D7DE1E3330 ON category_literature_literature (category_literature_id)');
        $this->addSql('CREATE INDEX IDX_E481A0D7C0C5167B ON category_literature_literature (literature_id)');
        $this->addSql('ALTER TABLE category_literature_literature ADD CONSTRAINT FK_E481A0D7DE1E3330 FOREIGN KEY (category_literature_id) REFERENCES category_literature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_literature_literature ADD CONSTRAINT FK_E481A0D7C0C5167B FOREIGN KEY (literature_id) REFERENCES literature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE category_literature_literature DROP CONSTRAINT FK_E481A0D7DE1E3330');
        $this->addSql('DROP SEQUENCE category_literature_id_seq CASCADE');
        $this->addSql('DROP TABLE category_literature');
        $this->addSql('DROP TABLE category_literature_literature');
    }
}
