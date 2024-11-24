<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241123154115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, agent_id INT DEFAULT NULL, cause VARCHAR(255) NOT NULL, place VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F4DD61D33414710B (agent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, job_id INT DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, birth_place VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, category INT NOT NULL, grade VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, specialisation VARCHAR(255) NOT NULL, service VARCHAR(255) NOT NULL, ministere VARCHAR(255) NOT NULL, direction VARCHAR(255) NOT NULL, situation VARCHAR(255) NOT NULL, imatricule VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, INDEX IDX_268B9C9DBE04EA9 (job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, birth_place DATE NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, category INT NOT NULL, grade VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, specialisation VARCHAR(255) NOT NULL, situation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D33414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D33414710B');
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBE04EA9');
        $this->addSql('DROP TABLE affectation');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE candidat');
    }
}
