<?php

  class pdoConn {

    private $pdoConn;

    function __construct() {

      try {
        
        $this->pdoConn = new PDO('mysql:host=localhost;dbname='.$GLOBALS['DB_NAME'],$GLOBALS['DB_USER'],$GLOBALS['DB_PASS']);

        $this->pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } catch (PDOException $e) {

        $this->manageException($e);

      }

    }

    private function manageException($e) {

      print "<strong>ERROR:</strong> ".$e->getMessage()." <br />";
      die();

    }

    private function doExecute($query) {

      $return['error'] = 0;

      try {
        
        $query->execute();

      } catch (Exception $e) {

        $return['message'] = "Error!: ".$e->getMessage()."<br />";
        $return['error'] = 1;

      }

      return $return;

    }

    private function doPrepare($queryString) {

      try {
        
        $query = $this->pdoConn->prepare($queryString);

      } catch (Exception $e) {

        print "Error!: ".$e->getMessage()."<br />";

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

    private function makeOperatorString($itemArray) {

      $stringArray = array();
      $newString = "";
      
      foreach($itemArray as $item) {

        if (!isset($item['operator'])) {

          $item['operator'] = "=";

        }

        $string = $item['column'] . $item['operator'] . "?";
        array_push($stringArray,$string);

      }

      $newString = implode(" AND ",$stringArray);

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
      $values = $this->makeOperatorString($setArray);
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

  }

?>
