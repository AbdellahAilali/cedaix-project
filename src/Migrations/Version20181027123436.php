<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181027123436 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE registration_school_boy (registration_id INT NOT NULL, school_boy_id INT NOT NULL, INDEX IDX_6E303C2E833D8F43 (registration_id), INDEX IDX_6E303C2E9D171F96 (school_boy_id), PRIMARY KEY(registration_id, school_boy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registration_school_boy ADD CONSTRAINT FK_6E303C2E833D8F43 FOREIGN KEY (registration_id) REFERENCES registration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registration_school_boy ADD CONSTRAINT FK_6E303C2E9D171F96 FOREIGN KEY (school_boy_id) REFERENCES school_boy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A79D171F96');
        $this->addSql('DROP INDEX IDX_62A8A7A79D171F96 ON registration');
        $this->addSql('ALTER TABLE registration DROP school_boy_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE address CHANGE address2 address2 VARCHAR(56) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE registration_school_boy');
        $this->addSql('ALTER TABLE address CHANGE address2 address2 VARCHAR(56) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE registration ADD school_boy_id INT NOT NULL');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A79D171F96 FOREIGN KEY (school_boy_id) REFERENCES school_boy (id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A79D171F96 ON registration (school_boy_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
