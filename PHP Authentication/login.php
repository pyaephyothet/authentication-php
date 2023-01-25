<?php
include_once './common.php';

session_start();
if ($_SESSION['authentication']) {
    route('home.php');
}

if (isset($_POST['login'])) {
    $userEmail = $_POST['email'];
    $userPassword = $_POST['u-pw'];

    $validate = [];

    if (!$userEmail && !$userPassword) {
        $validate['required'] = 'This is required!';
    } else {
        $pdo = $pdo->prepare("SELECT * FROM user WHERE email = ? and password = ?");
        $pdo->execute([$userEmail, $userPassword]);
        $result = $pdo->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION['authentication'] = true;
            route('home.php');
        } else {
            route('register.php');

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form method="post">
      <div class="user-input">
        <label for="">Email</label>
        <input type="email" name="email">
        <span class="err"><?php if (isset($validate['required'])) {echo $validate['required'];}?></span>
      </div>
      <div class="user-input">
        <label for="">Password</label>
        <input type="password" name="u-pw">
        <span class="err"><?php if (isset($validate['required'])) {echo $validate['required'];}?></span>
      </div>
      <button class="u-btn rigister-btn" type="submit" name="login">Login</button>
    </form>
  </div>

</body>

</html>