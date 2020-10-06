<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006092953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE token_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE token (id INT NOT NULL, name VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, cod_billing VARCHAR(255) NOT NULL, id_client VARCHAR(255) NOT NULL, state BOOLEAN NOT NULL, token VARCHAR(1000) NOT NULL, expiration TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE connection ADD token_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE connection ADD CONSTRAINT FK_29F7736641DEE7B9 FOREIGN KEY (token_id) REFERENCES token (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29F7736641DEE7B9 ON connection (token_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE connection DROP CONSTRAINT FK_29F7736641DEE7B9');
        $this->addSql('DROP SEQUENCE token_id_seq CASCADE');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP INDEX UNIQ_29F7736641DEE7B9');
        $this->addSql('ALTER TABLE connection DROP token_id');
    }
}
