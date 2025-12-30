<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251104213458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('samples');

        $table->addColumn('id', Types::INTEGER, [
            'autoincrement' => true,
        ]);
        $table->addColumn('title', Types::STRING, ['length' => 255]);
        $table->addColumn('created_at', Types::DATETIME_MUTABLE);
        $table->addColumn('updated_at', Types::DATETIME_MUTABLE);

        $table->setPrimaryKey(array('id'));
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('samples');
    }
}
