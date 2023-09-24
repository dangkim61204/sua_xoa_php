<?php
 include 'connect.php';

 //lấy dữ liệu id cần xoá
     $id = $_GET['id'];

 //câu lệnh sql
 //xoa human khi có province

 $humanByCategoryId = "SELECT * FROM human where province_id = $id";
 $result = $conn->query($humanByCategoryId);
 
 // $row = mysqli_fetch_assoc($pro);
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       $Idhuman = $row['id'];
       $xoa_Idhuman = "DELETE FROM human where id = $Idhuman";
       $conn->query( $xoa_Idhuman);
     }
   } 

  $xoa_sql = "DELETE FROM human where id = $id";
 
  if ($conn->query($xoa_sql) === TRUE) {
     echo "xoa thanh cong";
     header('location: human.php' , true);
     exit();
 } else {
   echo "Error: " . $xoa_sql . "<br>" . $conn ->error;
 }

 $conn->close();
 ?>
