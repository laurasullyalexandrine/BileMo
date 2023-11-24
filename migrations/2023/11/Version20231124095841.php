<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124095841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD phone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F3B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F3B7323CB ON image (phone_id)');
        $this->addSql('ALTER TABLE phone ADD brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_444F97DD44F5D008 ON phone (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F3B7323CB');
        $this->addSql('DROP INDEX IDX_C53D045F3B7323CB ON image');
        $this->addSql('ALTER TABLE image DROP phone_id');
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DD44F5D008');
        $this->addSql('DROP INDEX IDX_444F97DD44F5D008 ON phone');
        $this->addSql('ALTER TABLE phone DROP brand_id');
    }
}
