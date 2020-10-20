<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002093449 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE connection_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('
            CREATE TABLE connection (
                id INT NOT NULL,
                crm_url VARCHAR(255) NOT NULL,
                crm_api_key VARCHAR(255) NOT NULL,
                servientrega_login VARCHAR(255) NOT NULL,
                servientrega_password VARCHAR(255) NOT NULL,
                servientrega_billing_code VARCHAR(255) NOT NULL,
                servientrega_name_pack VARCHAR(255) NOT NULL,
                active BOOLEAN DEFAULT \'true\' NOT NULL,
                client_id VARCHAR(255) NOT NULL,
                PRIMARY KEY(id)
            )
        ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE connection_id_seq CASCADE');
        $this->addSql('DROP TABLE connection');
    }
}
