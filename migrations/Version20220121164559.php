<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121164559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_B6CA4E4BC17E73 ON articles_boutique');
        $this->addSql('ALTER TABLE articles_boutique ADD categorie VARCHAR(255) DEFAULT NULL, DROP categorie_articles_boutique_id');
        $this->addSql('DROP INDEX IDX_952654499C32F6B2 ON articles_press');
        $this->addSql('ALTER TABLE articles_press DROP categorie_articles_press_id');
        $this->addSql('DROP INDEX IDX_6A2CA10CD2189C1F ON media');
        $this->addSql('ALTER TABLE media ADD categorie VARCHAR(255) DEFAULT NULL, DROP categorie_media_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_boutique ADD categorie_articles_boutique_id INT NOT NULL, DROP categorie');
        $this->addSql('CREATE INDEX IDX_B6CA4E4BC17E73 ON articles_boutique (categorie_articles_boutique_id)');
        $this->addSql('ALTER TABLE articles_press ADD categorie_articles_press_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_952654499C32F6B2 ON articles_press (categorie_articles_press_id)');
        $this->addSql('ALTER TABLE media ADD categorie_media_id INT NOT NULL, DROP categorie');
        $this->addSql('CREATE INDEX IDX_6A2CA10CD2189C1F ON media (categorie_media_id)');
    }
}
