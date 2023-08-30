<?php

class Database
{
    public $connection;

    public $statment;

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

        $this->statment = $this->connection->prepare($query);

        $this->statment->execute($params);

        return $this;

    }

    public function find(){

        return $this->statment->fetch();

    }

    public function FindOrFail(){

        $result=$this->find();

        if (!$result) {

            abourt();

        }

        return $result;
    }

    public function get(){

        return $this->statment->fetchAll();

    }

}
