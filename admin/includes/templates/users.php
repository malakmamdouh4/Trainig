
<?php
    $getUsers = $db -> prepare('SELECT * FROM users');   // view 
    $getUsers->execute();      // execute 
    $users = $getUsers->fetchAll();     // array
?>

<div class="container" style="margin:100px auto">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            foreach($users as $user){
                ?>
                <tr>
                    <td>
                        <?php echo $user['ID'] ?>
                    </td>
                    <td>
                        <?php echo $user['Username'] ?>
                    </td>
                    <td>
                        <a href="index.php?page=users&delete=<?php echo $user['ID'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
</div>


<?php
    if(isset($_GET['delete'])){
        $deleteUser = $db -> prepare('DELETE FROM users WHERE ID = ?');
        $deleteUser->execute(array($_GET['delete']));
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
?>
















<!-- 
    الصفحة دى علشان اعمل الفرونت لجدول اليوزرز اللي سجلوا في الويب سايت .. اول ميثود عندنا بتظهرلي اليوزر دول وبعدين هتنفذها 
    وبعدين هنحط المستخدمين في شكل اراى .. هاجى ع الفرونت واعمله 
    وبعدين هعمل من ضمنه زر الديليت علشان امسح اى يوزر ..علشان الصفحة تنفذلي اكتر من ميثود اللي هحط جمب المتغير اللي بنكتبه فوق العلامة
    دى & 
    واكتب كود البي اتش بي بتاعه تحت 
-->