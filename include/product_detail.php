<?php
session_start();
if (!isset($_GET['id'])) {
    echo "محصولی انتخاب نشده است.";
    exit();
}

// دریافت شناسه محصول از URL
$product_id = $_GET['id'];

// اتصال به پایگاه داده
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");
if (mysqli_connect_errno()) {
    echo "خطا در اتصال به پایگاه داده: " . mysqli_connect_error();
    exit();
}

// گرفتن اطلاعات محصول با شناسه
$query = "SELECT * FROM product WHERE id = $product_id";
$res = mysqli_query($link, $query);

if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $price = $row['price'];
    $image = $row['image'];
    $qty = $row['qty'];
    $description = $row['description'];
} else {
    echo "محصول یافت نشد.";
    exit();
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
            <button onclick="window.location.href='sabadkharid.php'">سبد خرید</button>
            <button onclick="window.location.href='#.php'">راهنما</button>
            <button onclick="window.location.href='login.php'">ورود</button>
            <button onclick="window.location.href='sabtnam1.php'">ثبت‌ نام</button>
        </div>
        <?php
        


        // مسیر فایل شمارنده
        $counter_file = 'visit_count.txt';

        // اگر فایل وجود ندارد، بسازش با مقدار اولیه 0
        if (!file_exists($counter_file)) {
            file_put_contents($counter_file, 0);
        }

        // مقدار قبلی را بخوان
        $visit_count = (int)file_get_contents($counter_file);

        // یکی بهش اضافه کن
        $visit_count++;

        // و دوباره ذخیره کن
        file_put_contents($counter_file, $visit_count);

        
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
                    echo "<p style='color:white;'>تعداد بازدید از این صفحه: $visit_count</p>";
                }
            ?>


    </nav>

    <main>
        <h2>جزئیات محصول</h2>
        <div class="product">
            <img src="uploads/<?= $image ?>" alt="" style="width: 198px; height: 200px;"/>
            <h3><?= $name ?></h3>
            <p><?= $description ?></p>
            <p style="font-size: 17px">قیمت: <?= $price ?> تومان</p>
            <p style="font-size: 17px">موجودی: <?= $qty ?></p>
            <a href="add_to_cart.php?id=<?= $product_id ?>&name=<?= urlencode($name) ?>&price=<?= $price ?>&image=<?= urlencode($image) ?>&qty=<?= $qty ?>">
                <button>افزودن به سبد خرید</button>
            </a>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 لوازم جانبی خودرو</p>
    </footer>
</body>
</html>
