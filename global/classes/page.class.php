<?php

  class page {

    private $pageTools;

    private $title = "";
    private $contents = array();
    private $pageContents = array();

    function __construct($pageTools) {

      $this->pageTools = $pageTools;

    }

    public function set($name,$value) {

      $this->pageContents[$name] = $value;

    }

    public function addContent($content) {

      array_push($this->contents,$content);
      
    }

    public function addInclude($include, $variables=array()) {

      $renderedInclude = $this->pageTools->render($include, $variables);
      array_push($this->contents,$renderedInclude);

    }

    public function render($templateFile) {

      $pageContent = "";

      foreach ($this->contents as $piece) {
     
        $pageContent .= $piece;

      }
      
      $this->pageContents['content'] = $pageContent;
      $this->pageContents['pageTools'] = $this->pageTools;

      $template = FULL_PATH."/".MODULE."/themes/".THEME."/templates/".$templateFile;

      $renderResult = $this->pageTools->render($template,$this->pageContents);
    
      echo($renderResult);

    }

  }

?>
