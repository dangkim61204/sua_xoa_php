<?php
$id = $_GET['id'];
require_once ' connect.php';
$edit_sql = "SELECT * FROM province where id = $id";

$result = mysqli_query($conn, $$edit_sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
   
    $sql = "UPDATE province SET name = '$name' where id = $id";
    if($conn->query($sql) === true) {
        header('loacation: province.php');
        exit();
    }else {
        echo "error: " .$sql . "<br>" . $conn->error;
    }
}
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


<div class="container">
    <h1>province Edit</h1>
    <div class="box-body">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" value="<?php echo $row['Name']; ?>" name="name" id="name" placeholder="Input field">
                <input type="hidden" class="form-control" value="<?php echo $row['Id']; ?>" name="id" id="id" placeholder="Input field">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

</div>