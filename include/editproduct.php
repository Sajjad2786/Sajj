<!doctype html>

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
            <button onclick="window.location.href='#.php'">راهنما</button>
            <button onclick="window.location.href='login.php'">ورود</button>
            <button onclick="window.location.href='sabtnam1.php'">ثبت‌ نام</button>
        </div>
    </header>
    <nav>
        <a href="index1.php">صفحه اصلی</a>
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

    </nav>
    <main>
        <h2>محصولات ما</h2>
        <p>لطفاً از محصولات ما استفاده کنید و اگر سوالی دارید با ما تماس بگیرید.</p>

        <?php
session_start();

// فقط مدیر اجازه دسترسی دارد
if (!isset($_SESSION['state_login']) || $_SESSION['state_login'] !== true || $_SESSION['user_type'] !== 'admin') {
    echo "<p style='color:red;'>دسترسی غیرمجاز</p>";
    exit();
}

$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");
if (mysqli_connect_errno()) {
    exit("خطا در اتصال به پایگاه داده: " . mysqli_connect_error());
}

// بروزرسانی محصول
if (isset($_POST['update_product'])) {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $desc = mysqli_real_escape_string($link, $_POST['description']);
    $price = floatval($_POST['price']);
    $qty = $_POST['qty'];

    $image = $_POST['image_old']; // پیش‌فرض تصویر قدیمی

    // بررسی آپلود جدید
    if (isset($_FILES['image_new']) && $_FILES['image_new']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $tmp_name = $_FILES['image_new']['tmp_name'];
        $filename = time() . "_" . basename($_FILES['image_new']['name']);
        $target_path = $upload_dir . $filename;

        if (move_uploaded_file($tmp_name, $target_path)) {
            $image = $filename; // فقط نام فایل ذخیره می‌شود، نه مسیر کامل
        } else {
            echo "<p style='color:red;'>خطا در آپلود تصویر جدید.</p>";
        }
    }

    $query = "UPDATE product SET name='$name', description='$desc', price='$price', image='$image', qty='$qty' WHERE id=$id";
    if (mysqli_query($link, $query)) {
        echo "<p style='color:green;'>محصول با موفقیت ویرایش شد</p>";
    } else {
        echo "<p style='color:red;'>خطا در ویرایش محصول: " . mysqli_error($link) . "</p>";
    }
}
?>

<h2>ویرایش محصولات</h2>

<?php
$res = mysqli_query($link, "SELECT * FROM product");
while ($row = mysqli_fetch_assoc($res)) {
?>
    <div class="product">
        <form method="post" enctype="multipart/form-data" style="border:0px; margin: 20px auto; padding:20px; width: 400px; text-align: right; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    
        <img src="uploads/<?php echo $row['image']; ?>" width="196" height="183" alt=""/>
    
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>نام محصول: <input type="text" name="name" value="<?php echo $row['name']; ?>"></label><br>
        <label>توضیحات: <input type="text" name="description" value="<?php echo $row['description']; ?>"></label><br>
        <label>قیمت: <input type="number" name="price" value="<?php echo $row['price']; ?>"></label><br>
        <label>موجودی: <input type="number" name="qty" value="<?php echo $row['qty']; ?>"></label><br>
        <label>آدرس عکس فعلی: <input type="text" name="image_old" value="<?php echo $row['image']; ?>" readonly></label><br>
        <label>تغییر عکس: <input type="file" name="image_new"></label><br>

        <input type="submit" name="update_product" value="ذخیره تغییرات">
        </form>
    </div>
<?php } ?>
<a href="index1.php">بازگشت به فروشگاه</a>


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

</body>

</html>

