<?php

class Database{

  private $_db_conn;
  private $_db_host;
  private $_db_name;
  private $_db_user;
  private $_db_pass;
  private $_db_stmt;
  
  public function __construct(){
    //set default data
    $this->_db_host = DB_HOST;
    $this->_db_name = DB_NAME;
    $this->_db_user = DB_USER;
    $this->_db_pass = DB_PASS;
    
    //connect
    $this->_connect();
  }
  
  private function _connect(){
    try{
      $this->_db_conn = new PDO("mysql:host=" . $this->_db_host . ';' .
                               "dbname=" . $this->_db_name ,
                               $this->_db_user ,
                               $this->_db_pass
                              );
    }catch(PDOException $e){
      echo '<br/>Error ' . $e->getMessage() . '<br/>';
      die();
    }
  }
  
  public function pquery($prepared , $values){
    try{
      $this->_db_stmt = $this->_db_conn->prepare($prepared);
      $this->_db_stmt->execute($values);
      $res = $this->_db_stmt->fetch(PDO::FETCH_ASSOC);
      return $res;
    }
    catch(PDOException $e){
        echo '<br/>Error' . $e->getMessage() . '<br/>';
        die();
    }
  }
  
  public function getConn(){
    return $this->_db_conn;
  }
  
  __get($name){
    return $this->_db_conn->$name;
  }
  
  __set($name , $value){
    $this->_db_conn->$name = $value;
  }
  
  __call($name , $arguments){
    return $this->_db_conn->$name($arguments);
  }

}
