<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180322104132 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_caddie DROP INDEX UNIQ_C8EA9BBA76ED395, ADD INDEX IDX_C8EA9BBA76ED395 (user_id)');
        $this->addSql('ALTER TABLE app_products DROP FOREIGN KEY FK_BB3A3AF772E0227F');
        $this->addSql('DROP INDEX IDX_BB3A3AF772E0227F ON app_products');
        $this->addSql('ALTER TABLE app_products DROP caddie_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_caddie DROP INDEX IDX_C8EA9BBA76ED395, ADD UNIQUE INDEX UNIQ_C8EA9BBA76ED395 (user_id)');
        $this->addSql('ALTER TABLE app_products ADD caddie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_products ADD CONSTRAINT FK_BB3A3AF772E0227F FOREIGN KEY (caddie_id) REFERENCES app_caddie (id)');
        $this->addSql('CREATE INDEX IDX_BB3A3AF772E0227F ON app_products (caddie_id)');
    }
}
