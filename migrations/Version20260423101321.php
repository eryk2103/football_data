<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260423101321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club ADD league_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387258AFC4DE FOREIGN KEY (league_id) REFERENCES competition (id)');
        $this->addSql('CREATE INDEX IDX_B8EE387258AFC4DE ON club (league_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP CONSTRAINT FK_B8EE387258AFC4DE');
        $this->addSql('DROP INDEX IDX_B8EE387258AFC4DE');
        $this->addSql('ALTER TABLE club DROP league_id');
    }
}
