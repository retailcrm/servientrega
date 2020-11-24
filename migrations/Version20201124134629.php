<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124134629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE connection ADD id_dane_origin_city VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER INDEX uniq_f5299398dd03f01 RENAME TO IDX_F5299398DD03F01');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE connection DROP id_dane_origin_city');
        $this->addSql('ALTER INDEX idx_f5299398dd03f01 RENAME TO uniq_f5299398dd03f01');
    }
}
