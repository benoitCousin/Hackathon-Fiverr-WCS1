<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629132356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE creator_qlvl creator_qlvl INT DEFAULT 0 NOT NULL, CHANGE corrector_qlvl corrector_qlvl INT DEFAULT 0 NOT NULL, CHANGE corrector_exlvl corrector_exlvl INT DEFAULT 0 NOT NULL, CHANGE realisator_exlvl realisator_exlvl INT DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE creator_qlvl creator_qlvl INT NOT NULL, CHANGE corrector_qlvl corrector_qlvl INT NOT NULL, CHANGE corrector_exlvl corrector_exlvl INT NOT NULL, CHANGE realisator_exlvl realisator_exlvl INT NOT NULL');
    }
}
