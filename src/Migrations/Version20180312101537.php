<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180312101537 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_products DROP FOREIGN KEY FK_BB3A3AF7FB745B71');
        $this->addSql('DROP INDEX UNIQ_BB3A3AF7FB745B71 ON app_products');
        $this->addSql('ALTER TABLE app_products ADD deletedAt DATETIME DEFAULT NULL, DROP imageobj_id, DROP display');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_products ADD imageobj_id INT DEFAULT NULL, ADD display TINYINT(1) DEFAULT NULL, DROP deletedAt');
        $this->addSql('ALTER TABLE app_products ADD CONSTRAINT FK_BB3A3AF7FB745B71 FOREIGN KEY (imageobj_id) REFERENCES app_image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BB3A3AF7FB745B71 ON app_products (imageobj_id)');
    }
}
