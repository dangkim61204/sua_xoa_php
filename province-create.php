<?php
include 'connect.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
//thêm mơi

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_REQUEST['name']; 
    echo $name;
    $sql = "INSERT INTO province (name) VALUES ('$name')";
    echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: province.php' , true);
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn ->error;
      }
      
}
//   $conn->close();
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


<div class="container">
    <h1>province Create</h1>
    <div class="box-body">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" value="" name="name" id="name" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>