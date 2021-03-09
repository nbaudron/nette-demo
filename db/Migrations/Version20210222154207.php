<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222154207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE job_positions (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(128) NOT NULL, slug VARCHAR(128) NOT NULL, is_active SMALLINT NOT NULL, content LONGTEXT NOT NULL, location VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_112F0A6D989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_positions_sub_app (id INT AUTO_INCREMENT NOT NULL, job_position_id INT NOT NULL, first_name VARCHAR(128) NOT NULL, last_name VARCHAR(128) NOT NULL, email VARCHAR(128) NOT NULL, phone_number VARCHAR(128) NOT NULL, linkedin VARCHAR(128) NOT NULL, why_you LONGTEXT NOT NULL, location VARCHAR(128) NOT NULL, attached_files TEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, INDEX IDX_6D1C1936BEE8350F (job_position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_positions_sub_app ADD CONSTRAINT FK_6D1C1936BEE8350F FOREIGN KEY (job_position_id) REFERENCES job_positions (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job_positions_sub_app DROP FOREIGN KEY FK_6D1C1936BEE8350F');
        $this->addSql('DROP TABLE job_positions');
        $this->addSql('DROP TABLE job_positions_sub_app');
    }
}
