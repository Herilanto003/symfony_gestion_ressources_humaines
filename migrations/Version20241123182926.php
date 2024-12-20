<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241123182926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBE04EA9');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBE04EA9');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
