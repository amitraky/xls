<?Php 
$row = null;
$data = null;
 include('db.php');

 if(isset($_GET['q']))
 {

 $sql = mysql_query("select * from users_details where `roll_no` = '".$_GET['q']."' and class = '".$_GET['c']."' ");

 while($row=mysql_fetch_assoc($sql)) 
{
$data[] = $row; 
}

}
$total = null;

 if(!empty($data))
{
?> 

<style>
#result th{
border-bottom: 0px !important;
}
#result td{
border-bottom: 0px !important;
}

#marksheets tr
{
border-bottom:1px solid black !important;
}



@media print {

table{
   width: 100%;
    border: none;
    text
}

td{
padding: 10px 15px !important;;
  
    border-bottom: 1px solid #e5e5e5 !important;;
    text-align: left !important;;
}

#marksheets th {
    padding: 5px 15px !important;;
    border-bottom: 2px solid #e5e5e5 !important;
    color: #3f3f3f !important;;
    font-weight: 700;
    font-size: 0.923em;
    text-align: left;
}
#marksheets td {
    padding: 5px 15px !important;;
    border-bottom: 2px solid #e5e5e5 !important;
    color: #3f3f3f !important;;
    font-weight: 700;
    font-size: 0.923em;
    text-align: left;
}





}
</style>

	<table width="900"  style="border: 1px solid #8d8888;" id="result">

  <tr>
    <th width="150">Roll Number</th>
    <td ><?php echo $data[0]['roll_no'] ?></td>
    <th>Student</th>
    <td style=""><?php echo $data[0]['name_of_students'] ?></td>
    <th  width="200">Father Name</th>
    <td width="200"><?php echo $data[0]['father_name'] ?></td>
    <td width="1"></td>
<td width="1"></td>
  </tr>

  <tr>
    <th>Center</th>
    <td colspan="4" ><?php echo $data[0]['school_name'] ?></td>
    <th>Class</th>
    <td><?php echo $data[0]['class'] ?></td>
   
    
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>Year</th>
    <th><?php echo date('Y');?></th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <th colspan="8" align="center" style="text-align: center;    background: #faebd7;">Marksheet</th>
  </tr>
  
   <tr>
    <td colspan="8" >

<table  width="900" id="marksheets">
  <tr>
    <th>Subject</th>
    <th>Max Mark</th>
    <th>Obtained Mark&nbsp;</th>
  </tr>
<?php foreach($data as $key=>$row){ ?>
  <tr>
    <td><?php echo $row['subject'] ?></td>
    <td><?php echo $max = $row['max_mark'] ?></td>
    <td><?php echo $min = $row['min_mark'] ?>&nbsp;</td>
  </tr>
<?php $total = $total +$min; } ?>
 
  </table></td>
    </tr>
  <tr>
  
    <th width="200">Total Marks : <?php echo $total; ?></th>
    <th></th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <th width="300">Result : <?php echo $data[0]['results'] ?></th>
    <th></th>
    <th width="300" >Division  </th>
    <th><?php echo $data[0]['div'] ?></th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 <td>&nbsp;</td>
  </tr>
 
</table><br>
<div align="center"><button style="background-color: #ffffff;color: #c31c08; " onclick="window.location.reload()" > &#8635; Go Back</button> &nbsp;<button onclick=" window.print();">&#9988; Print Result</button></div>
<?php }else{  echo '<h3 align="center">Invalid Roll Number </h3>';}?>