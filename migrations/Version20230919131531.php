<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230919131531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE register (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, activation TINYINT(1) DEFAULT NULL, firstname VARCHAR(500) DEFAULT NULL, lastname VARCHAR(500) DEFAULT NULL, birthday VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, activation_token LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname, DROP birthday, DROP activation_token, DROP created_by');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE register');
        $this->addSql('ALTER TABLE user ADD firstname LONGTEXT DEFAULT NULL, ADD lastname LONGTEXT DEFAULT NULL, ADD birthday DATE DEFAULT NULL, ADD activation_token LONGTEXT DEFAULT NULL, ADD created_by DATE DEFAULT NULL');
    }
}
