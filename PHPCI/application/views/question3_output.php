<!DOCTYPE html>
<html>

   <head>
      <title>Text Input Control</title>
   </head>
	
   <body>
      <form method="post" action="<?php echo base_url(); ?>question3/inser_data">
         First name: <input type = "text" name = "first_name" />
         <br>
         Last name: <input type = "text" name = "last_name" />
         <input type="submit" name="Calculate" value="submit">
      </form>
   </body>
	
</html>