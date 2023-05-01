<?php


  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'dbtest';
  $db_port = 3306;

  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  // echo 'Success: A proper connection to MySQL was made.';
  // echo '<br>';
  // echo 'Host information: '.$mysqli->host_info;
  // echo '<br>';
  // echo 'Protocol version: '.$mysqli->protocol_version;

  $sql = "SELECT * FROM data";
  $query = mysqli_query($mysqli, $sql);

  if(isset($_REQUEST["new_post"])){ 
 
    $title = $_REQUEST['title']; 
    $content = $_REQUEST['content'];
    $sql = "INSERT INTO data (title, content) VALUES ('$title', '$content')";
 
    if($mysqli->query($sql) === TRUE) { echo "New post created successfully."; }
    else { echo "Error: " . $sql . "<br>" . $mysqli->error; }
    
    header("Location: index.php?info=added");
    exit();

  }

  if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM data WHERE id = $id";
    $query = mysqli_query($mysqli, $sql);
  }

  if(isset($_REQUEST['update'])){
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title']; 
    $content = $_REQUEST['content'];
  

  $sql = "UPDATE DATA SET title = '$title', content= '$content WHERE id = $id";
  mysqli_query($mysqli, $sql);

  header("Location: index.php?info=updated");
  exit();

  }





  $mysqli->close();



// if(isset($_REQUEST["new_post"])){
//     $title = $_REQUEST['title'];
//     $content = $_REQUEST['content'];

//     // $sql = "INSERT INTO data (title, content) VALUES('$title', '$content')";
//     // mysqli_query($con, $sql);

//     $sql = "SELECT * FROM data (title, content) VALUES($title, $content)";
//     mysqli_query($con, $sql);

//     // $sql = "INSERT INTO data (title, content) VALUES ($title, $content)";
//     // $stmt = mysqli_prepare($con, $sql);
//     // mysqli_stmt_bind_param($stmt, "ss", $title, $content);
//     // mysqli_stmt_execute($stmt);
// }




