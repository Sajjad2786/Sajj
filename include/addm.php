<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت محصول</title>
    <link href="sabtnam.css" rel="stylesheet" type="text/css">
</head>
<body dir="rtl">
    <div class="register-container">
        <h2>ثبت محصول</h2>
        <form class="form" name="myform" id="myform" method="POST" action="sus.php" enctype="multipart/form-data">
            <input type="text" placeholder="شماره محصول" name="id" id="id" required>
            <input type="text" placeholder="نام محصول" name="name" id="name" required>
            <input type="text" placeholder="موجودی" name="qty" id="qty" required>
            <input type="text" placeholder="قیمت" name="price" id="price" required>
            <input type="text" placeholder="توضیحات" name="description" id="description" required>
            <input type="file" placeholder="عکس محصول" name="image" accept="image/*" id="img" required>
            <input type="submit" value="اضافه کردن"> 
        </form>
        <a href="hazfm.php">حذف محصول</a>
    </div>
</body>
</html>
