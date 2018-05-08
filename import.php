<html>
  <head> 
  <title>Save Excel file details to the database</title>
  </head>
  <body>
   <a href="index.php">Go Back</a>
   
   <form method="post" action="" enctype="multipart/form-data"> 
   <table width="500" border="0" align="center">
  <tr>
    <td>Please Select File  -</td>
    <td><input type="file" name="upfile" />&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> <input type="submit" value="Click for upload" />&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
</table>

  
  
    
   
   
  </form>
  
	<?php

if(isset($_FILES['upfile']))
{
	
$file = $_FILES['upfile'];

$check_file_extension = end(explode('.',$file['name']));
if($check_file_extension != 'xls')
{
  echo '<h3 align="center"><br />Please upload only(.xls) valid file   !</h3>'; 
  return; 
}


	//	$db= new mysqli('localhost','root','ferry','test');
		include 'db.php';
    	include 'Classes/PHPExcel.php';
		

		
$xls_file_name = 'test.xls';
		
$objPHPExcel = PHPExcel_IOFactory::load($xls_file_name);

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

echo "<pre>";
$str = '';
$i=1;
$import_id = time();
$import_date = date('Y-m-d H:i:s');
foreach($sheetData as $key=>$row)
 {
$roll_no = $row['B'];	 	 
if($i != 1 and $roll_no !='' )
{
	 
	
	$sqls = "select serial_no from users_details where `roll_no` =  $row[B] and `subject` = '$row[F]'";
	$roll_state = mysql_query($sqls);
    $roll_state = mysql_num_rows($roll_state);
	$dob = date('Y-m-d',strtotime($row['E']));	 
    $sql = "INSERT INTO `users_details` (
	                                              `import_id`,
												  `serial_no`,
												  `roll_no`,
												  `name_of_students`,
												  `father_name`,
												  `date_of_birth`,
												  `subject`,
												  `max_mark`,
												  `min_mark`,
												  `practical`,
												  `total_obi`,
												  `results`,
												  `div`,
												  `school_name`,
												  `class_type`,
												  `class`,
												  `school_code`,
												  `import_date`
												) 
												VALUES
												  ( '$import_id',
													'$row[A]',
													'$row[B]',
													'$row[C]',
													'$row[D]',
													 '$dob',
													'$row[F]',
													'$row[G]',
													'$row[H]',
													'$row[I]',
													'$row[J]',
													'$row[K]',
													'$row[L]',
													'$row[M]',
													'$row[N]',
													'$row[O]',
													'$row[P]',
													'$import_date'
		
												  )";
												
	 

if(empty($roll_state))
	  {
		$res = mysql_query($sql); 
	  }
  
  }
  
		$i++;										


   
}

?>
		
      <?php 
	      $sql = mysql_query("select * from users_details where import_id = '$import_id'");
	 
	  ?> 

<h3 align="center">File upload success !</h3> 
 

<table  border="1" align="center">

  <tr>
    <th>IMPORT ID</th>
    <th>SERIAL NO.</th>
    <th>ROLL NO.</th>
    <th>NAME OF STUDENTS</th>
    <th>FATHER NAME</th>
    <th>DATE OF BIRTH</th>
    <th>SUBJECT</th>
    <th>MAX. MARK</th>
    <th>MIN. MARK</th>
    <th>PRACTICAL</th>
    <th>TOTAL OBI</th>
    <th>RESULTS</th>
    <th>DIV.</th>
    <th>SCHOOL NAME</th>
    <th>REGULAR/PRIVATE</th>
    <th>CLASS</th>
    <th>SCHOOL CODE</th>
    <th>IMPORT DATE</th>  
  </tr>
  <?php if((mysql_num_rows($sql))){ while($row=mysql_fetch_assoc($sql)) {
	
	die;  
	  ?>
  <tr>
    <td><?= $row['import_id'] ?></td>
    <td><?= $row['serial_no'] ?></td>
    <td><?= $row['roll_no'] ?></td>
    <td><?= $row['name_of_students'] ?></td>
    <td><?= $row['father_name'] ?></td>
    <td><?= $row['date_of_birth'] ?></td>
    <td><?= $row['subject'] ?></td>
    <td><?= $row['max_mark'] ?></td>
    <td><?= $row['min_mark'] ?></td>
    <td><?= $row['practical'] ?></td>
    <td><?= $row['total_obi'] ?></td>
    <td><?= $row['results'] ?></td>
    <td><?= $row['div'] ?></td>
    <td><?= $row['school_name'] ?></td>
    <td><?= $row['class_type'] ?></td>
    <td><?= $row['class'] ?></td>
    <td><?= $row['school_code'] ?></td>
    <td><?= $row['import_date'] ?></td>
  </tr>
  
  <?php }}else{ ?>
   <tr>
   <td colspan="18"><h3 align="center"><br />Result Not Found !</h3></td>
   </tr>
  
  <?php } ?>
</table>
<?php }
else
{
echo '<h3 align="center"><br />Please upload only(.xls) valid file   !</h3>';
}
?>

  </body>
</html>