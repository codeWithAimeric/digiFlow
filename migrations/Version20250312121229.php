<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312121229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent_translations (id INT AUTO_INCREMENT NOT NULL, continent_id INT DEFAULT NULL, translation_code VARCHAR(7) NOT NULL, translation_libelle VARCHAR(50) NOT NULL, INDEX IDX_FAE1EDDD921F4C77 (continent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continental_region (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continental_region_country (continental_region_id INT NOT NULL, country_id INT NOT NULL, INDEX IDX_FDF3A04AFB21313 (continental_region_id), INDEX IDX_FDF3A04F92F3E70 (country_id), PRIMARY KEY(continental_region_id, country_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continental_region_translations (id INT AUTO_INCREMENT NOT NULL, continental_region_id INT NOT NULL, translation_code VARCHAR(7) NOT NULL, translation_libelle VARCHAR(50) NOT NULL, INDEX IDX_77FAF1BFAFB21313 (continental_region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, continent_id INT DEFAULT NULL, code_iso2 VARCHAR(10) DEFAULT NULL, code_iso3 VARCHAR(10) DEFAULT NULL, code_insee VARCHAR(10) NOT NULL, INDEX IDX_5373C966921F4C77 (continent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_translations (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, translation_code VARCHAR(7) NOT NULL, translation_libelle VARCHAR(50) NOT NULL, INDEX IDX_CA145695F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE droits (id INT AUTO_INCREMENT NOT NULL, droit_code VARCHAR(150) NOT NULL, droit_description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematic (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) DEFAULT NULL, code VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematic_translations (id INT AUTO_INCREMENT NOT NULL, thematic_id INT DEFAULT NULL, translation_code VARCHAR(7) NOT NULL, translation_libelle VARCHAR(100) NOT NULL, INDEX IDX_20F5E8662395FCED (thematic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE continent_translations ADD CONSTRAINT FK_FAE1EDDD921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE continental_region_country ADD CONSTRAINT FK_FDF3A04AFB21313 FOREIGN KEY (continental_region_id) REFERENCES continental_region (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE continental_region_country ADD CONSTRAINT FK_FDF3A04F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE continental_region_translations ADD CONSTRAINT FK_77FAF1BFAFB21313 FOREIGN KEY (continental_region_id) REFERENCES continental_region (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE country_translations ADD CONSTRAINT FK_CA145695F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE thematic_translations ADD CONSTRAINT FK_20F5E8662395FCED FOREIGN KEY (thematic_id) REFERENCES thematic (id)');

        $this->addSql("INSERT INTO continent (id, name) VALUES 
        (1, 'Africa'), 
        (2, 'North America'),
        (3, 'South America'),
        (4, 'Antarctica'),
        (5, 'Asia'),
        (6, 'Europe'),
        (7, 'Oceania')");

        $this->addSql("INSERT INTO continental_region (id, name) VALUES 
            (1, 'Northern Africa'),
            (2, 'Eastern Africa'),
            (3, 'Central Africa'),
            (4, 'Western Africa'),
            (5, 'Southern Africa'),
            (6, 'North America'),
            (7, 'Central America'),
            (8, 'Caribbean'),
            (9, 'South America'),
            (10, 'East Asia'),
            (11, 'Southeast Asia'),
            (12, 'Central Asia'),
            (13, 'South Asia'),
            (14, 'Middle East'),
            (15, 'Western Europe'),
            (16, 'Eastern Europe'),
            (17, 'Northern Europe'),
            (18, 'Southern Europe'),
            (19, 'Oceania')");
            
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE continent_translations DROP FOREIGN KEY FK_FAE1EDDD921F4C77');
        $this->addSql('ALTER TABLE continental_region_country DROP FOREIGN KEY FK_FDF3A04AFB21313');
        $this->addSql('ALTER TABLE continental_region_country DROP FOREIGN KEY FK_FDF3A04F92F3E70');
        $this->addSql('ALTER TABLE continental_region_translations DROP FOREIGN KEY FK_77FAF1BFAFB21313');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966921F4C77');
        $this->addSql('ALTER TABLE country_translations DROP FOREIGN KEY FK_CA145695F92F3E70');
        $this->addSql('ALTER TABLE thematic_translations DROP FOREIGN KEY FK_20F5E8662395FCED');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE continent_translations');
        $this->addSql('DROP TABLE continental_region');
        $this->addSql('DROP TABLE continental_region_country');
        $this->addSql('DROP TABLE continental_region_translations');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE country_translations');
        $this->addSql('DROP TABLE droits');
        $this->addSql('DROP TABLE thematic');
        $this->addSql('DROP TABLE thematic_translations');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
