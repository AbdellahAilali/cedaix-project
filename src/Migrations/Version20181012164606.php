<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181012164606 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE school_boy (id INT AUTO_INCREMENT NOT NULL, classes_id INT NOT NULL, lastname VARCHAR(28) NOT NULL, firstname VARCHAR(28) NOT NULL, date_of_birth DATE NOT NULL, INDEX IDX_530BF5079E225B24 (classes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, school_boy_id INT NOT NULL, registration_date DATE NOT NULL, INDEX IDX_62A8A7A79D171F96 (school_boy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE registration_matter (registration_id INT NOT NULL, matter_id INT NOT NULL, INDEX IDX_1E805B85833D8F43 (registration_id), INDEX IDX_1E805B85D614E59F (matter_id), PRIMARY KEY(registration_id, matter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE school_boy ADD CONSTRAINT FK_530BF5079E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A79D171F96 FOREIGN KEY (school_boy_id) REFERENCES school_boy (id)');
        $this->addSql('ALTER TABLE registration_matter ADD CONSTRAINT FK_1E805B85833D8F43 FOREIGN KEY (registration_id) REFERENCES registration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE registration_matter ADD CONSTRAINT FK_1E805B85D614E59F FOREIGN KEY (matter_id) REFERENCES matter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6AF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A79D171F96');
        $this->addSql('ALTER TABLE registration_matter DROP FOREIGN KEY FK_1E805B85833D8F43');
        $this->addSql('DROP TABLE school_boy');
        $this->addSql('DROP TABLE registration');
        $this->addSql('DROP TABLE registration_matter');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6AF5B7AF75');
    }
}
