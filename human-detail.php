<?php include 'connect.php';
$cast = mysqli_query($conn, "SELECT * FROM human");

?>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


<div class="container">
  <h1>Quản lí sản phẩm</h1>
  <div class="col-md-6"><a href="product-create.php"><button class="btn btn-success">thêm mới</button></a></div>
  <div class="col-md-6"><a href="category.php"><button type="button" class="btn btn-danger">Trang Danh mục</button></a></div>
  <div class="box-body">
    <table class="table table-bordered table-hover">
    
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Gender</th>
          <th>Birthday</th>
          <th>Avata</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cast as $cate) : ?>
          <tr>
            <td><?php echo $cate['Id']; ?></td>
            <td><?php echo $cate['Name']; ?></td>
            <td><img width="60" src="uploads/<?php echo $cate['Image']; ?>" alt=""></td>
            <td><?php echo $cate['Price']; ?></td>
            <td>
              <a href="product-edit.php?id=<?php echo $cate['Id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit">Sửa</i></a>
              <a onclick="return confirm('Bạn có chắc muốn xoá sản phẩm khôg ?')"  href="product-delete.php?id=<?php echo $cate['Id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash">Xoá</i></a>
              <a href="cart.php?id=<?php echo $cate['Id']; ?>" class="btn btn-sm btn-danger" ><i class="fa fa-trash">Mua Ngay</i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
