<?php

class Database
{
    public $connection;

    public function __construct($config,$username='root',$password='MohamedNasr2002@')
    {

        $dsn = "mysql:".http_build_query($config,'',';');
        
        //$dsn = "mysql:host=localhost;dbname=ooplogin;port=3307";

        $this->connection = new PDO($dsn,$username,$password,[

                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

    }
    public function Query($query,$params=[])
    {

        $statment = $this->connection->prepare($query);

        $statment->execute($params);

        return $statment;

    }


}
