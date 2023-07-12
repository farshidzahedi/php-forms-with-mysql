<?php 
include_once 'header.php';
include_once 'connect.php';
$id= $_GET['id'];

    $pdo=connect_db();
    $query=$pdo->prepare("SELECT * FROM info_tbl WHERE id=$id");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    // var_dump($res);
    foreach($res as $val) : 

//update databsae

if (isset($_POST['update'])) {
    var_dump($_POST);
    $fullname = $_POST['fullname'];
    $codemeli = $_POST['codemeli'];
    $tell = $_POST['tell'];
    $ostan = $_POST['ostan'];
    $taahol = $_POST['taahol'];
    $maharat = $_POST['maharat'];
    $discription = $_POST['discription'];
    $maharat_s = implode(',', $maharat);

    $pdo = connect_db();
    $query = $pdo->prepare("UPDATE info_tbl SET fullname='$fullname' , codemeli='$codemeli', tell='$tell', taahol='$taahol', maharat='$maharat_s',discription='$discription' WHERE id='$id'");
    $query->execute();
    header("location:edit.php?id=$val->id");
    echo '<h4>تبریک؛ ثبت اطلاعات انجام شد</h4>';
}
?>

<div class="flex justify-center items-center h-screen bg-gray-50 text-right rtl-grid ">
    <form class="bg-white p-6 rounded-lg shadow-lg" method="post">

        <div class="mb-4">
            <label for="fullname" class="block text-gray-700 text-sm font-bold mb-2">نام و نام خانوادگی</label>
            <input type="text" name="fullname" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="<?php echo $val->fullname; ?>">
        </div>
        <div class="mb-4">
            <label for="codemeli" class="block text-gray-700 text-sm font-bold mb-2">کد ملی</label>
            <input type="text" name="codemeli" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="<?php echo $val->codemeli; ?>">
        </div>

        <div class="mb-4">
            <label for="tell" class="block text-gray-700 text-sm font-bold mb-2">تلفن</label>
            <input type="text" name="tell" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 text-right" required placeholder="<?php echo $val->tell; ?>">
        </div>


        <div class="flex items-center pl-4  rounded dark:border-gray-700">
            <input type="radio" value="مجرد" name="taahol" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 " <?php if($val->taahol=="مجرد") {echo 'checked';} ?>>
            <label for="taahol" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-800">مجرد</label>
        </div>
        <div class="flex items-center pl-4  rounded dark:border-gray-700">
            <input type="radio" value="متاهل" name="taahol" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 " <?php if($val->taahol=="متاهل") {echo 'checked';} ?>>
            <label for="taah" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-800">متاهل</label>
        </div>


        <!--Default checkbox-->
        <div class="flex items-center pl-4 rounded dark:border-gray-700">
            <input type="checkbox" value="php" name="maharat[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if( strpos($val->maharat,'php') !==false ) {echo "checked";} ?>>
            <label for="bordered-checkbox-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">PHP</label>
        </div>
        <div class="flex items-center pl-4 rounded dark:border-gray-700">
            <input type="checkbox" value="seo" name="maharat[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php if( strpos($val->maharat,'seo') !==false ) {echo "checked";} ?>>
            <label for="seo" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">SEO</label>
        </div>
        <div class="flex items-center pl-4  rounded dark:border-gray-700">
            <input type="checkbox" value="wp" name="maharat[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"<?php if( strpos($val->maharat,'wp') !==false ) {echo "checked";} ?>>
            <label for="wp" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">WP</label>
        </div>

        <div class="relative mb-3" data-te-input-wrapper-init>
            <textarea class="peer text-right block min-h-[auto] w-full rounded  bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear border border-gray-500 focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-900 dark:placeholder:text-neutral-900 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-1 " name="discription" placeholder="Your message"><?php echo $val->discription; ?></textarea>
        </div>
        <button type="submit" name="update" class="bg-blue-500 p-3 w-full rounded-md">بروز رسانی</button>
    </form>
</div>

<?php endforeach; ?>