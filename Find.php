//author- Tushar Dohroo
//purpose - this file is used to find the records from the database  based on the roll number entered by the user. 




<?php
	
try
 {
    $conn = new PDO("sqlsrv:server = tcp:dohroo98.database.windows.net,1433; Database = userdata", "dohroo98", "Never.give/up");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$roll=$_POST["rollno"];
$sql="Select * from Userdata where rollno=$roll";



try
 {
   $rows=$conn->query($sql);
 } 
catch(PDOException $r)
 { 
	print("$r");
 }



foreach ($rows as  $row)
{
   if ($row!=NUll)
   {
	$Name = $row['FirstName'];
	$GPA  = $row['GPA'];
	$M= $row['Major'];
   }
   else
	{
	print("NO RECORD FOUND !!");	
	}
}
print("Name :- '$Name' <br> GPA :- '$GPA' <BR> Major Project :- '$M'");

$conn.close();
?>