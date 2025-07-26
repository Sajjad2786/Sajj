<?php
session_start();



// اتصال به پایگاه داده
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");
if (!$link) {
    die("اتصال به پایگاه داده ناموفق بود: " . mysqli_connect_error());
}

// دریافت سفارش‌ها
$query = "SELECT * FROM orders ORDER BY orderdate DESC";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت سفارش‌ها</title>
    <link href="sabadkharid.css" rel="stylesheet" type="text/css">
</head>
<body>

<h2>📋 فهرست سفارش‌های ثبت‌شده</h2>

<?php if (mysqli_num_rows($result) > 0): ?>
    <table>
        <tr>
            <th>ردیف</th>
            <th>کد کالا</th>
            <th>نام کالا</th>
            <th>تعداد</th>
            <th>قیمت واحد</th>
            <th>جمع کل</th>
            <th>نام مشتری</th>
            <th>تلفن</th>
            <th>نشانی</th>
            <th>تاریخ سفارش</th>
            <th> وضعیت سفارش</th>
        </tr>
        <?php $i = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['pro_code']) ?></td>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= htmlspecialchars($row['pro_qty']) ?></td>
                <td><?= number_format($row['pro_price']) ?> ریال</td>
                <td><?= number_format($row['totalprice']) ?> ریال</td>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= htmlspecialchars($row['mobile']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['adress'])) ?></td>
                <td><?= $row['orderdate'] ?></td>
                <?php
                switch ($row['state']) {
                    case '0':
                        $state_text = '🕒 تحت بررسی';
                        break;
                    case '1':
                        $state_text = '📦 آماده برای ارسال';
                        break;
                    case '2':
                        $state_text = '🚚 ارسال شده';
                        break;
                    case '3':
                        $state_text = '❌ سفارش لغو شده است';
                        break;
                    default:
                        $state_text = 'نامشخص';
                }
                ?>
                <td><?= $state_text ?></td>
            </tr>
            
        <?php endwhile; ?>
        <tr><a href="SajjadEtehadi.php">بازگشت به صفحه اصلی فروشگاه</a></tr>
    </table>
<?php else: ?>
    <p>هنوز هیچ سفارشی ثبت نشده است.</p>
<?php endif; ?>

<?php mysqli_close($link); ?>


</body>
</html>
