<?php
session_start();
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");

if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سبد خرید</title>
    <link href="css.css" rel="stylesheet" type="text/css">
</head>
<body dir="rtl">

<header>
    <img src="VE-169.jpg" width="110" height="80" alt="" style="margin-right: 28px"/>
    <h1 style="margin-right: 122px">سبد خرید</h1>
    <div class="header-buttons">
        <button onclick="window.location.href='cart.php'">سبد خرید</button>
        <button onclick="window.location.href='#.php'">راهنما</button>
        <button onclick="window.location.href='login.php'">ورود</button>
        <button onclick="window.location.href='sabtnam1.php'">ثبت‌ نام</button>
    </div>
</header>

<nav>
    <a href="SajjadEtehadi.php">صفحه اصلی</a>
    <a href="conup.php">ویرایش اطلاعات</a>
    <?php
    if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
        echo '<a class="set_style_link" href="addm.php">اضافه و حذف محصولات</a>';
        echo '<a class="set_style_link" href="editproduct.php">ویرایش محصولات</a>';
    }
    ?>
    <a href="#contact">تماس با ما</a>
</nav>

<main>
    <h2>سبد خرید شما</h2>

    <?php
    if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['image'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $image = $_GET['image'];
    $qty = $_GET['qty'];

    // 🛠️ اضافه کن این خط برای پاک کردن موارد قبلی
    $_SESSION['cart'] = [];

    $_SESSION['cart'][$id] = [
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'qty' => $qty
    ];
    }

    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        echo "<p style='color:red;'>سبد خرید شما خالی است.</p>";
    } else {
        echo "<table border='1' cellpadding='10' style='width:100%; text-align:center;'>";
        echo "<tr><th>تصویر</th><th>نام محصول</th><th>موجودی</th><th>قیمت واحد</th><th>قیمت کل</th><th>حذف</th></tr>";

        $total = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;
            echo "<tr>
                    <td><img src='uploads/{$item['image']}' width='70'></td>
                    <td>{$item['name']}</td>
                    <td>{$item['qty']}</td>
                    <td>{$item['price']} تومان</td>
                    <td>{$subtotal} تومان</td>
                    <td><a href='remove_from_cart.php?key=$key'>🗑️</a></td>
                  </tr>";
        }

        echo "<tr><td colspan='4'><strong>مبلغ کل:</strong></td><td colspan='2'><strong>$total تومان</strong></td></tr>";
        echo "</table>";
    }
    ?>

    <?php
// مقداردهی اولیه برای جلوگیری از ارور
$pro_code = isset($_GET['id']) ? $_GET['id'] : '';
$pro_name = isset($_GET['name']) ? $_GET['name'] : '';
$pro_price = isset($_GET['price']) ? $_GET['price'] : 0;
$pro_image = isset($_GET['image']) ? $_GET['image'] : '';
?>
<br /><br />
<h3 style="color: #333;">جزئیات محصول انتخاب‌شده</h3>
<form action="order.php" method="post">
<table style="width: 100%; border: 1px solid #ccc;" cellpadding="10">
    <tr>
        <td style="width: 13%;">کد کالا <span style="color: red;">*</span></td>
        <td style="width: 80%;"><input type="text" id="pro_code" name="pro_code" value="<?php echo htmlspecialchars($pro_code); ?>" readonly style="background-color: lightgray; width: 20%; padding: 6px;"></td>
    </tr>
    <tr>
        <td>نام کالا <span style="color: red;">*</span></td>
        <td><input type="text" id="pro_name" name="pro_name" value="<?php echo htmlspecialchars($pro_name); ?>" readonly style="background-color: lightgray; width: 20%; padding: 6px;"></td>
    </tr>
    <tr>
        <td>تعداد مقدار درخواستی <span style="color: red;">*</span></td>
        <td><input type="number" id="pro_qty" name="pro_qty" onchange="calc_price();" value="1" min="1" style="width: 20%; padding: 6px;"></td>
    </tr>
    <tr>
        <td>قیمت واحد کالا <span style="color: red;">*</span></td>
        <td><input type="text" id="pro_price" name="pro_price" value="<?php echo htmlspecialchars($pro_price); ?>" readonly style="background-color: lightgray; width: 20%; padding: 6px;"> ریال</td>
    </tr>
    <tr>
        <td>مبلغ قابل پرداخت</td>
        <td><input type="text" id="total_price" name="total_price" value="<?php echo $pro_price; ?>" readonly style="background-color: lightgray; width: 20%; padding: 6px;"> ریال</td>
    </tr>

    <!-- اطلاعات کاربر -->
    <tr>
        <td>نام کاربر <span style="color: red;">*</span></td>
        <td><input type="text" name="customer_name" placeholder="نام کامل شما" required style="width: 20%; padding: 6px;"></td>
    </tr>
    <tr>
        <td>شماره تماس <span style="color: red;">*</span></td>
        <td><input type="text" name="customer_phone" placeholder="مثلاً 09123456789" required style="width: 20%; padding: 6px;"></td>
    </tr>
    <tr>
        <td>نشانی مقصد <span style="color: red;">*</span></td>
        <td><textarea name="customer_address" placeholder="آدرس دقیق برای ارسال" rows="3" style="width: 60%; padding: 6px;" required></textarea></td>
    </tr>

    <tr>
        <td colspan="2" style="text-align: center;">
            <button type="submit" style="padding: 10px 20px; font-size: 16px;">ثبت سفارش</button>
        </td>
    </tr>
</table>
</form>

<script type="text/javascript">
    function calc_price() {
        let price = parseInt(document.getElementById('pro_price').value);
        let qty = parseInt(document.getElementById('pro_qty').value);
        if (isNaN(qty) || qty <= 0) qty = 1;
        let total = price * qty;
        document.getElementById('total_price').value = total;
    }
</script>




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
