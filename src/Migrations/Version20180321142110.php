<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180321142110 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_caddie ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_caddie ADD CONSTRAINT FK_C8EA9BB4584665A FOREIGN KEY (product_id) REFERENCES app_products (id)');
        $this->addSql('CREATE INDEX IDX_C8EA9BB4584665A ON app_caddie (product_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_caddie DROP FOREIGN KEY FK_C8EA9BB4584665A');
        $this->addSql('DROP INDEX IDX_C8EA9BB4584665A ON app_caddie');
        $this->addSql('ALTER TABLE app_caddie DROP product_id');
    }
}
