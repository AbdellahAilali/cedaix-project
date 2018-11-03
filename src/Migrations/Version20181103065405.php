<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181103065405 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registration ADD father_id INT NOT NULL, ADD mother_id INT NOT NULL');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A72055B9A2 FOREIGN KEY (father_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7B78A354D FOREIGN KEY (mother_id) REFERENCES parents (id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A72055B9A2 ON registration (father_id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A7B78A354D ON registration (mother_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE address CHANGE address2 address2 VARCHAR(56) DEFAULT NULL');
        $this->addSql('ALTER TABLE school_boy DROP FOREIGN KEY FK_530BF5072055B9A2');
        $this->addSql('ALTER TABLE school_boy DROP FOREIGN KEY FK_530BF507B78A354D');
        $this->addSql('DROP INDEX IDX_530BF5072055B9A2 ON school_boy');
        $this->addSql('DROP INDEX IDX_530BF507B78A354D ON school_boy');
        $this->addSql('ALTER TABLE school_boy DROP father_id, DROP mother_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE address CHANGE address2 address2 VARCHAR(56) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A72055B9A2');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7B78A354D');
        $this->addSql('DROP INDEX IDX_62A8A7A72055B9A2 ON registration');
        $this->addSql('DROP INDEX IDX_62A8A7A7B78A354D ON registration');
        $this->addSql('ALTER TABLE registration DROP father_id, DROP mother_id');
        $this->addSql('ALTER TABLE school_boy ADD father_id INT NOT NULL, ADD mother_id INT NOT NULL');
        $this->addSql('ALTER TABLE school_boy ADD CONSTRAINT FK_530BF5072055B9A2 FOREIGN KEY (father_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE school_boy ADD CONSTRAINT FK_530BF507B78A354D FOREIGN KEY (mother_id) REFERENCES parents (id)');
        $this->addSql('CREATE INDEX IDX_530BF5072055B9A2 ON school_boy (father_id)');
        $this->addSql('CREATE INDEX IDX_530BF507B78A354D ON school_boy (mother_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
