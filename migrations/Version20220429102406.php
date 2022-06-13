<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429102406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE balance ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE balance ADD CONSTRAINT FK_ACF41FFE6E3A9A34 FOREIGN KEY (id_sous_dossier_id) REFERENCES psous_dossiers (id)');
        $this->addSql('ALTER TABLE psous_dossiers ADD CONSTRAINT FK_9F609AB1C4968C81 FOREIGN KEY (id_dossier_id) REFERENCES pdossier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE balance DROP FOREIGN KEY FK_ACF41FFE6E3A9A34');
        $this->addSql('ALTER TABLE balance DROP description');
        $this->addSql('ALTER TABLE psous_dossiers DROP FOREIGN KEY FK_9F609AB1C4968C81');
    }
}
