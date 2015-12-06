<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151117000237 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
		$this->addSql("INSERT INTO todo_status (name) VALUES ('open')");
		$this->addSql("INSERT INTO todo_status (name) VALUES ('closed')");
		$this->addSql("INSERT INTO todo_status (name) VALUES ('resolved')");
		$this->addSql("INSERT INTO todo_status (name) VALUES ('waiting')");
		$this->addSql("INSERT INTO todo_status (name) VALUES ('postponed')");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
		$this->addSql("DELETE FROM todo_status WHERE name = 'open'");
		$this->addSql("DELETE FROM todo_status WHERE name = 'closed'");
		$this->addSql("DELETE FROM todo_status WHERE name = 'resolved'");
		$this->addSql("DELETE FROM todo_status WHERE name = 'waiting'");
		$this->addSql("DELETE FROM todo_status WHERE name = 'postponed'");
    }
}
