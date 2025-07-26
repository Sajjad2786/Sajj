<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>لوازم جانبی خودرو</title>
<link href="cssupdate.css"  rel="stylesheet" type="text/css">
</head>

<body dir="rtl">
	
	<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    
<title>لوازم جانبی خودرو</title>
    
</head>
<body>
    <header>
        <img src="VE-169.jpg" width="110" height="80" alt="" style="margin-right: 28px"/>
<h1 style="margin-right: 122px">لوازم جانبی خودرو</h1>
        <div class="header-buttons">
            <button>سبد خرید</button>
            <button onclick="window.location.href='addm.php'">ویرایش</button>
            <button onclick="window.location.href='login.php'">ورود</button>
            <button onclick="window.location.href='sabtnam1.php'">ثبت‌ نام</button>
        </div>
    </header>
    <nav>
        <a href="SajjadEtehadi.php">صفحه اصلی</a>
        <a href="update.php">ویرایش اطلاعات</a>
        <a href="#contact">تماس با ما</a>
    </nav>
    <style>
    .register-container {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
        }

.register-container h2 {
    margin-bottom: 20px;
        }

.register-container input {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
        }

.register-container button {
    background-color: #ff0000;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    width: 100%;
    border-radius: 4px;
    font-weight: bold;
        }

        .register-container button:hover{
            background-color: aqua;
        }

.register-container a {
    display: block;
    margin-top: 10px;
    color: #ff0000;
    text-decoration: none;
        }
    </style>
    <main style="padding: 20px; display: flex; justify-content: center;">
        
        
    <div class="register-container">
        <h2>تغییر اطلاعات</h2>
        <form class="form" name="myform" id="myform" method="POST" action="saveup.php">
            <input type="text" placeholder="نام و نام خانوادگی" id="realname" name="realname" required>
            <input type="text" placeholder="نام کاربری" id="username" name="username" required>
            <input type="email" placeholder="ایمیل" id="email" name="email" required>
            <input type="password" placeholder="رمز عبور" id="password" name="password"  required>
            <input type="password" placeholder="تأیید رمز عبور" name="repassword"  required>
            <button type="submit" href="login.php"> ذخیره</button>
        </form>
        <a href="SajjadEtehadi.php">انصراف! رفتن به صفحه اصلی</a>
    </div>


    </main>
    <footer>
        <div class="footer-logo">
            <img src="VE-169.jpg" width="110" height="80" alt="" style="margin-right: 28px"/>
        </div>
        <div class="footer-links">
            <a href="#about">درباره ما</a>
            <a href="#faq">سوالات متداول</a>
            <a href="#privacy">حریم خصوصی</a>
            <a href="#terms">شرایط استفاده</a>
        </div>
        <div class="footer-social">
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">x</a>
        </div>
        <div class="footer-newsletter">
            <p>برای دریافت اخبار و پیشنهادات ویژه، عضو خبرنامه ما شوید:</p>
            <form>
                <input type="email" placeholder="ایمیل شما">
                <button type="submit">اشتراک</button>
            </form>
        </div>
        <div class="footer-contact">
            <p>آدرس: خیابان جی مدرسه شهید چمران، پلاک 123، شهر اصفهان</p>
            <p>تلفن: 0123456789</p>
        </div>
        <p>&copy; 2025 لوازم جانبی خودرو</p>
    </footer>
</body>
</html>
</body>

</html>
