<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709132035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advertisement (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, degree VARCHAR(255) DEFAULT NULL, recruiter VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, salary VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, degree VARCHAR(255) DEFAULT NULL, recruiter VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, salary VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, desciption LONGTEXT DEFAULT NULL, INDEX IDX_DADD4A258805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_FBD8E0F88805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE town (id INT AUTO_INCREMENT NOT NULL, department VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A258805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F88805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A258805AB2F');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F88805AB2F');
        $this->addSql('DROP TABLE advertisement');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE town');
        $this->addSql('DROP TABLE user');
    }
}
