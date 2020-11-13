<?php
include 'header.php';
?>
<body>
<form action="search.php" method="POST">
<input type="text" name="search" placeholder="Search">
<button type="submit" name="submit-search">Go</button><br><br>
<a href='Checkbox.php'>Về trang chủ</a>
</form>
</body>
<h1 align = middle>Kết quả tìm kiếm</h1>

<div >
<?php
if (isset($_POST['submit-search'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROm danhsach WHERE id like '%$search%' or name like '%$search%'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    echo "Có ".$resultCheck." kết quả!"."<br><br>";
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            echo "<a href='article.php?id=".$row['id']."&name=".$row['name']."'><div class='article-box'>
            <p>".$row['name']."</p>
            <p>".$row['id']."</p>
        </div></a>";
            
        }
    } else {
        echo "Không có kết quả";
    }
}
?>
<div class="contact">
<p>Liên hệ: minhgown@gmail.com</p>
</div>

</div>

</body>
</html>