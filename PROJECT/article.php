

<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<body>
<?php
include 'header.php';
?>
<form action="search.php" method="POST">
<input type="text" name="search" placeholder="Search">
<button type="submit" name="submit-search">Go</button><br><br>
<a href='Checkbox.php'>Về trang chủ</a>
</form>
<br><br><br><br><br>
<div class="article-container">
<?php
$id = mysqli_real_escape_string($conn, $_GET['id']);
$name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "SELECT * FROm danhsach where id='$id' and name='$name'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            echo "<div class='article-box'>
           
            <h1 align=middle>".$row['name']."</h1><br><br>
            <div class ='text-box'>
            <p><b>Ms môn học: </b>".$row['id']."</p>
            <p><b>Nội dung môn học: </b>"."<br>"
            .$row['content']."</p>
            <p><b>Môn tiên quyết: </b>".$row['previous']."</p>
            <p><b>Môn tiếp theo: </b>".$row['new']."</p>
            </div> 
            <div class ='image-box'>
            <img id='imgid' src=".$row['image'].">
            </div>
            </a>
        </div>";
        }
    }
?>

</div>
<div class="contact">
<p>Liên hệ: minhgown@gmail.com</p>
</div>

</body>
</html>