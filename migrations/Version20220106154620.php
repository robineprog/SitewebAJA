<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220106154620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles_boutique (id INT AUTO_INCREMENT NOT NULL, categorie_articles_boutique_id INT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix INT NOT NULL, featured_image VARCHAR(255) NOT NULL, INDEX IDX_B6CA4E4BC17E73 (categorie_articles_boutique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_press (id INT AUTO_INCREMENT NOT NULL, categorie_articles_press_id INT NOT NULL, users_id INT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', featured_image VARCHAR(255) NOT NULL, INDEX IDX_952654499C32F6B2 (categorie_articles_press_id), INDEX IDX_9526544967B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_articles_boutique (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_articles_press (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_media (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, categorie_media_id INT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, media VARCHAR(255) NOT NULL, INDEX IDX_6A2CA10CD2189C1F (categorie_media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_boutique ADD CONSTRAINT FK_B6CA4E4BC17E73 FOREIGN KEY (categorie_articles_boutique_id) REFERENCES categorie_articles_boutique (id)');
        $this->addSql('ALTER TABLE articles_press ADD CONSTRAINT FK_952654499C32F6B2 FOREIGN KEY (categorie_articles_press_id) REFERENCES categorie_articles_press (id)');
        $this->addSql('ALTER TABLE articles_press ADD CONSTRAINT FK_9526544967B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CD2189C1F FOREIGN KEY (categorie_media_id) REFERENCES categorie_media (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_boutique DROP FOREIGN KEY FK_B6CA4E4BC17E73');
        $this->addSql('ALTER TABLE articles_press DROP FOREIGN KEY FK_952654499C32F6B2');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CD2189C1F');
        $this->addSql('DROP TABLE articles_boutique');
        $this->addSql('DROP TABLE articles_press');
        $this->addSql('DROP TABLE categorie_articles_boutique');
        $this->addSql('DROP TABLE categorie_articles_press');
        $this->addSql('DROP TABLE categorie_media');
        $this->addSql('DROP TABLE media');
    }
}
