<?php
include_once 'header.php';
include_once 'connect.php';

if (isset($_POST['send'])){

    $user=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $pdo=connect_db();
    $query=$pdo->prepare("INSERT INTO users_tb1 (username,password,email) VALUES('$user','$pass','$email')");
    $query->execute();

    echo '<h4>تبریک؛ ثبت نام انجام شد</h4>';

}

?>


<link href="./css/main.css" rel="stylesheet">
<div class="flex justify-center items-center h-screen bg-gray-50 text-right">
    <form class="bg-white p-6 rounded-lg shadow-lg" method="post">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">نام</label>
            <input type="text" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="نام خود را وارد کنید">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">ایمیل</label>
            <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="ایمیل خود را وارد کنید">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">رمز عبور</label>
            <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="رمز عبور خود را وارد کنید">
        </div>
        <button name="send" type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">ورود</button>
    </form>
</div>