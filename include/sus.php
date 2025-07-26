<?php
$link = mysqli_connect("localhost", "Sajjad", "123.sajad", "iranian shop");

if (mysqli_connect_errno()) {
    echo "خطا در اتصال به دیتابیس: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['id'], $_POST['name'], $_POST['price'], $_FILES['image'], $_POST['description'], $_POST['qty'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $qty = $_POST['qty'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // بررسی پسوند فایل با pathinfo
    $imageInfo = pathinfo($image);
    $extension = strtolower($imageInfo['extension']);

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($extension, $allowedExtensions)) {
        echo "<p style='color:red;'>فقط فایل‌های با پسوند jpg, jpeg, png, gif مجاز هستند.</p>";
        exit();
    }

    $target = "uploads/" . basename($image);
    $image_name = basename($image);

    if (move_uploaded_file($tmp, $target)) {
        if (file_exists($target)) {
            $query = "INSERT INTO product (id, name, price, image, description, qty)
                      VALUES ($id, '$name', '$price', '$image_name', '$description', '$qty')";

            $result = mysqli_query($link, $query);

            if ($result) {
                echo "<p style='color:green;'>محصول $name با موفقیت ثبت شد.</p>";
                echo "<a href='SajjadEtehadi.php' style='color: yellow; background-color: red; text-decoration: none;'>بازگشت به صفحه اصلی</a>";
            } else {
                echo "<p style='color:red;'>خطا در ثبت محصول: " . mysqli_error($link) . "</p>";
            }
        } else {
            echo "<p style='color:red;'>فایل در پوشه آپلود ذخیره نشد!</p>";
        }
    } else {
        echo "<p style='color:red;'>مشکلی در انتقال فایل وجود دارد!</p>";
    }

} else {
    echo "<p style='color:red;'>تمام فیلدها باید تکمیل شوند!</p>";
}

mysqli_close($link);
?>
