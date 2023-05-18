<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230518095818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }
    
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE EXTENSION postgis');
        $this->addSql('CREATE SEQUENCE building_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE building ("id" integer DEFAULT nextval(\'building_id_seq\') NOT NULL, name VARCHAR(50) DEFAULT NULL, description TEXT DEFAULT NULL, img VARCHAR(250) DEFAULT NULL, point GEOMETRY(Point, 4326) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql(file_get_contents(dirname(__FILE__).'/buildings.sql'));
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE building_id_seq CASCADE');
        $this->addSql('DROP TABLE building');
    }
}
