<?php
include_once 'header.php';
include_once 'connect.php';

if (isset($_POST['send'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  if(isset($_POST['remember'])){
    setcookie('email' , $email,time()+10);
    setcookie('password' , $pass,time()+10);
  }

  $pdo = connect_db();
  $query = $pdo->prepare("SELECT * FROM users_tb1 WHERE email='$email'");
  $query->execute();
  $res = $query->fetch(PDO::FETCH_OBJ);

  // var_dump($res);

  if ($res) {
    if ($res->password == $pass) {
      header("location: dashbortd.php");
      $_SESSION['login'] = $res->email;
    } else {
      echo '<h4>رمز عبور اشتباه است</h4>';
    }
  }
}

?>


<link href="./css/main.css" rel="stylesheet">
<div class="flex justify-center items-center h-screen bg-gray-50 text-right">
  <form class="bg-white p-6 rounded-lg shadow-lg" method="post">
    <div class="mb-4">
      <label for="email" class="block text-gray-700 text-sm font-bold mb-2">ایمیل</label>
      <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="ایمیل خود را وارد کنید" value="<?php if (isset($_COOKIE['email'])) { echo "$_COOKIE[email]";} ?>">
    </div>
    <div class="mb-4">
      <label for="password" class="block text-gray-700 text-sm font-bold mb-2">رمز عبور</label>
      <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="رمز عبور خود را وارد کنید" value="<?php if (isset($_COOKIE['password'])) {echo "$_COOKIE[password]";} ?>">
    </div>

    <div class="flex items-center pl-4 rounded dark:border-gray-700">
            <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-checkbox-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">مرا بخاطر بسپار</label>
        </div>


    <button name="send" type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">ورود</button>
  </form>
</div>