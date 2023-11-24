<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124153931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone DROP memory, DROP megapixels, DROP resolution, DROP manufacturer_reference, DROP serie, DROP card_sim, DROP weight, DROP height, DROP width, DROP depth');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone ADD memory VARCHAR(10) NOT NULL, ADD megapixels INT NOT NULL, ADD resolution VARCHAR(34) NOT NULL, ADD manufacturer_reference VARCHAR(10) DEFAULT NULL, ADD serie VARCHAR(34) NOT NULL, ADD card_sim VARCHAR(84) NOT NULL, ADD weight VARCHAR(10) NOT NULL, ADD height VARCHAR(10) NOT NULL, ADD width VARCHAR(10) NOT NULL, ADD depth VARCHAR(10) NOT NULL');
    }
}
