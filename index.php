<html>
  <head> 
  <title>Save Excel file details to the database</title>
  <style>
  
#sdf {
	  margin-top:50px;
  border:1px solid;
  
  }
  
  td{
 
  border-spacing: 5px;
      font-size: 14px;
 }
 
 
table th{
 
      font-size: 14px;
	  border-spacing: 0;
 }
  
  </style>
  </head>
  <body>
  
  <a href="index.php">Go Back</a>
   <form method="post" action="">
  <table width="500" border="0" align="center" id="sdf">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Username :</td>
    <td>&nbsp;<input type="text" name="username"  required/></td>
    
  </tr>
   <tr>
    <td align="right">Password :</td>
    <td>&nbsp;<input type="password" name="password"  required/></td>
 
  </tr>
  
   <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>  
    <td colspan="2" align="center"> <input type="submit" value="Log in" /></td>
   
  </tr>
<tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

   
  </form>
  
	<?php

if(isset($_POST['username']))
{
   include 'db.php';
   $username = $_POST['username'];
   $password = $_POST['password'];	
   if($username !='' and $password !='' )
   {
	   if($username == 'admin' and $password == 'adminpass')
	   {
	     $_SESSION['admin'] = 'admin';
		 print_r($_SESSION);
	   }
   }
		
}
?>



  </body>
</html>