<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110071937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code_raccourci VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, licencie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4C62E638B56DCD74 (licencie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educateur (id INT AUTO_INCREMENT NOT NULL, licencie_id INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, is_admin TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_763C0122B56DCD74 (licencie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, num_licence INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, INDEX IDX_3B755612BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE educateur ADD CONSTRAINT FK_763C0122B56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638B56DCD74');
        $this->addSql('ALTER TABLE educateur DROP FOREIGN KEY FK_763C0122B56DCD74');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612BCF5E72D');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE licencie');
    }
}
