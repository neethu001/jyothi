<?php  
//export.php  

$connect = mysqli_connect("localhost", "root", "", "tutorial");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM users";
 $result = mysqli_query($connect, $query);

 if(mysqli_num_rows($result) > 0)
 {

  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>First Name:</th>  
                         <th>Department</th>  
                         <th>Semester</th>  
       <th>Date of Birth</th>
       <th>University Number</th>
	    <th>Phone number</th>
		 <th>Address</th>
		  <th>Email address</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["fname"].'</td>  
                         
						
						 <td>'.$row["dept"].'</td>
						 <td>'.$row["sem"].'</td>
						 <td>'.$row["dob"].'</td>
						 <td>'.$row["uninumber"].'</td>
						 <td>'.$row["phnum"].'</td>  
                         <td>'.$row["address"].'</td>  
       <td>'.$row["email"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>