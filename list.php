<?php
include_once 'header.php';
include_once 'connect.php';

?>

<div class="flex flex-col w-[900px] mx-auto">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">ID</th>
                            <th scope="col" class="px-6 py-4">نام</th>
                            <th scope="col" class="px-6 py-4">کد ملی</th>
                            <th scope="col" class="px-6 py-4">تلفن</th>
                            <th scope="col" class="px-6 py-4">تاهل</th>
                            <th scope="col" class="px-6 py-4">مهارت</th>
                            <th scope="col" class="px-6 py-4">حذف</th>
                            <th scope="col" class="px-6 py-4">ویرایش</th>

                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $pdo=connect_db();
                    $query=$pdo->prepare("SELECT * FROM info_tbl");
                    $query->execute();
                    $res=$query->fetchAll(PDO::FETCH_OBJ);
                    // var_dump($res); die();
                    foreach($res as $val) : ?>

                    

         <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium"><?php echo $val->id;?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?php echo $val->fullname ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?php echo $val->codemeli ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?php echo $val->tell ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?php echo $val->taahol ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><?php echo $val->maharat ?></td>
                            <td class="whitespace-nowrap px-6 py-4"><a href="delete.php?id= <?php echo $val->id ?>">Delete</a></td>
                            <td class="whitespace-nowrap px-6 py-4"><a href="edit.php?id= <?php echo $val->id ?>">Edit</a></td>


                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>