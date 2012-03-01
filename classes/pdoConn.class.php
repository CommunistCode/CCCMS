<?php

  class pdoConn {

    private $pdoConn;
    private $lastInsertID;

    function __construct() {

      try {
        
        $this->pdoConn = new PDO('mysql:host=localhost;dbname='.DB_NAME,DB_USER,DB_PASS);

        $this->pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch (PDOException $e) {

        $this->manageException($e);

      }

    }

    public function getLastInsertID() {

      return $this->lastInsertID;

    }

    private function manageException($e) {
  
      if (DEBUG) {

        print "<strong>ERROR:</strong> ".$e->getMessage()." <br />";
        die();

      } else {

        header("Location:".DIRECTORY_PATH."error.php?type=database") ;

      }

    }

    private function doExecute($query) {

      $return['error'] = 0;

      try {
        
        $query->execute();

      } catch (Exception $e) {

        $this->manageException($e);        

      }

      return $return;

    }

    private function doPrepare($queryString) {

      try {
        
        $query = $this->pdoConn->prepare($queryString);

      } catch (Exception $e) {

        $this->manageException($e);

      }

      return $query;

    }

    private function makeCommaSeperatedString($value) {

      if (is_array($value)) {
        
        $newValue = implode(",",$value);

      } else {

        $newValue = $value;

      }

      return $newValue;

    }

    private function makeOperatorString($itemArray, $type=NULL) {

      $stringArray = array();
      $newString = "";
      $firstIteration = 1;     
 
      foreach($itemArray as $item) {

        if (!isset($item['operator'])) {

          $item['operator'] = "=";

        }

        if (!isset($item['joinOperator'])) {

          if ($type == "SET") {

            $item['joinOperator'] = ",";

          } else {

            $item['joinOperator'] = "AND";

          }

        }

        if ($firstIteration) {

          $string = $item['column'] . $item['operator'] . "?";
          $firstIteration = 0;

        } else {
        
          $string = " ".$item['joinOperator']." ".$item['column'] . $item['operator'] . "?";
        
        }

        array_push($stringArray,$string);

      }

      $newString = implode("",$stringArray);
      
      return $newString;

    }

    private function getResultArray($pdoResult) {

      $resultArray = array();

      while ($row = $pdoResult->fetch(PDO::FETCH_ASSOC)) {

        array_push($resultArray,$row);

      }

      return $resultArray;

    }

    public function select($fieldArray, $tableArray, $whereArray=NULL, $orderBy=NULL, $limit=NULL, $debug=0) {

      $fields = $this->makeCommaSeperatedString($fieldArray);
      $tables = $this->makeCommaSeperatedString($tableArray);

      $queryString = "SELECT ".$fields." FROM ".$tables;

      if ($whereArray) {

        $where = $this->makeOperatorString($whereArray);
        
        $queryString .= " WHERE ".$where;

      }

      if ($orderBy) {

        $queryString .= " ORDER BY ".$orderBy;

      }

      if ($limit) {

        $queryString .= " LIMIT ".$limit;

      }
      
      $query = $this->doPrepare($queryString);
      
      $i = 0;

      if ($whereArray) {

        foreach($whereArray as $where) {

          $i++;
          $query->bindParam($i,$where['value']);

        }

      }
      
      if ($debug) {

        var_dump($query);
        print_r($whereArray);

      }

      $this->doExecute($query);
      
      return $this->getResultArray($query);

    }

    public function update($tableArray, $setArray, $whereArray, $debug=0) {

      $tables = $this->makeCommaSeperatedString($tableArray);
      $values = $this->makeOperatorString($setArray, "SET");
      $where = $this->makeOperatorString($whereArray);

      $queryString = "UPDATE ".$tables." SET ".$values." WHERE ".$where;

      $query = $this->doPrepare($queryString);

      $i = 0;
     
      $bindArray = array_merge($setArray, $whereArray);

      foreach($bindArray as $bind) {
        
        $i++;
        $query->bindParam($i,$bind['value']);

      }
     
      if ($debug) {

        var_dump($query);
        print_r($setArray);
        print_r($whereArray);

      }

      $return =  $this->doExecute($query);
      
      return $return;

    }

    public function insert($table,$insertArray) {

      $fieldArray = array();
      $valueArray = array();

      foreach($insertArray as $insert) {

        array_push($fieldArray,$insert['field']);
        array_push($valueArray,$insert['value']);

      }
      
      $fields = $this->makeCommaSeperatedString($fieldArray);
      
      $numValues = count($valueArray);

      for ($i=0; $i<$numValues; $i++) {

        $valPlaceholderArray[$i] = ":".$i;

      }

      $valPlaceholders = $this->makeCommaSeperatedString($valPlaceholderArray);

      $queryString = "INSERT INTO ".$table." (".$fields.") values(".$valPlaceholders.")";
      
      $query = $this->doPrepare($queryString);
      
      for ($i=0; $i<$numValues; $i++) { 
  
        $query->bindParam(":".$i, $valueArray[$i]);
      
      }
      
      $return = $this->doExecute($query);
      
      $this->lastInsertID = $this->pdoConn->lastInsertID();
      
      return $return;

    }

    public function customQuery($queryString,$bindArray=NULL,$debug=NULL) {

      $query = $this->doPrepare($queryString);

      $i = 0;

      if ($bindArray != NULL) {

        foreach($bindArray as $bind) {

          $i++;
          $query->bindParam($i,$bind);

        }

      }

      $return = $this->doExecute($query);

      if ($debug) {

        var_dump($query);

      }

      return $this->getResultArray($query);

    }

  }

?>
