<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124082414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE phone (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(64) NOT NULL, color VARCHAR(10) NOT NULL, operator_lock VARCHAR(84) NOT NULL, screen_size NUMERIC(10, 1) NOT NULL, storage_capacity VARCHAR(10) NOT NULL, dual_sim TINYINT(1) NOT NULL, memory VARCHAR(10) NOT NULL, megapixels INT NOT NULL, operating_system VARCHAR(10) NOT NULL, resolution VARCHAR(34) NOT NULL, network VARCHAR(5) NOT NULL, manufacturer_reference VARCHAR(10) DEFAULT NULL, card_reader TINYINT(1) NOT NULL, release_year INT NOT NULL, serie VARCHAR(34) NOT NULL, card_sim VARCHAR(84) NOT NULL, weight VARCHAR(10) NOT NULL, height VARCHAR(10) NOT NULL, width VARCHAR(10) NOT NULL, depth VARCHAR(10) NOT NULL, garantee VARCHAR(10) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE phone');
    }
}
