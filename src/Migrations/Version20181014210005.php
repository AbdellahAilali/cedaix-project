<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181014210005 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, address1 VARCHAR(56) NOT NULL, address2 VARCHAR(56) DEFAULT NULL, postal_code INT NOT NULL, city VARCHAR(28) NOT NULL, country VARCHAR(28) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, last_name VARCHAR(28) NOT NULL, first_name VARCHAR(28) NOT NULL, phone VARCHAR(28) NOT NULL, email VARCHAR(56) NOT NULL, INDEX IDX_FD501D6AF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matter (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(28) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(28) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school_boy (id INT AUTO_INCREMENT NOT NULL, classes_id INT NOT NULL, father_id INT NOT NULL, mother_id INT NOT NULL, lastname VARCHAR(28) NOT NULL, firstname VARCHAR(28) NOT NULL, date_of_birth DATE NOT NULL, birthplace VARCHAR(28) NOT NULL, INDEX IDX_530BF5079E225B24 (classes_id), INDEX IDX_530BF5072055B9A2 (father_id), INDEX IDX_530BF507B78A354D (mother_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, school_boy_id INT NOT NULL, created_at DATE NOT NULL, INDEX IDX_62A8A7A79D171F96 (school_boy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registration_matter (registration_id INT NOT NULL, matter_id INT NOT NULL, INDEX IDX_1E805B85833D8F43 (registration_id), INDEX IDX_1E805B85D614E59F (matter_id), PRIMARY KEY(registration_id, matter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6AF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE school_boy ADD CONSTRAINT FK_530BF5079E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE school_boy ADD CONSTRAINT FK_530BF5072055B9A2 FOREIGN KEY (father_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE school_boy ADD CONSTRAINT FK_530BF507B78A354D FOREIGN KEY (mother_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A79D171F96 FOREIGN KEY (school_boy_id) REFERENCES school_boy (id)');
        $this->addSql('ALTER TABLE registration_matter ADD CONSTRAINT FK_1E805B85833D8F43 FOREIGN KEY (registration_id) REFERENCES registration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registration_matter ADD CONSTRAINT FK_1E805B85D614E59F FOREIGN KEY (matter_id) REFERENCES matter (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6AF5B7AF75');
        $this->addSql('ALTER TABLE school_boy DROP FOREIGN KEY FK_530BF5072055B9A2');
        $this->addSql('ALTER TABLE school_boy DROP FOREIGN KEY FK_530BF507B78A354D');
        $this->addSql('ALTER TABLE registration_matter DROP FOREIGN KEY FK_1E805B85D614E59F');
        $this->addSql('ALTER TABLE school_boy DROP FOREIGN KEY FK_530BF5079E225B24');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A79D171F96');
        $this->addSql('ALTER TABLE registration_matter DROP FOREIGN KEY FK_1E805B85833D8F43');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE matter');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE school_boy');
        $this->addSql('DROP TABLE registration');
        $this->addSql('DROP TABLE registration_matter');
    }
}
