<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628221507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge ADD difficulty_level_id INT NOT NULL, ADD creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D709895164890943 FOREIGN KEY (difficulty_level_id) REFERENCES difficulty (id)');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D709895161220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D709895164890943 ON challenge (difficulty_level_id)');
        $this->addSql('CREATE INDEX IDX_D709895161220EA6 ON challenge (creator_id)');
        $this->addSql('ALTER TABLE comment ADD correction_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C94AE086B FOREIGN KEY (correction_id) REFERENCES correction (id)');
        $this->addSql('CREATE INDEX IDX_9474526C94AE086B ON comment (correction_id)');
        $this->addSql('ALTER TABLE correction ADD corrector_id INT NOT NULL, ADD exercice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE correction ADD CONSTRAINT FK_A29DA1B83A6E8746 FOREIGN KEY (corrector_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE correction ADD CONSTRAINT FK_A29DA1B889D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id)');
        $this->addSql('CREATE INDEX IDX_A29DA1B83A6E8746 ON correction (corrector_id)');
        $this->addSql('CREATE INDEX IDX_A29DA1B889D40298 ON correction (exercice_id)');
        $this->addSql('ALTER TABLE exercice ADD realisator_id INT NOT NULL, ADD challenge_id INT NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D139504F0 FOREIGN KEY (realisator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D98A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('CREATE INDEX IDX_E418C74D139504F0 ON exercice (realisator_id)');
        $this->addSql('CREATE INDEX IDX_E418C74D98A21AC6 ON exercice (challenge_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D709895164890943');
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D709895161220EA6');
        $this->addSql('DROP INDEX IDX_D709895164890943 ON challenge');
        $this->addSql('DROP INDEX IDX_D709895161220EA6 ON challenge');
        $this->addSql('ALTER TABLE challenge DROP difficulty_level_id, DROP creator_id');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C94AE086B');
        $this->addSql('DROP INDEX IDX_9474526C94AE086B ON comment');
        $this->addSql('ALTER TABLE comment DROP correction_id');
        $this->addSql('ALTER TABLE correction DROP FOREIGN KEY FK_A29DA1B83A6E8746');
        $this->addSql('ALTER TABLE correction DROP FOREIGN KEY FK_A29DA1B889D40298');
        $this->addSql('DROP INDEX IDX_A29DA1B83A6E8746 ON correction');
        $this->addSql('DROP INDEX IDX_A29DA1B889D40298 ON correction');
        $this->addSql('ALTER TABLE correction DROP corrector_id, DROP exercice_id');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D139504F0');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D98A21AC6');
        $this->addSql('DROP INDEX IDX_E418C74D139504F0 ON exercice');
        $this->addSql('DROP INDEX IDX_E418C74D98A21AC6 ON exercice');
        $this->addSql('ALTER TABLE exercice DROP realisator_id, DROP challenge_id');
    }
}
