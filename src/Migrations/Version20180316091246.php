<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180316091246 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_review ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_review ADD CONSTRAINT FK_9C40EC46A76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_9C40EC46A76ED395 ON app_review (user_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_review DROP FOREIGN KEY FK_9C40EC46A76ED395');
        $this->addSql('DROP INDEX IDX_9C40EC46A76ED395 ON app_review');
        $this->addSql('ALTER TABLE app_review DROP user_id');
    }
}
