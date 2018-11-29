<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128104602 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bestellingen_gerecht (id INT AUTO_INCREMENT NOT NULL, bestelling_id_id INT NOT NULL, gerecht_id_id INT NOT NULL, product_kwantitiet INT NOT NULL, INDEX IDX_5E2CE902D14A4739 (bestelling_id_id), INDEX IDX_5E2CE90267FC84A5 (gerecht_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gebruikers (id INT AUTO_INCREMENT NOT NULL, klant_id_id INT DEFAULT NULL, naam VARCHAR(255) NOT NULL, wachtwoord VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_968F1E251494450 (klant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerecht_benodigdheden (id INT AUTO_INCREMENT NOT NULL, gerecht_id_id INT NOT NULL, product_id_id INT NOT NULL, benodigdheden INT NOT NULL, INDEX IDX_6036924367FC84A5 (gerecht_id_id), INDEX IDX_60369243DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE klanten (id INT AUTO_INCREMENT NOT NULL, telefoon_nummer INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE openings_tijden (id INT AUTO_INCREMENT NOT NULL, restaurant_id_id INT NOT NULL, dag VARCHAR(255) NOT NULL, open_tijd TIME NOT NULL, dicht_tijd TIME NOT NULL, INDEX IDX_7F16627435592D86 (restaurant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producten (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, voorraad VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservatie (id INT AUTO_INCREMENT NOT NULL, gebruiker_id_id INT DEFAULT NULL, datum DATE NOT NULL, tijd TIME NOT NULL, actief INT NOT NULL, INDEX IDX_956EA07F7BBFAAE3 (gebruiker_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservatie_tafels (id INT AUTO_INCREMENT NOT NULL, tafel_id_id INT NOT NULL, bestelling_id_id INT NOT NULL, reservatie_id_id INT NOT NULL, INDEX IDX_83A59BA5A4835CDB (tafel_id_id), INDEX IDX_83A59BA5D14A4739 (bestelling_id_id), INDEX IDX_83A59BA55F0EA862 (reservatie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tafels (id INT AUTO_INCREMENT NOT NULL, restaurant_id_id INT NOT NULL, zitplaatsen INT NOT NULL, INDEX IDX_D53615B035592D86 (restaurant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bestellingen_gerecht ADD CONSTRAINT FK_5E2CE902D14A4739 FOREIGN KEY (bestelling_id_id) REFERENCES bestellingen (id)');
        $this->addSql('ALTER TABLE bestellingen_gerecht ADD CONSTRAINT FK_5E2CE90267FC84A5 FOREIGN KEY (gerecht_id_id) REFERENCES gerechten (id)');
        $this->addSql('ALTER TABLE gebruikers ADD CONSTRAINT FK_968F1E251494450 FOREIGN KEY (klant_id_id) REFERENCES klanten (id)');
        $this->addSql('ALTER TABLE gerecht_benodigdheden ADD CONSTRAINT FK_6036924367FC84A5 FOREIGN KEY (gerecht_id_id) REFERENCES gerechten (id)');
        $this->addSql('ALTER TABLE gerecht_benodigdheden ADD CONSTRAINT FK_60369243DE18E50B FOREIGN KEY (product_id_id) REFERENCES producten (id)');
        $this->addSql('ALTER TABLE openings_tijden ADD CONSTRAINT FK_7F16627435592D86 FOREIGN KEY (restaurant_id_id) REFERENCES restaurants (id)');
        $this->addSql('ALTER TABLE reservatie ADD CONSTRAINT FK_956EA07F7BBFAAE3 FOREIGN KEY (gebruiker_id_id) REFERENCES gebruikers (id)');
        $this->addSql('ALTER TABLE reservatie_tafels ADD CONSTRAINT FK_83A59BA5A4835CDB FOREIGN KEY (tafel_id_id) REFERENCES tafels (id)');
        $this->addSql('ALTER TABLE reservatie_tafels ADD CONSTRAINT FK_83A59BA5D14A4739 FOREIGN KEY (bestelling_id_id) REFERENCES bestellingen (id)');
        $this->addSql('ALTER TABLE reservatie_tafels ADD CONSTRAINT FK_83A59BA55F0EA862 FOREIGN KEY (reservatie_id_id) REFERENCES reservatie (id)');
        $this->addSql('ALTER TABLE tafels ADD CONSTRAINT FK_D53615B035592D86 FOREIGN KEY (restaurant_id_id) REFERENCES restaurants (id)');
        $this->addSql('DROP TABLE klant');
        $this->addSql('ALTER TABLE restaurants CHANGE contact telefoon_nummer INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservatie DROP FOREIGN KEY FK_956EA07F7BBFAAE3');
        $this->addSql('ALTER TABLE gebruikers DROP FOREIGN KEY FK_968F1E251494450');
        $this->addSql('ALTER TABLE gerecht_benodigdheden DROP FOREIGN KEY FK_60369243DE18E50B');
        $this->addSql('ALTER TABLE reservatie_tafels DROP FOREIGN KEY FK_83A59BA55F0EA862');
        $this->addSql('ALTER TABLE reservatie_tafels DROP FOREIGN KEY FK_83A59BA5A4835CDB');
        $this->addSql('CREATE TABLE klant (id INT AUTO_INCREMENT NOT NULL, telefoon_nummer INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE bestellingen_gerecht');
        $this->addSql('DROP TABLE gebruikers');
        $this->addSql('DROP TABLE gerecht_benodigdheden');
        $this->addSql('DROP TABLE klanten');
        $this->addSql('DROP TABLE openings_tijden');
        $this->addSql('DROP TABLE producten');
        $this->addSql('DROP TABLE reservatie');
        $this->addSql('DROP TABLE reservatie_tafels');
        $this->addSql('DROP TABLE tafels');
        $this->addSql('ALTER TABLE restaurants CHANGE telefoon_nummer contact INT NOT NULL');
    }
}
