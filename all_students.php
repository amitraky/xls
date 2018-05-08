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
    <td align="right">Enter Roll Number. :</td>
    <td>&nbsp;<input type="text" name="rollnumber"  required/></td>
    
  </tr>
  <tr>
  
   <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>  
    <td colspan="2" align="center"> <input type="submit" value="Click For Seache" /></td>
   
  </tr>
<tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

   
  </form>
  
	<?php

if(isset($_POST['rollnumber']))
{
	    $roll_number = $_POST['rollnumber'];
		include 'db.php';
        $sql = mysql_query("select * from users_details where roll_no = '$roll_number' group by roll_no");
		
?>

<h3 align="center">Search Result </h3> 
 

<table   align="center" border="1" style="border-spacing: 0;">

  <tr style="    background: #899233;">
    <th>SERIAL NO.</th>
    <th>ROLL NO.</th>
    <th>NAME OF STUDENTS</th>
    <th>FATHER NAME</th>
    <th>DATE OF BIRTH</th>
    <th>RESULTS</th>
    <th>DIV.</th>
    <th>SCHOOL NAME</th>
    <th>REGULAR/PRIVATE</th>
    <th>CLASS</th>
    <th>SCHOOL CODE</th>
     <th>Action</th>
  </tr>
  <?php
$num_rows = mysql_num_rows($sql);

 if((!empty($num_rows))){ while($row=mysql_fetch_assoc($sql)) {
	 
	  
	  ?>
  <tr>
    <td><?= $row['serial_no'] ?></td>
    <td><?= $row['roll_no'] ?></td>
    <td><?= $row['name_of_students'] ?></td>
    <td><?= $row['father_name'] ?></td>
    <td><?= $row['date_of_birth'] ?></td>
    <td><?= $row['results'] ?></td>
    <td><?= $row['div'] ?></td>
    <td><?= $row['school_name'] ?></td>
    <td><?= $row['class_type'] ?></td>
    <td><?= $row['class'] ?></td>
    <td><?= $row['school_code'] ?></td>
    <td><a href="update.php?roll=<?= $row['roll_no'] ?>">Edit</a></td>
  </tr>
  
  <?php }}else{ ?>
   <tr>
   <td colspan="18"><h3 align="center"><br />Student Is Not Found !</h3></td>
   </tr>
  
  <?php } ?>
</table>
<?php }
else
{
echo '<h3 align="center">Student Not Found   !</h3>';
}
?>

  </body>
</html>