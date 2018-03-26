<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180321134057 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_caddie ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_caddie ADD CONSTRAINT FK_C8EA9BBA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8EA9BBA76ED395 ON app_caddie (user_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_caddie DROP FOREIGN KEY FK_C8EA9BBA76ED395');
        $this->addSql('DROP INDEX UNIQ_C8EA9BBA76ED395 ON app_caddie');
        $this->addSql('ALTER TABLE app_caddie DROP user_id');
    }
}
