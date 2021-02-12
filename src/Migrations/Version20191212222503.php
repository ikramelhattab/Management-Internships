<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212222503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA912469DE2 FOREIGN KEY (category_id) REFERENCES categoreis (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_50159CA912469DE2 ON projet (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50159CA9A76ED395 ON projet (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA912469DE2');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9A76ED395');
        $this->addSql('DROP INDEX IDX_50159CA912469DE2 ON projet');
        $this->addSql('DROP INDEX UNIQ_50159CA9A76ED395 ON projet');
    }
}
