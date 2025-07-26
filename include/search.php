<?php
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");

if (mysqli_connect_errno()) {
    exit('Error: ' . mysqli_connect_error());
}




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>لوازم جانبی خودرو</title>
<link href="css.css" rel="stylesheet" type="text/css">
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
            <button>راهنما</button>
            <button onclick="window.location.href='login.php'">ورود</button>
            <button onclick="window.location.href='sabtnam1.php'">ثبت‌ نام</button>
        </div>
    </header>
    <nav>
        <a href="#home">خانه</a>
        <a href="#products">محصولات</a>
        <a href="#contact">تماس با ما</a>
    </nav>
    <main>
            <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="جستجو کنید...">
                <button type="submit">جستجو</button>
            </form>
            <?php
if (isset($_POST['search'])) {
    $search_query = $_POST['search'];
    $get = mysqli_query($link, "SELECT * FROM product WHERE name LIKE '%$search_query%' ");
    
    while ($row = mysqli_fetch_array($get)) {
        echo '
        <div class="product">
            <img src="' . $row['image'] . '" alt="Product Image"/>
            <h3>' . $row['name'] . '</h3>
            <p>' . $row['description'] . '</p>
            <p>' . $row['price'] . '</p>
            <button>افزودن به سبد خرید</button>
        </div>
        ';
    }
}
?>

       
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






