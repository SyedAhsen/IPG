<?php
   $servername = "localhost";
   $username = "";
   $password = "";
   $dbname = "";
   
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   if($conn->connect_errno)
   {
      echo "Connection to the database failed!<BR>";
      echo "Reason: ", $conn->connect_error;
      exit();
   }
   $entityBody="test";
//    get body
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Request received</h2>";
    echo "<h2>raw data</h2>";
    $entityBody = file_get_contents('php://input');
    echo $entityBody;

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}



   $sql = "INSERT INTO Fiserv_notifications ".
   "(notification) "."VALUES ".
   "('$entityBody')";
   
   $qry = $conn->query($sql);
   if($qry == true)
   {
      echo "Data inserted successfully.";
      
      // block of code, to process further...
   }
   else
   {
      echo "Data has not been inserted!<BR>";
      echo "Reason: ", $conn->error;
   }
   $conn->close();

?>