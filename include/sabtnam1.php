<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sabtnam1</title>
<link href="sabtnam.css" rel="stylesheet" type="text/css">
</head>

<body dir="rtl">
	<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت‌نام</title>
    
</head>

    <div class="register-container">
        <h2>ثبت‌نام</h2>
        <form class="form" name="myform" id="myform" method="POST" action="index1.php">
            <input type="text" placeholder="نام و نام خانوادگی" id="realname" name="realname" required>
            <input type="text" placeholder="نام کاربری" id="username" name="username" required>
            <input type="text" placeholder="کد ملی" id="meli" name="meli"  required>
            <input type="email" placeholder="ایمیل" id="email" name="email" required>
            <input type="password" placeholder="رمز عبور" id="password" name="password"  required>
            <input type="password" placeholder="تأیید رمز عبور" name="repassword"  required>
            <button type="submit" href="login.php">ثبت نام</button>
        </form>
        <a href="login.php">قبلاً ثبت‌نام کرده‌اید؟ ورود</a>
    </div>
</body>

</html>
