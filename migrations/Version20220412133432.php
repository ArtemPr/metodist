<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412133432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE program_academic_plan (program_id INT NOT NULL, academic_plan_id INT NOT NULL, PRIMARY KEY(program_id, academic_plan_id))');
        $this->addSql('CREATE INDEX IDX_E4CBDFF33EB8070A ON program_academic_plan (program_id)');
        $this->addSql('CREATE INDEX IDX_E4CBDFF36D17C83D ON program_academic_plan (academic_plan_id)');
        $this->addSql('ALTER TABLE program_academic_plan ADD CONSTRAINT FK_E4CBDFF33EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE program_academic_plan ADD CONSTRAINT FK_E4CBDFF36D17C83D FOREIGN KEY (academic_plan_id) REFERENCES academic_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE program_academic_plan');
    }
}
