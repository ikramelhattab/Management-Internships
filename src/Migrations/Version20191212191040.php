<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212191040 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projet_user (projet_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FA413966C18272 (projet_id), INDEX IDX_FA413966A76ED395 (user_id), PRIMARY KEY(projet_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projet_user ADD CONSTRAINT FK_FA413966C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_user ADD CONSTRAINT FK_FA413966A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA912469DE2 FOREIGN KEY (category_id) REFERENCES categoreis (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_50159CA912469DE2 ON projet (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50159CA9A76ED395 ON projet (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE projet_user');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA912469DE2');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9A76ED395');
        $this->addSql('DROP INDEX IDX_50159CA912469DE2 ON projet');
        $this->addSql('DROP INDEX UNIQ_50159CA9A76ED395 ON projet');
    }
}
