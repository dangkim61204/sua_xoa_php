<?php

include 'connect.php';
session_start();
//lấy tất cả các product
$cast = mysqli_query($conn, "SELECT * FROM human ");

; ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


<div class="container">
  <h1>Quản lí sản phẩm</h1>
  <div class="col-md-6"><a href="human-create.php"><button class="btn btn-success">thêm mới</button></a></div>
  <div class="box-body">
    <table class="table table-bordered table-hover">
    
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cast as $cate) : ?>
          <tr>
            <td><?php echo $cate['id']; ?></td>
            <td><?php echo $cate['name']; ?></td>
            <td><img width="80" src="uploads/<?php echo $cate['avata']; ?>" alt=""></td>
            <td>
              <a href="human-edit.php?id=<?php echo $cate['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit">Sửa</i></a>
              <a onclick="return confirm('Bạn có chắc muốn xoá sản phẩm khôg ?')"  href="human-delete.php?id=<?php echo $cate['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash">Xoá</i></a>
              <a href="human-detail.php?id=<?php echo $cate['id']; ?>" class="btn btn-sm btn-danger" ><i class="fa fa-trash">Xem chi tiết</i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>