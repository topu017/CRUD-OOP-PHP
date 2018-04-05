<?php
class DBConfig
{
    private $_host = 'localhost';
    private $_username = 'your mysql username';
    private $_password = 'your mysql password';
    private $_database = 'your mysql database name';

    protected $connection;

    //Creating database connection
    public function __construct()
    {
        if(!isset($this->connection)){
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            if(!$this->connection){
                echo "Cannot connect to the database server!";
                exit;
            }
        }
        return $this->connection;
    }
}
?>