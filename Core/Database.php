<?php

namespace Core;
use PDO;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {             
        error_log('💡 config[driver] = ' . $config['driver']);
        if ($config['driver'] === 'sqlite') {
            $dsn = 'sqlite:///' . $config['database'];

            $this->connection = new PDO($dsn, null, null, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            
        } else{
            $dsn = 'mysql:' . http_build_query([
                'host' => $config['host'],
                'port' => $config['port'],
                'dbname' => $config['dbname'],
                'charset' => $config['charset']
            ], '', ';');
            
            $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
    }
    
    public function query($query, $params = [])
    {


        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;

    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }



}