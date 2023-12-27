<?php

class DataBaseConnected {

    private $connection;

      function throwExecption($message = null, $code = null)
    {
        throw new Exception($message, $code);
    }

    // Connecting to database
    function __construct() {
        require_once 'Config.php';
        // Connecting to mysql database
        try
        {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)  or throwExecption("error");
      
        }
        catch (Exception $e)
        {
        $error = mysqli_connect_error();
        error_log($error,'../error.log');
        
        }
    }
    
  
    public function getConnection() {
        return $this->connection;
    }

}

?>