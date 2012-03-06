<html>
	
  <head>
	
    <title>Admin Area - Home</title>
		
    <link href="<?php echo(DIRECTORY_PATH); ?>/admin/themes/default/stylesheets/stylesheet.css" rel="stylesheet" type="text/css" />
	
  </head>
	
  <body>
	
    <div id="mainContainer">
		
      <div id="title">
			
        <?php 
					require_once(FULL_PATH."/admin/includes/title.inc.php"); 
				?>
			
      </div>
			
      <div id="body">
			
        <h1><?php echo($_heading); ?></h1>
			
        <?php
          
          if (isset($_content)) {

            echo($_content);

          }

          if (isset($_include)) {

            include($_include);

          }

        ?>
				
      </div>
			
      <div id="links">

        <div id='mainLink'>
          <a class='mainLink' href='../index.php'>Homepage</a>
        </div>
        <div id='mainLink'>
          <a class='mainLink' href='login.php'>Login</a>
        </div>			

			</div>
			
      <div id="footer">
			
        <?php require_once(FULL_PATH."/admin/includes/footer.inc.php"); ?>
			
      </div>
		
    </div>
	
  </body>

</html>
