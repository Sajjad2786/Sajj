<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body dir="rtl" style="background-color:rgb(139, 139, 139);">

<?php
session_start(); // برای استفاده از $_SESSION

$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");

if (mysqli_connect_errno()) {
    exit('Error: ' . mysqli_connect_error());
}

// بررسی ارسال داده‌ها
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['meli'])) {
    $username = $_POST['username'];
    $meli = $_POST['meli'];
    $password = $_POST['password'];

    // جلوگیری از SQL Injection (بهتر است از prepared statement استفاده شود)
    $username = mysqli_real_escape_string($link, $username);
    $meli = mysqli_real_escape_string($link, $meli);
    $password = mysqli_real_escape_string($link, $password);

    $query = "SELECT * FROM users WHERE meli = '$meli' AND password = '$password'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Error: " . mysqli_error($link));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        
        $_SESSION['realname'] = $row['username'];
        $_SESSION['username'] = $row['username'];

        if ($row['type'] == 0) {
            $_SESSION['state_login'] = false;
            $_SESSION['user_type'] = "public";
        } else if ($row['type'] == 1) {
            $_SESSION['state_login'] = true;
            $_SESSION['user_type'] = "admin";
        }

        // نمایش پیام خوش‌آمدگویی و اطلاعات کاربر
        echo "
        <div id='name'>
            خوش آمدید {$row['username']} 
        </div>
        <div id='karbar'>
            <span> نوع کاربر: {$_SESSION['user_type']}</span>
        </div>
        <div class='left-head'>
            <div class='profile'>
            </div>
        </div>
        <a href='SajjadEtehadi.php' style='color: yellow; background-color: red; text-decoration: none;'>ورود به صفحه اصلی فروشگاه</a>
        ";

    } else {
        echo "
        <div class='box2'>
            <span class='error'>متاسفانه نام کاربری یا رمز عبور اشتباه است.</span>
        </div>
        ";
    }
    ?>
        <script type="text/javascript">
            <!--
                location.replace("SajjadEtehadi.php");
            --!>
        </script>
        <script type="text/javascript">
            <!--
                location.replace("SajjadEtehadi.php");
            --!>
        </script>
        <?php

} else {
    // در صورتی که داده‌ها ارسال نشده باشند
    echo "
    <div class='box2'>
        <span class='error'>لطفاً نام کاربری، کد ملی و رمز عبور خود را وارد کنید.</span>
    </div>
    ";
}
?>
</body>
</html>
