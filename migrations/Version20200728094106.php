<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200728094106 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE composition CHANGE percent_proteine percent_proteine NUMERIC(4, 2) DEFAULT NULL, CHANGE percent_fat percent_fat NUMERIC(4, 2) DEFAULT NULL, CHANGE percent_ashes percent_ashes NUMERIC(4, 2) DEFAULT NULL, CHANGE percent_carbohydrates percent_carbohydrates NUMERIC(4, 2) DEFAULT NULL, CHANGE humidity humidity NUMERIC(4, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE composition CHANGE percent_proteine percent_proteine NUMERIC(10, 0) NOT NULL, CHANGE percent_fat percent_fat NUMERIC(10, 0) NOT NULL, CHANGE percent_ashes percent_ashes NUMERIC(10, 0) NOT NULL, CHANGE percent_carbohydrates percent_carbohydrates NUMERIC(10, 0) DEFAULT NULL, CHANGE humidity humidity NUMERIC(10, 0) NOT NULL');
    }
}
