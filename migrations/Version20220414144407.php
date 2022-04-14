<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414144407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE program_literature (program_id INT NOT NULL, literature_id INT NOT NULL, PRIMARY KEY(program_id, literature_id))');
        $this->addSql('CREATE INDEX IDX_4B315B0F3EB8070A ON program_literature (program_id)');
        $this->addSql('CREATE INDEX IDX_4B315B0FC0C5167B ON program_literature (literature_id)');
        $this->addSql('ALTER TABLE program_literature ADD CONSTRAINT FK_4B315B0F3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE program_literature ADD CONSTRAINT FK_4B315B0FC0C5167B FOREIGN KEY (literature_id) REFERENCES literature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE program_literature');
    }
}
