<?php
  function  db_connection(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fcis-2024";
static $conn;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    return $conn;
 
}


function login($conn){

// Check connection
$query = "SELECT * FROM admin";
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else{
   $response= $conn->query($query);
    if ( $response == TRUE) {
        // echo "New record created successfully";
        foreach($response as $row){
            echo $row['name']. " ".$row['username'];
            
            

                }
      } else {
        echo "Error: " . $query . "<br>" . $conn->error;
            }
    }

    
}






$conn =db_connection();
login($conn)

?>