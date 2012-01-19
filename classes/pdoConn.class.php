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

      try {
        
        $query->execute();

      } catch (Exception $e) {

        print "Error!: ".$e->getMessage()."<br />";

      }

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

    private function makeWhereString($whereArray) {

      $stringArray = array();
      $newString = "";
      
      foreach($whereArray as $where) {

        $string = $where['column'] . $where['operator'] . "?";
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

    public function select($fieldArray, $tableArray, $whereArray=NULL, $orderBy=NULL, $debug=0) {

      $fields = $this->makeCommaSeperatedString($fieldArray);
      $tables = $this->makeCommaSeperatedString($tableArray);

      $queryString = "SELECT ".$fields." FROM ".$tables;

      if ($whereArray) {

        $where = $this->makeWhereString($whereArray);

        $queryString .= " WHERE ".$where;

      }

      if ($orderBy) {

        $queryString .= " ORDER BY ".$orderBy;

      }

      $query = $this->doPrepare($queryString);
      
      $i = 0;

      if ($whereArray) {

        foreach($whereArray as $where) {

          $i++;
          $query->bindParam($i,$where['value']);

        }

      }
        
      $this->doExecute($query);

      return $this->getResultArray($query);

    }

  }

?>
