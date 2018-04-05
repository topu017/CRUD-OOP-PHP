<?php
include_once 'DBConfig.php';

class CRUD extends DBConfig
{
    public function __construct()
    {
        parent::__construct();
    }

    //Reading data from database table
    public function getData($query)
    {
        $result = $this->connection->query($query);
        if ($result == false){
            return false;
        }

        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    //Executing database query
    public function execute($query)
    {
        $result = $this->connection->query($query);
        if($result == false){
            echo "Cannot execute the query!";
            return false;
        }else{
            return true;
        }
    }

    //Deleting data row from database table
    public function delete($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->connection->query($query);

        if($result == false){
            echo 'Error: cannot delete id ' .$id. ' from table ' .$table;
            return false;
        }else{
            return true;
        }
    }

    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}
?>