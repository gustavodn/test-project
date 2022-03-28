<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220327174520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates `candidatos` table';
    }
    
    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE `candidato` (
                id CHAR(36) NOT NULL PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                email VARCHAR(100) NOT NULL,
                status VARCHAR(50) NOT NULL
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE = InnoDB'
        );
    }
    
    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `candidato`');
    }
}
