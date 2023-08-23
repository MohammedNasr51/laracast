<?php

class Database
{
    public $connection;

    public function __construct($config)
    {

        $dsn = "mysql:".http_build_query($config,'',';');
        
        //$dsn = "mysql:host=localhost;dbname=ooplogin;port=3307";

        $this->connection = new PDO
        
        ($dsn,'root','MohamedNasr2002@',
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

    }
    public function Query($query)
    {

        $statment = $this->connection->prepare($query);

        $statment->execute();

        return $statment;

    }


}