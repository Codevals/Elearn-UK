<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528110232 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, uuid VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chapter (id INT AUTO_INCREMENT NOT NULL, course_id INT NOT NULL, titre VARCHAR(255) NOT NULL, numero INT NOT NULL, INDEX IDX_F981B52E591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corrige_type (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, etablissement_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, document_name VARCHAR(255) NOT NULL, semestre INT NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, size INT DEFAULT NULL, mime_type VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, INDEX IDX_169E6FB9B03A8386 (created_by_id), INDEX IDX_169E6FB9FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_cycle (course_id INT NOT NULL, cycle_id INT NOT NULL, INDEX IDX_592DD67B591CC992 (course_id), INDEX IDX_592DD67B5EC1162 (cycle_id), PRIMARY KEY(course_id, cycle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_specialite (course_id INT NOT NULL, specialite_id INT NOT NULL, INDEX IDX_3834B242591CC992 (course_id), INDEX IDX_3834B2422195E0F0 (specialite_id), PRIMARY KEY(course_id, specialite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycle (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, libelle_court VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, libelle_court VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE td (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, document_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_40550B4CB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chapter ADD CONSTRAINT FK_F981B52E591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9B03A8386 FOREIGN KEY (created_by_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE course_cycle ADD CONSTRAINT FK_592DD67B591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_cycle ADD CONSTRAINT FK_592DD67B5EC1162 FOREIGN KEY (cycle_id) REFERENCES cycle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_specialite ADD CONSTRAINT FK_3834B242591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_specialite ADD CONSTRAINT FK_3834B2422195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE td ADD CONSTRAINT FK_40550B4CB03A8386 FOREIGN KEY (created_by_id) REFERENCES admin (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9B03A8386');
        $this->addSql('ALTER TABLE td DROP FOREIGN KEY FK_40550B4CB03A8386');
        $this->addSql('ALTER TABLE chapter DROP FOREIGN KEY FK_F981B52E591CC992');
        $this->addSql('ALTER TABLE course_cycle DROP FOREIGN KEY FK_592DD67B591CC992');
        $this->addSql('ALTER TABLE course_specialite DROP FOREIGN KEY FK_3834B242591CC992');
        $this->addSql('ALTER TABLE course_cycle DROP FOREIGN KEY FK_592DD67B5EC1162');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9FF631228');
        $this->addSql('ALTER TABLE course_specialite DROP FOREIGN KEY FK_3834B2422195E0F0');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE chapter');
        $this->addSql('DROP TABLE corrige_type');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_cycle');
        $this->addSql('DROP TABLE course_specialite');
        $this->addSql('DROP TABLE cycle');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE td');
    }
}
