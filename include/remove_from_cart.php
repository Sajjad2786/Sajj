<?php
session_start();

// دریافت اطلاعات از URL یا فرم (اینجا با GET)
if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['image'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $image = $_GET['image'];

    // اگر سبد خرید وجود نداشت، ایجادش می‌کنیم
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // اگر محصول قبلاً در سبد هست، فقط تعدادش رو زیاد کن
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'quantity' => 1
        ];
    }

    header("Location: cart.php"); // انتقال به سبد خرید
    exit();
} else {
    echo "اطلاعات ناقص است!";
}
?>
