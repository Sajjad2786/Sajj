<?php
// اتصال به دیتابیس
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");

if (mysqli_connect_errno()) {
    echo "خطا در اتصال به دیتابیس: " . mysqli_connect_error();
    exit();
}

// بررسی اینکه فرم ارسال شده است
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت داده‌های فرم و ایمن‌سازی ورودی‌ها
    $realname = mysqli_real_escape_string($link, $_POST['realname']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    $res = "SELECT * FROM users";
    $res2 = mysqli_query($link, $res);
    if ($m = mysqli_fetch_array($res2)) {
        $meli = $m['meli'];
    }
    

    // بررسی اینکه رمز عبور با تأیید رمز عبور تطابق دارد
    if ($password !== $repassword) {
        echo "رمز عبور و تأیید رمز عبور مطابقت ندارند.";
    } else {
        
        // دستور SELECT برای بررسی وجود کاربر
        $checkUserSql = "SELECT * FROM users WHERE meli = '$meli'";
        $checkUserResult = mysqli_query($link, $checkUserSql);

        if (mysqli_num_rows($checkUserResult) > 0) {
            // دستور UPDATE برای بروزرسانی اطلاعات در دیتابیس
            $sql = "UPDATE users SET realname = '$realname', username = '$username',email = '$email', password = '$password' WHERE meli = '$meli'";

            // اجرای دستور
            if (mysqli_query($link, $sql)) {
                echo "اطلاعات با موفقیت به روز رسانی شد!";
                 echo ("<a href='SajjadEtehadi.php' style='color: yellow; background-color: red; text-decoration: none;'>ورود به صفحه اصلی فروشگاه</a>
            ");
            } else {
                echo "خطا در به روز رسانی اطلاعات: " . mysqli_error($link);
                 echo ("<a href='update.php' style='color: yellow; background-color: red; text-decoration: none;'>بازگشت</a>
            ");
            }
        } else {
            echo "کاربری با این نام کاربری یافت نشد.";
             echo ("<a href='SajjadEtehadi.php' style='color: yellow; background-color: red; text-decoration: none;'>ورود به صفحه اصلی فروشگاه</a>
            ");
        }
    }
}

// بستن اتصال به دیتابیس
mysqli_close($link);
?>
