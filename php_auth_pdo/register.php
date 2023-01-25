<?php
include_once './common.php';

if (isset($_POST['register'])) {
    $name = $_POST['u-name'];
    $email = $_POST['email'];
    $password = $_POST['u-pw'];
    $confirm_password = $_POST['c-pw'];

    $validate = [];

    if (!$name || !$email || !$password || !$confirm_password) {
        $validate['required'] = 'This is required!';
    } else {
        $status = checkStrongPassword($password);
        if (!$status) {
            $validate['pw-error'] = 'Password is not strong(eg. Aa@123).';
        }

    }
    if ($password !== $confirm_password) {
        $validate['pw-error'] = 'Passwords must be same.';
    }

    if (count($validate) == 0) {
        $pdo = $pdo->prepare('INSERT INTO user (name, email, password, confirm) VALUES (:fname, :fmail, :fpw, :fcon)');
        $pdo->execute([
            'fname' => $name,
            'fmail' => $email,
            'fpw' => $password,
            'fcon' => $confirm_password,
        ]);

        if ($pdo) {
            route('login.php');
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
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form method="post">
      <div class="user-input">
        <label for="">Name</label>
        <input type="text" name="u-name">
        <span class="err"><?php if (isset($validate['required'])) {echo $validate['required'];}?></span>
      </div>
      <div class="user-input">
        <label for="">Email</label>
        <input type="email" name="email">
        <span class="err"><?php if (isset($validate['required'])) {echo $validate['required'];}?></span>
      </div>
      <div class="user-input">
        <label for="">Password</label>
        <input type="password" name="u-pw">
        <span class="err"><?php if (isset($validate['required'])) {echo $validate['required'];}?></span>
        <span class="err"><?php if (isset($validate['pw-error'])) {echo $validate['pw-error'];}?></span>
      </div>
      <div class="user-input">
        <label for="">Confirm Password</label>
        <input type="password" name="c-pw">
        <span class="err"><?php if (isset($validate['required'])) {echo $validate['required'];}?></span>
        <span class="err"><?php if (isset($validate['pw-error'])) {echo $validate['pw-error'];}?></span>
      </div>
      <button class="u-btn rigister-btn" type="submit" name="register">Register</button>
    </form>
  </div>
</body>

</html>