<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181228090523 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hedge ADD first_rmp_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hedge ADD CONSTRAINT FK_3B22C7EB8441A833 FOREIGN KEY (first_rmp_id) REFERENCES rmp (id)');
        $this->addSql('CREATE INDEX IDX_3B22C7EB8441A833 ON hedge (first_rmp_id)');
        $this->addSql('ALTER TABLE hedge_line ADD first_rmp_sub_segment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hedge_line ADD CONSTRAINT FK_3FD4992AD385044D FOREIGN KEY (first_rmp_sub_segment_id) REFERENCES rmp_sub_segment (id)');
        $this->addSql('CREATE INDEX IDX_3FD4992AD385044D ON hedge_line (first_rmp_sub_segment_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hedge DROP FOREIGN KEY FK_3B22C7EB8441A833');
        $this->addSql('DROP INDEX IDX_3B22C7EB8441A833 ON hedge');
        $this->addSql('ALTER TABLE hedge DROP first_rmp_id');
        $this->addSql('ALTER TABLE hedge_line DROP FOREIGN KEY FK_3FD4992AD385044D');
        $this->addSql('DROP INDEX IDX_3FD4992AD385044D ON hedge_line');
        $this->addSql('ALTER TABLE hedge_line DROP first_rmp_sub_segment_id');
    }
}
