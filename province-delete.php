<?php 
//lấy dữ liệu id cần xoá
    $id = $_GET['id'];
//ket noi
    require_once 'connect.php';
//câu lệnh sql
//xoa human khi có category_id
$humanByCategoryId = "SELECT * FROM human where province_id = $id";
$result = $conn->query($humanByCategoryId);

// $row = mysqli_fetch_assoc($pro);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "name: " . $row["Name"]. "<br>";
      $Idhuman = $row['Id'];
      $xoa_Idhuman = "DELETE FROM human where id = $Idhuman";
      $conn->query( $xoa_Idhuman);
    }
  } else {
    echo "0 results";
  }

 $xoa_sql = "DELETE FROM province where id = $id";

 if ($conn->query($xoa_sql) === TRUE) {
    echo "xoa thanh cong";
    header('Location: province.php' , true);
    exit();
} else {
  echo "Error: " . $xoa_sql . "<br>" . $conn ->error;
}

$conn->close();
