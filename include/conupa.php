<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body dir="rtl" style="background-color:rgb(139, 139, 139);">



    
<?php
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");

if (mysqli_connect_errno()) {
    exit('Error: ' . mysqli_connect_error());
}

// چک کردن اینکه آیا داده‌ها در $_POST ارسال شده‌اند
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $meli = $_POST['meli'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE meli = '$meli' AND password = '$password'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Error: " . mysqli_error($link));
    }

    // اگر کاربر پیدا شد
    if ($result) {
        $row = mysqli_fetch_array($result);
        
        

        // نمایش پیام خوشامدگویی متناسب با نوع کاربر
        echo "
        <div id='name'>
            برای تغییرات کلیک کنید{$row['username']} 
        </div>     
        ";
        echo ("<a href='update.php' style='color: yellow; background-color: red; text-decoration: none;'>ویرایش اطلاعات </a>
        ");
        

    } else {
        echo "
        <div class='box2'>
            <span class='error'>متاسفانه نام کاربری یا رمز عبور اشتباه است.</span>
        </div>
        ";
    }

} else {
    // در صورتی که داده‌ها ارسال نشده باشند
    echo "
    <div class='box2'>
        <span class='error'>لطفاً نام کاربری و رمز عبور خود را وارد کنید.</span>
    </div>
    ";
}
?>



    

    
</body>
</html>