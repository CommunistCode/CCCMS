<?php

  require_once(FULL_PATH."/global/classes/pdoConn.class.php");

  class pageTools {

    private $pdoConn = null;

    function __construct() {

      $this->pdoConn = new pdoConn();

    }

    public function getDynamicContent($page=NULL) {

      if (isset($_GET['page'])) {

        if ($this->checkPageExists($_GET['page']) == 0) {

          $page = $_GET['page'];

        }

      } 

      if (!isset($page)) {

        $page = $this->getStartingPage();

      }

      define('PAGE_ID',$page);

      $field = array("title","text","linkName","specialInclude");
      $table = "dContent";

      $where[0]['column'] = "dContentID";
      $where[0]['operator'] = "=";
      $where[0]['value'] = PAGE_ID;

      $result = $this->pdoConn->select($field,$table,$where);
    
      return $result[0];
     

    }
    
    public function checkPageExists($page) {

      $field = "dContentID";
      $table = "dContent";
      
      $where[0]['column'] = "dContentID";
      $where[0]['operator'] = "=";
      $where[0]['value'] = $page;

      $result = $this->pdoConn->select($field,$table,$where);
  
      if ($result == NULL) {

        return FAILURE;

      }

      return SUCCESS;

    }

    public function getPageIDbyDirectLink($link) {

      $field = "dContentID";
      $table = "dContent";

      $where[0]['column'] = "directLink";
      $where[0]['operator'] = "=";
      $where[0]['value'] = $link;
      
      $result = $this->pdoConn->select($field,$table,$where);
      
      return $result[0]['dContentID'];

    }
  
    public function getTheme($module) {

      $field = "theme";

      $table = "version";

      $where[0]['column'] = "module";
      $where[0]['operator'] = "=";
      $where[0]['value'] = $module;

      $result = $this->pdoConn->select($field, $table, $where);
    
      return $result[0]['theme'];
    
    }

    public function render($template, $params, $prefix="") {
      
      ob_start();
   
      extract($params,EXTR_PREFIX_ALL,$prefix); 
      
      include($template);
        
      $return = ob_get_contents();
  
      ob_end_clean();
  
      return $return;
    
    }

  
    public function getStartingPage() {

      $result = $this->getPageLinks();
      
      if (!$result)
      {
				die("You have yet to add a page");
			}
      
      $linkOrder = 0;

      do {

        $tempResult = array_shift($result);
        $linkOrder = $tempResult['linkOrder']; 
  
      }  while ($linkOrder != 1 && $tempResult != NULL);
      
      if ($linkOrder != 1)
      {
				die("Pages added, but not yet made visible");
			}
      
      return $tempResult['dContentID'];

    }
  
    public function getStaticContent($id) {
  
      $field = "value";
      $table = "sContent";

      $where[0]['column'] = "sContentID";
      $where[0]['operator'] = "=";
      $where[0]['value'] = $id;
      
      $result = $this->pdoConn->select($field,$table,$where);
    
      return $result[0]['value'];
    
    }
    
    public function getAllStaticContent() {
  
      $fields = "*";
      $table = "sContent";

      $result = $this->pdoConn->select($fields,$table);
    
      return $result;
    
    }
  
    public function getPageLinks() {
    
      $fields = array("dContentID","linkName","directLink","linkOrder");

      $table = "dContent";

      $orderBy = "linkOrder";

      $result = $this->pdoConn->select($fields,$table,NULL,$orderBy);
      
      return $result;
    
    }
  
    public function matchTags($text) {
    
      $patterns = array();
      $replacements = array();
    
      $patterns[1] = "/\[b\](.*?)\[\/b\]/is";  //Bold
      $patterns[2] = "/\[i\](.*?)\[\/i\]/is"; //Italics
      $patterns[3] = "/\[url\=(.*?)\](.*?)\[\/url\]/is"; //Link
      $patterns[4] = "/\[img_left size\=(.*?)\](.*?)\[\/img\]/is"; //ImgLeft
      $patterns[5] = "/\[img_right size\=(.*?)\](.*?)\[\/img\]/is"; //ImgRight
      $patterns[6] = "/\[img_center size\=(.*?)\](.*?)\[\/img\]/is"; //ImgCentre
      $patterns[7] = "/\[colour\=(.*?)\](.*?)\[\/colour\]/is"; //Link
      $patterns[8] = "/\[header\](.*?)\[\/header\]/is"; //Heading 
      $patterns[9] = "/\[big_header\](.*?)\[\/big_header\]/is"; //Big heading
      $patterns[10] = "/\[small_header\](.*?)\[\/small_header\]/is";  //Small heading
      $patterns[11] = "/\[code\](.*?)\[\/code\]/is";  //Code block
      $patterns[12] = "/\[u\](.*?)\[\/u\]/is"; //Underline
    
      $replacements[1] = "<strong>$1</strong>";
      $replacements[2] = "<em>$1</em>";
      $replacements[3] = "<a href=\"$1\">$2</a>";
      $replacements[4] = "<img class='imageLeft' style='width:$1px;' src='uploadedImages/$2' />";
      $replacements[5] = "<img class='imageRight' style='width:$1px;' src='uploadedImages/$2' />";
      $replacements[6] = "<img class='imageCentre' style='width:$1px;' src='uploadedImages/$2' />";
      $replacements[7] = "<span style=\"color:$1;\">$2</span>";
      $replacements[8] = "<h2>$1</h2>";
      $replacements[9] = "<h1>$1</h1>";
      $replacements[10] = "<h3>$1</h3>";
      $replacements[11] = "<div class='code'>$1</div>";
      $replacements[12] = "<u>$1</u>";

  
      $result=nl2br(preg_replace($patterns,$replacements,$text));

      return $result;

    }

  }

?>
