<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220119201542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boutique_images (id INT AUTO_INCREMENT NOT NULL, boutique_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_F3D8519FAB677BE6 (boutique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_images (id INT AUTO_INCREMENT NOT NULL, media_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_5C6624B4EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE press_images (id INT AUTO_INCREMENT NOT NULL, press_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A1AE8C69B444985D (press_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boutique_images ADD CONSTRAINT FK_F3D8519FAB677BE6 FOREIGN KEY (boutique_id) REFERENCES articles_boutique (id)');
        $this->addSql('ALTER TABLE media_images ADD CONSTRAINT FK_5C6624B4EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE press_images ADD CONSTRAINT FK_A1AE8C69B444985D FOREIGN KEY (press_id) REFERENCES articles_press (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE boutique_images');
        $this->addSql('DROP TABLE media_images');
        $this->addSql('DROP TABLE press_images');
    }
}
