<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180309131359 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE app_products2');
        $this->addSql('ALTER TABLE app_review ADD user_creation INT DEFAULT NULL, ADD user_delete INT DEFAULT NULL, ADD user_modif INT DEFAULT NULL, ADD date_delete DATETIME DEFAULT NULL, ADD date_modif DATETIME DEFAULT NULL, ADD deleted TINYINT(1) DEFAULT \'0\', DROP username, CHANGE date_review date_creation DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_products2 (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_39B7E3883DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_products2 ADD CONSTRAINT FK_39B7E3883DA5256D FOREIGN KEY (image_id) REFERENCES app_image (id)');
        $this->addSql('ALTER TABLE app_review ADD username VARCHAR(25) NOT NULL COLLATE utf8_unicode_ci, ADD date_review DATETIME DEFAULT NULL, DROP user_creation, DROP user_delete, DROP user_modif, DROP date_creation, DROP date_delete, DROP date_modif, DROP deleted');
    }
}
