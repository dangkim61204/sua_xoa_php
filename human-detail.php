<?php include 'connect.php';
$id = $_GET['id'];
$cast = mysqli_query($conn, "SELECT * FROM human where id = $id");

?>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


<div class="container">
  <div class="box-body">
    <table class="table table-bordered table-hover">
    
      <thead>
        
        <a href="human.php"><button type="button" class="btn btn-success">Quay lại trang Human</button></a>
        
        <tr>
          <!-- <th>Id</th> -->
          <th>Name</th>
          <th>Avata</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Gender</th>
          <th>Birthday</th>
          <th>Description</th>
         
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cast as $cate) : ?>
          <tr>
            <!-- <td><?php echo $cate['Id']; ?></td> -->
            <td><?php echo $cate['name']; ?></td>
            <td><img width="60" src="uploads/<?php echo $cate['avata']; ?>" alt=""></td>
            <td><?php echo $cate['email']; ?></td>
            <td><?php echo $cate['phone']; ?></td>
            <td><?php echo $cate['gender']; ?></td>
            <td><?php echo $cate['birthday']; ?></td>
            <td><?php echo $cate['description']; ?></td>
            <!-- <td>
              <a href="product-edit.php?id=<?php echo $cate['Id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit">Sửa</i></a>
              <a onclick="return confirm('Bạn có chắc muốn xoá sản phẩm khôg ?')"  href="product-delete.php?id=<?php echo $cate['Id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash">Xoá</i></a>
              <a href="cart.php?id=<?php echo $cate['Id']; ?>" class="btn btn-sm btn-danger" ><i class="fa fa-trash">Mua Ngay</i></a>
            </td> -->
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
