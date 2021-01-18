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

    // $username = $_POST['username'];
    // $password = $_POST['password'];
    $username='ahmed@fcis.com';
    $password = '123456789';
// Check connection
$query = "SELECT * FROM admin";
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else{
   $response= $conn->query($query);
    if ( $response == TRUE) {
        // echo "New record created successfully";
        foreach($response as $row){
            // echo $row['password']. " ".$row['username'];
            if($username == $row['username'] ){
                if($password == $row['password'] ){
                    $message=[
                        'status' =>"successfullu",
                        'data' => 'wellcom '.$row['name']
                    ];
                    $_SESSION['login']=true;
                    $_SESSION['data']=$message;
                    // die($message['data']);
                    // Redirect('/fcis-2024-master/courses.html');
                }else{
                    echo "\n your password is not right ";
                }
            }else{
                echo "\n your username is not right ";
            }
            

                }
      } else {
        echo "Error: " . $query . "<br>" . $conn->error;
            }
    }

    
}






// $conn =db_connection();
// login($conn);






function Redirect($url)
{
   header( 'Location: ' . $url);

    exit();
}



// if(isset($_SESSION['data'])){

//     foreach($_SESSION['data'] as $key){
//         echo $key;
//     }

// }else{
//     echo "no thing is post";
// }

?>