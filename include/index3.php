<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:rgb(139, 139, 139);">

    
    <?php
    $link = mysqli_connect("localhost","Sajjad","123.sajad","iranian shop");

        if (mysqli_connect_errno()) {
            exit("خطای با شرح زیر رخ داده است: " . mysqli_connect_error());
        }
        if (isset($_POST['realname']) && !empty($_POST['realname']) &&
        isset($_POST['username']) && !empty($_POST['username']) && 
        isset($_POST['meli']) && !empty($_POST['meli']) && 
        isset($_POST['password']) && !empty($_POST['password']) && 
        isset($_POST['repassword']) && !empty($_POST['repassword']) && 
        isset($_POST['email']) && !empty($_POST['email'])) {

            $realname = $_POST['realname'];
            $username = $_POST['username'];
            $meli = $_POST['meli'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $email = $_POST['email'];
        } 
        else
            exit("");

        if ($password != $repassword) {
            exit("کلمه عبور و تکرار آن مشابه نیست!");
        }  

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            exit("پست الکترونیک وارد شده صحیح نیست!");
        }
 
        $query = "INSERT INTO users (realname, username, meli, password, email, type, create_at) VALUES ('$realname', '$username', '$meli', '$password', '$email', '1', CURRENT_TIMESTAMP)";

       
        
        if (mysqli_query($link, $query) === true) {
            echo ("<p style='color:green;'><b>" . $realname . 
            "گرامی عضویت شما با نام کاربری" . $username . 
            "درفروشگاه با موفقیت انجام شد." . "</b></p>");
            echo ("<a href='SajjadEtehadi.php' style='color: yellow; background-color: red; text-decoration: none;'>ورود به صفحه اصلی فروشگاه</a>
            ");
            
        }
        else
            echo ("<p style='color:red';><b>عضویت شما در فروشگاه انجام نشد!</b></p>");

        mysqli_close($link);
        

        

    ?>

    

    
</body>
</html>

    
