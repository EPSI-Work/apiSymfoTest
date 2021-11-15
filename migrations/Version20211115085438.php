<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211115085438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY constraint_postIdPicture');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE post');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY constraint_commentIdUser');
        $this->addSql('DROP INDEX constraint_commentIdUser ON comment');
        $this->addSql('ALTER TABLE comment CHANGE creation_date creation_date DATETIME NOT NULL, CHANGE user user_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, encoded_image TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_picture INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, content TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX constraint_postIdPicture (id_picture), INDEX constraint_postIdUser (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT constraint_postIdPicture FOREIGN KEY (id_picture) REFERENCES picture (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT constraint_postIdUser FOREIGN KEY (id_user) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP INDEX IDX_9474526CA76ED395 ON comment');
        $this->addSql('ALTER TABLE comment CHANGE creation_date creation_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE user_id user INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT constraint_commentIdUser FOREIGN KEY (user) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX constraint_commentIdUser ON comment (user)');
    }
}
