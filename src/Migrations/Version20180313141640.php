<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180313141640 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_products ADD image_id INT DEFAULT NULL, DROP image');
        $this->addSql('ALTER TABLE app_products ADD CONSTRAINT FK_BB3A3AF73DA5256D FOREIGN KEY (image_id) REFERENCES app_image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BB3A3AF73DA5256D ON app_products (image_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_products DROP FOREIGN KEY FK_BB3A3AF73DA5256D');
        $this->addSql('DROP INDEX UNIQ_BB3A3AF73DA5256D ON app_products');
        $this->addSql('ALTER TABLE app_products ADD image VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, DROP image_id');
    }
}
