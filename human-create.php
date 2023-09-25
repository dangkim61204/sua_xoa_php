<?php
include 'connect.php';

//lấy tất cả category
$cats = $conn->query("SELECT * FROM province Order By id DESC");

//connect database lỗi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//lưu ảnh trên local
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
    $sql = "INSERT INTO human (name, email, phone, gender, birthday, description, avata, province_id) VALUES
     ('$name','$email', '$phone','$gender','$birthday','$description', '$image_name', '$province_id')";
    
    if ($conn->query($sql)) {
        header('Location: human.php', true);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
//nếu đúng thì chuyển hướng

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


<div class="container">
    <h1>Human Create</h1>
    <form action="" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="" placeholder="Name...">
        </div>
        <div class="form-group">
            <label for="">Avata</label>
            <input type="file" class="form-control" name="avata" value="" >
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="" placeholder="Email...">
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" name="phone" value="" placeholder="Phone...">
        </div>
        <div class="form-group">
            <label for="">Birthday</label>
            <input type="date" class="form-control" name="birthday" value="" placeholder="Birthday...">
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <label for="">Nam</label>
            <input type="radio" id="nam" name="gender" value="0">
            <label for="">Nữ</label>
            <input type="radio" id="nữ" name="gender" value="1" >
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" value="" placeholder="Description...">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">province_id</label>
            <select class="form-control" id="exampleFormControlSelect1" name="province_id">
                <option value=""></option>

                <!-- in category value lấy id, tên hiển thị ra lấy name -->
                <?php while ($cat = $cats->fetch_assoc()) : ?>
                    <option value="<?php echo $cat["id"] ?>"><?php echo $cat['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>