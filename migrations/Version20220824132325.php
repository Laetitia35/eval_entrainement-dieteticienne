<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220824132325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipes_user (recipes_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B6CBB700FDF2B1FA (recipes_id), INDEX IDX_B6CBB700A76ED395 (user_id), PRIMARY KEY(recipes_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipes_allergen (recipes_id INT NOT NULL, allergen_id INT NOT NULL, INDEX IDX_49DF8016FDF2B1FA (recipes_id), INDEX IDX_49DF80166E775A4A (allergen_id), PRIMARY KEY(recipes_id, allergen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipes_diet (recipes_id INT NOT NULL, diet_id INT NOT NULL, INDEX IDX_A6BC0469FDF2B1FA (recipes_id), INDEX IDX_A6BC0469E1E13ACE (diet_id), PRIMARY KEY(recipes_id, diet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recipes_user ADD CONSTRAINT FK_B6CBB700FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_user ADD CONSTRAINT FK_B6CBB700A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_allergen ADD CONSTRAINT FK_49DF8016FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_allergen ADD CONSTRAINT FK_49DF80166E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_diet ADD CONSTRAINT FK_A6BC0469FDF2B1FA FOREIGN KEY (recipes_id) REFERENCES recipes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipes_diet ADD CONSTRAINT FK_A6BC0469E1E13ACE FOREIGN KEY (diet_id) REFERENCES diet (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipes_user DROP FOREIGN KEY FK_B6CBB700FDF2B1FA');
        $this->addSql('ALTER TABLE recipes_user DROP FOREIGN KEY FK_B6CBB700A76ED395');
        $this->addSql('ALTER TABLE recipes_allergen DROP FOREIGN KEY FK_49DF8016FDF2B1FA');
        $this->addSql('ALTER TABLE recipes_allergen DROP FOREIGN KEY FK_49DF80166E775A4A');
        $this->addSql('ALTER TABLE recipes_diet DROP FOREIGN KEY FK_A6BC0469FDF2B1FA');
        $this->addSql('ALTER TABLE recipes_diet DROP FOREIGN KEY FK_A6BC0469E1E13ACE');
        $this->addSql('DROP TABLE recipes_user');
        $this->addSql('DROP TABLE recipes_allergen');
        $this->addSql('DROP TABLE recipes_diet');
    }
}
