<?php
// اتصال به دیتابیس
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");
if (mysqli_connect_errno()) {
    echo "خطا در اتصال به دیتابیس: " . mysqli_connect_error();
    exit();
}

// دریافت نام محصول از فرم
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    // بررسی وجود محصول
    $check_query = "SELECT * FROM product WHERE name = '$name'";
    $check_result = mysqli_query($link, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // حذف محصول
        $delete_query = "DELETE FROM product WHERE name = '$name'";
        if (mysqli_query($link, $delete_query)) {
            echo "<p style='color: green;'>✅ محصول با نام <strong>$name</strong> با موفقیت حذف شد.</p>";
        } else {
            echo "<p style='color: red;'>❌ خطا در حذف محصول: " . mysqli_error($link) . "</p>";
        }
    } else {
        echo "<p style='color: orange;'>⚠️ محصولی با نام <strong>$name</strong> یافت نشد.</p>";
    }

} else {
    echo "<p style='color: red;'>لطفاً نام محصول را وارد کنید.</p>";
}

mysqli_close($link);
?>
