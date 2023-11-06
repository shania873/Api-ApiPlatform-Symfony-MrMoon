<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106130406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contacts ADD user_id INT DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_33401573A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_33401573A76ED395 ON contacts (user_id)');
        $this->addSql('ALTER TABLE places ADD contacts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C55719FB48E FOREIGN KEY (contacts_id) REFERENCES contacts (id)');
        $this->addSql('CREATE INDEX IDX_FEAF6C55719FB48E ON places (contacts_id)');
        $this->addSql('ALTER TABLE refresh_tokens CHANGE refresh_token refresh_token VARCHAR(128) NOT NULL, CHANGE username username VARCHAR(255) NOT NULL, CHANGE valid valid DATETIME NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BACE7E1C74F2195 ON refresh_tokens (refresh_token)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_33401573A76ED395');
        $this->addSql('DROP INDEX IDX_33401573A76ED395 ON contacts');
        $this->addSql('ALTER TABLE contacts DROP user_id, DROP description');
        $this->addSql('ALTER TABLE places DROP FOREIGN KEY FK_FEAF6C55719FB48E');
        $this->addSql('DROP INDEX IDX_FEAF6C55719FB48E ON places');
        $this->addSql('ALTER TABLE places DROP contacts_id');
        $this->addSql('DROP INDEX UNIQ_9BACE7E1C74F2195 ON refresh_tokens');
        $this->addSql('ALTER TABLE refresh_tokens CHANGE refresh_token refresh_token LONGTEXT DEFAULT NULL, CHANGE username username VARCHAR(255) DEFAULT NULL, CHANGE valid valid LONGTEXT DEFAULT NULL');
    }
}
