<?php include 'connect.php';
$id = $_GET['id'];
$cast = mysqli_query($conn, "SELECT * FROM human");
$provinces = mysqli_query($conn, "SELECT * FROM province");
$edit_sql = "SELECT * FROM province where id = $id";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $types = ['image/png', 'image/jpeg', 'image/gif'];
    $image_name = '';
    
    if (!empty($_FILES['avata']['name'])) {
        $tmp_name = $_FILES['avata']['tmp_name'];
        $type = $_FILES['avata']['type'];
        if (!in_array($type, $types)) {
            $errors['image'] = 'Định dạng ảnh hoepj lệ phải là jpg, png, gif';
        } else {
            $image_name = time() . '-' . $_FILES['avata']['name'];
            move_uploaded_file($tmp_name, 'uploads/' . $image_name);
        }
    }
    //them moi
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $gender = $_REQUEST['gender'];
    $birthday = $_REQUEST['birthday'];
    $description = $_REQUEST['description']; 
    $province_id = $_REQUEST['province_id'];
   
    $sql = "UPDATE human SET name = '$name', email = '$email', phone = '$phone', gender = '$gender', birthday = '$birthday', description = '$description', avata = '$avata',province_id = '$province_id'  where id = $id";
    if($conn->query($sql) === true) {
        header('loacation: human.php');
        exit();
    }else {
        echo "error: " .$sql . "<br>" . $conn->error;
    }
}
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


<div class="container">
    <h1>Human Update</h1>
    <form action="" method="POST" role="form" enctype="multipart/form-data">
    <?php foreach ($cast as $cate) : ?>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $cate['name']; ?>" >
        </div>
        <div class="form-group">
            <label for="">Avata</label>
            <input type="file" class="form-control" name="avata" value="<?php echo $cate['avata']; ?>" >
            <img width="80" src="uploads/<?php echo $cate['avata']; ?>" alt="">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $cate['email']; ?>" >
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $cate['phone']; ?>" >
        </div>
        <div class="form-group">
            <label for="">Birthday</label>
            <input type="date" class="form-control" name="birthday" value="<?php echo $cate['birthday']; ?>" >
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <label for="">Nam</label>
            <input type="radio"  name="gender" value="nam" <?php echo $cate['gender'] == '0' ? 'checked' : ''; ?> >
            <label for="">Nu</label>
            <input type="radio" name="gender" value="nu" <?php echo $cate['gender'] == '1' ? 'checked' : '';?> >
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" value="<?php echo $cate['description']; ?>" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">province_id</label>
            <select class="form-control" id="exampleFormControlSelect1" name="province_id"  >
                <option value=""></option>

                <!-- in category value lấy id, tên hiển thị ra lấy name -->
                <?php while ($province = $provinces->fetch_assoc()) : ?>
                    <option value="<?php echo $province["id"] ?>" <?php echo $province["id"] == $cate['province_id'] ? 'selected' : '';?>><?php echo $province['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Update  </button>
    </form>
</div>