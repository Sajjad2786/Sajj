<?php
session_start();

// اتصال به پایگاه داده
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");
if (!$link) {
    die("خطا در اتصال به پایگاه داده: " . mysqli_connect_error());
}

// اگر فرم ارسال شده
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pro_code = $_POST['pro_code'];
    $pro_name = $_POST['pro_name'];
    $pro_qty = $_POST['pro_qty'];
    $pro_price = $_POST['pro_price'];
    $total_price = $_POST['total_price'];

    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    

    // درج در پایگاه داده
    $query = "INSERT INTO orders (username, orderdate, pro_code, pro_qty, pro_price, totalprice, mobile, adress , trackcode, state)
          VALUES ('$customer_name', '".date('Y-m-d H:i:s')."', '$pro_code', '$pro_qty', '$pro_price', '$total_price', '$customer_phone', '$customer_address', '000000000000000000000000', '0')";


    $stmt = mysqli_query($link, $query);
    

    if ($stmt) {
        $order_saved = true;
    } else {
        $order_saved = false;
        $error_msg = mysqli_error($link);
    }

    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>تأیید سفارش</title>
    <link href="order.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="confirmation-box">
    <?php if (isset($order_saved) && $order_saved): ?>
        
        <h2>✅ سفارش شما با موفقیت ثبت شد!</h2>
        <div class="details">
            <p><strong>کد کالا:</strong> <?php echo htmlspecialchars($pro_code); ?></p>
            <p><strong>نام کالا:</strong> <?php echo htmlspecialchars($pro_name); ?></p>
            <p><strong>تعداد:</strong> <?php echo htmlspecialchars($pro_qty); ?></p>
            <p><strong>مبلغ کل:</strong> <?php echo htmlspecialchars($total_price); ?> ریال</p>
            <p><strong>نام خریدار:</strong> <?php echo htmlspecialchars($customer_name); ?></p>
            <p><strong>تلفن تماس:</strong> <?php echo htmlspecialchars($customer_phone); ?></p>
            <p><strong>نشانی:</strong> <?php echo nl2br(htmlspecialchars($customer_address)); ?></p>
            <?php
            $pro_code += 1;
            ?>
        </div>
    <?php else: ?>
        <h2 class="error">❌ خطا در ثبت سفارش</h2>
        <p class="error">متأسفانه سفارش شما ذخیره نشد.</p>
        <p class="error">خطا: <?php echo $error_msg ?? 'خطای ناشناخته'; ?></p>
    <?php endif; ?>

    <a href="SajjadEtehadi.php" class="back-btn">بازگشت به فروشگاه</a>
</div>

</body>
</html>
