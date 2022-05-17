<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Model\Conexao;

class CreateDatabaseCommand extends Command
{
    const TABLE_REGISTER = 'register';
    const TABLE_USERS = 'users';

    protected function configure()
    {
        $this->setName('precad:create:database')
            ->setDescription('Create Database for PrecadDTS');
    }

    protected function execute(InputInterface $input, OutputInterface $output): string
    {
        $statements =
            [
                '
                    CREATE TABLE IF NOT EXISTS ' . self::TABLE_REGISTER . '
                        ( 
                            id INT AUTO_INCREMENT,
                            tipocad INT NOT NULL, 
                            cgc BIGINT NOT NULL, 
                            razao VARCHAR(255) NOT NULL,
                            fantasia VARCHAR(255) NOT NULL,
                            email VARCHAR(255) NOT NULL,
                            endereco VARCHAR(255) NOT NULL,
                            bairro VARCHAR(100) NOT NULL,
                            cidade VARCHAR(50) NOT NULL,
                            estado VARCHAR(50) NOT NULL,
                            area VARCHAR(100) NOT NULL,
                            arquivos VARCHAR(100) NOT NULL,
                            termos INT NOT NULL,
                            responsaveis JSON NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                            updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
                            deleted_at DATETIME NULL,
                            PRIMARY KEY(id)
                        )
                ',
                '
                    CREATE TABLE IF NOT EXISTS ' . self::TABLE_USERS . '
                        ( 
                            id INT AUTO_INCREMENT,
                            user VARCHAR(50) NOT NULL, 
                            email VARCHAR(200) NOT NULL, 
                            pass VARCHAR(255) NOT NULL,
                            status INT DEFAULT 1 NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                            updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
                            deleted_at DATETIME NULL,
                            PRIMARY KEY(id)
                        )
                '
            ];

        $connection = Conexao::getConn();

        foreach ($statements as $statement) {
            if ($connection->exec($statement)) {
                return $output->writeln(printf('Tabelas CRIADAS com sucesso!'));
            } else {
                return $output->writeln(printf('Erro ao criar tabelas!'));
            }
        }
    }
}