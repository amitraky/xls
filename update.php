<html>
  <head> 
  <title>Update User</title>
    <style>
  
table {
	  margin-top:50px;
  border:1px solid;
  
  }
  
  td{
 
  border-spacing: 5px;
      font-size: 14px;
 }
 
 
table th{
 
      font-size: 12px;
	  border-spacing: 0;
 }
  
  </style>
  </head>
  <body>
  <a href="all_students.php">Go Back</a>
  
 <?php if(!isset($_GET['roll'])){?>
 
 
 
    <form method="GET" action="update.php">
  <table width="500" border="0" align="center" id="sdf">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Enter Roll Number. :</td>
    <td>&nbsp;<input type="text" name="roll"  required/></td>
    
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
 
 <?php  }?>
 
  
  
  
  
 <?Php 
 include('db.php');
 if(isset($_GET['roll']))
 {
 $sql = mysql_query("select * from users_details where `roll_no` = '".$_GET['roll']."'");
 ?> 
<h2 align="center"> Update User information !</h2>
<table  border="0" align="center" >

  <tr style="    background: #afaa7e;">
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
  </tr>
  <?php echo '<form method="post" action="">';
$num_rows = mysql_num_rows($sql);
?>
  <?php $i=0; if((!empty($num_rows))){ while($row=mysql_fetch_assoc($sql)) {$i++?>
  <tr>
  
    <input type="hidden" name="data[res_id][]" value="<?= $row['res_id'] ?>">
    <td><?= $row['serial_no'] ?></td>
    
    <td><?= $row['roll_no'] ?></td>
    <td><input type="text" name="data[name_of_students][]" value="<?= $row['name_of_students'] ?>" <?php if($i != 1)echo "readonly"?>></td>
    <td><input type="text" name="data[father_name][]" value="<?= $row['father_name'] ?>" <?php if($i != 1)echo "readonly"?>></td>
    <td><input type="text" name="data[date_of_birth][]" value="<?= $row['date_of_birth'] ?>" <?php if($i != 1)echo "readonly"?>></td>
    <td ><input type="text" name="data[subject][]" value="<?= $row['subject'] ?>" style="width: 150px;"></td>
    <td><input type="text" name="data[max_mark][]" value="<?= $row['max_mark'] ?>" style="width: 50px;"></td>
    <td><input type="text" name="data[min_mark][]" value="<?= $row['min_mark'] ?>" style="width: 50px;"></td>
    <td><input type="text" name="data[practical][]" value="<?= $row['practical'] ?>" style="width: 50px;"></td>
    <td><input type="text" name="data[total_obi][]" value="<?= $row['total_obi'] ?>" style="width: 50px;"></td>
    <td><input type="text" name="data[results][]" value="<?= $row['results'] ?>" style="width: 50px;" <?php if($i != 1)echo "readonly"?>></td>
    <td><input type="text" name="data[div][]" value="<?= $row['div'] ?>" style="width: 50px;" <?php if($i != 1)echo "readonly"?>></td>
    <td><textarea  name="data[school_name][]"  <?php if($i != 1)echo "readonly"?>><?= $row['school_name'] ?></textarea></td>
    <td><input type="text"  name="data[class_type][]" value="<?= $row['class_type'] ?>" style="width: 70px;" <?php if($i != 1)echo "readonly"?>></td>
    <td><input type="text" name="data[class][]" value="<?= $row['class'] ?>" style="width: 50px;" <?php if($i != 1)echo "readonly"?>></td>
    <td><input type="text" name="data[school_code][]" value="<?= $row['school_code'] ?>" style="width: 50px;" <?php if($i != 1)echo "readonly"?>></td>
  </tr>
  
  <?php }}else{ ?>
   <tr>
   <td colspan="18"><h3 align="center"><br />Student Not Found !</h3></td>
   </tr>
  
  <?php } ?>
</table>
<h2 align="center"><input type="submit" value="CLICK TO UPDATE"></h2>
<?php echo "</form>";

 }?>


<?php if( isset( $_POST['data'] ) ){
	
	  $data = $_POST['data'] ;
	  
	  $rows = $data['res_id'];
	  
	  foreach($rows as $key=>$row)
	  {
	      $value  = 
		  '`name_of_students` ="'.$data['name_of_students'][$key].'",'.		   
		  '`father_name` ="'       .    $data['father_name'][$key].'",'.
		  '`date_of_birth` ="'     .    $data['date_of_birth'][$key].'",'.
		  '`subject` ="'           .    $data['subject'][$key].'",'.
		  '`max_mark` ="'          .    $data['max_mark'][$key].'",'.
		  '`min_mark` ="'         .    $data['min_mark'][$key].'",'.
		  '`practical` ="'         .    $data['practical'][$key].'",'.
		  '`total_obi` ="'         .    $data['total_obi'][$key].'",'.
		  '`results` ="'           .    $data['results'][$key].'",'.
		  '`div` ="'               .    $data['div'][$key].'",'.
		  '`school_name` ="'       .    $data['school_name'][$key].'",'.
		  '`class_type` ="'        .    $data['class_type'][$key].'",'.
		  '`class` ="'             .    $data['class'][$key].'",'.
		  '`school_code` ="'       .    $data['school_code'][$key].'"';
		
		$sql = "UPDATE  users_details set $value where `res_id` = '$row';";		
	    $r = mysql_query($sql);
		
	  }
	  
	  if(!empty($r))
	  {
	    echo "<br><Br><h3 align='center' style='color:green'>Student Information update success";
	  }
	  
     
	  
	
	

 } ?>



  </body>
</html>