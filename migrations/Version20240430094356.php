<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430094356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, pattern VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agenda (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, label VARCHAR(100) NOT NULL, INDEX IDX_2CEDC877A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, agenda_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, INDEX IDX_4C62E638EA67784A (agenda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_detail (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, phone_id INT DEFAULT NULL, email_id INT DEFAULT NULL, website_id INT DEFAULT NULL, contact_id INT NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_BE944812F5B7AF75 (address_id), INDEX IDX_BE9448123B7323CB (phone_id), INDEX IDX_BE944812A832C1C9 (email_id), INDEX IDX_BE94481218F45C82 (website_id), INDEX IDX_BE944812E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, pattern VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone (id INT AUTO_INCREMENT NOT NULL, pattern VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_LOGIN (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE website (id INT AUTO_INCREMENT NOT NULL, pattern VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agenda ADD CONSTRAINT FK_2CEDC877A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638EA67784A FOREIGN KEY (agenda_id) REFERENCES agenda (id)');
        $this->addSql('ALTER TABLE contact_detail ADD CONSTRAINT FK_BE944812F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE contact_detail ADD CONSTRAINT FK_BE9448123B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('ALTER TABLE contact_detail ADD CONSTRAINT FK_BE944812A832C1C9 FOREIGN KEY (email_id) REFERENCES email (id)');
        $this->addSql('ALTER TABLE contact_detail ADD CONSTRAINT FK_BE94481218F45C82 FOREIGN KEY (website_id) REFERENCES website (id)');
        $this->addSql('ALTER TABLE contact_detail ADD CONSTRAINT FK_BE944812E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agenda DROP FOREIGN KEY FK_2CEDC877A76ED395');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638EA67784A');
        $this->addSql('ALTER TABLE contact_detail DROP FOREIGN KEY FK_BE944812F5B7AF75');
        $this->addSql('ALTER TABLE contact_detail DROP FOREIGN KEY FK_BE9448123B7323CB');
        $this->addSql('ALTER TABLE contact_detail DROP FOREIGN KEY FK_BE944812A832C1C9');
        $this->addSql('ALTER TABLE contact_detail DROP FOREIGN KEY FK_BE94481218F45C82');
        $this->addSql('ALTER TABLE contact_detail DROP FOREIGN KEY FK_BE944812E7A1254A');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE agenda');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_detail');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE website');
    }
}
