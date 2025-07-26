<?php
session_start();
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
        <img src="VE-169.jpg" width="110" height="80" alt="" />
<h1 style="margin-right: 122px">لوازم جانبی خودرو</h1>
        <div class="header-buttons">
            <button onclick="window.location.href='sabadkharid.php'">سبد خرید</button>
            <button onclick="window.location.href='#.php'">راهنما</button>
            <button onclick="window.location.href='login.php'">ورود</button>
            <button onclick="window.location.href='sabtnam1.php'">ثبت‌ نام</button>
        </div>
        <?php
        


        
        
        
        
        if (!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 1;
        } else {
            $_SESSION['counter'] += 1;
        }
        // unset($_SESSION['counter']);

        

        
        

        
        ?>

    </header>
    <nav>
        <a href="SajjadEtehadi.php">صفحه اصلی</a>
        <a href="conup.php">ویرایش اطلاعات</a>
        <?php
                    if (isset($_SESSION["state_login"])&& $_SESSION["state_login"] === true) {
                        ?>
                        <a class="set_style_link" href="addm.php">اضافه و حذف محصولات</a>
                        <a class="set_style_link" href="editproduct.php">ویرایش محصولات</a>
        <?php
                    }
        ?>
        <a href="#contact">تماس با ما</a>
            <?php
                if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] === "admin") {
                    echo "<p style='color:white;'>تعداد بازدید از این صفحه: " . $_SESSION['counter'] . "</p>";

                    
                }
            ?>


    </nav>

                    <h2>محصولات ما</h2>
        <p>لطفاً از محصولات ما استفاده کنید و اگر سوالی دارید با ما تماس بگیرید.</p>
    <main>
        

        <?php
        $link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");
        if (mysqli_connect_errno()) {
            echo "خطا در اتصال به پایگاه داده: " . mysqli_connect_error();
            exit();
        }

        $query = "SELECT * FROM product";
        $res = mysqli_query($link, $query);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $name = urlencode($row['name']);
                $price = $row['price'];
                $image = urlencode($row['image']);
                $qty = $row['qty'];
                // نمایش توضیحات کوتاه
                $description = substr($row['description'], 0, 100) . '...'; 
                ?>

                <div class="product">
                    <img src="uploads/<?= $row['image'] ?>" alt="" style="width: 198px; height: 200px;"/>
                    <h3><?= $row['name'] ?></h3>
                    <p><?= $description ?><a href="product_detail.php?id=<?= $id ?>">
                        مشاهده جزئیات
                    </a></p>
                    
                    <p style="font-size: 17px">قیمت: <?= $row['price'] ?> تومان</p>
                    <p style="font-size: 17px">موجودی: <?= $row['qty'] ?></p>
                    <a href="add_to_cart.php?id=<?= $id ?>&name=<?= $name ?>&price=<?= $price ?>&image=<?= $image ?>&qty=<?= $qty ?>">
                        <button>افزودن به سبد خرید</button>
                    </a>
                </div>

                <?php
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
    <script>

</script>

</body>
</html>
</body>

</html>