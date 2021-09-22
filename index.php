<?include 'db.php';ini_set('display_errors','on');
error_reporting('E_ALL');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
</head>
<body>
<header class="header">
    <div class="container">
        <ul class="list_contacts">
            <li>
                <p>Группа</p>
                <p>Имя</p>
                <p>Фамилия</p>
                <p>Отчество</p>
            </li>   
            <form action="#" method="POST" id="main_form">
            <?
                /*Form for read recordings*/
                $query2 =  mysqli_query($connect,"SELECT * FROM `Students`");
                $n = mysqli_num_rows($query2);
                while($r = mysqli_fetch_array($query2)){
                    echo "<li>
                    <input type='text' name='lrn_group' id='lrn_group-$r[id]' value='{$r[lrn_group]}' disabled>
                    <input type='text' name='fname' id='fname-$r[id]' value='{$r[fname]}' disabled>
                    <input type='text' name='sname' id='sname-$r[id]' value='{$r[sname]}' disabled>
                    <input type='text' name='tname' id='tname-$r[id]' value='{$r[tname]}' disabled>
                    <input value='{$r[id]}' type='hidden' name='id_user'>
                    <button type='submit' name='submit_upd' id='submit_upd'>
                        <img src='img/upd.png'>
                    </button>
                    </li>";   
                }

                /*Form for adding recordings*/
                echo "</form >
                    <form action='#' method='POST' id='add_form' class='add_form'>
                        <select name='lrn_group' id='lrn_group'>";
                        $query_groups =  mysqli_query($connect,"SELECT * FROM `groups`");
                        $m = mysqli_num_rows($query_groups);
                        while($e = mysqli_fetch_array($query_groups)){
                            echo "<option value='$e[lrn_group]'>{$e[lrn_group]}</option>";
                        }
                    echo "</select>
                        <input type='text' name='fname_add' id='fname_add' placeholder='Имя' >
                        <input type='text' name='sname_add' id='sname_add' placeholder='фамилия' >
                        <input type='text' name='tname_add' id='tname_add' placeholder='Отчество' >
                        <input type='submit' name='submit_add' id='submit_add' value='Добавить' >
                    </form>
                    <div class='controls'>
                        <a href='#add_form' class='btn add'>Добавить запись</a>
                    </div>";
                if (isset($_POST['submit_add'])) {
                    $lrn_group=$_POST['lrn_group'];
                    $fname_add=$_POST['fname_add'];
                    $sname_add=$_POST['sname_add'];
                    $tname_add=$_POST['tname_add'];
                    $query_add = mysqli_query($connect,"INSERT INTO `students` VALUES(null,'$lrn_group','$fname_add','$sname_add','$tname_add')");
                    echo "
                    <div class='msg_box'>
                        <h5>Системное сообщение</h5>
                        <h3>Запись добавлена на сервер</h3>
                    </div>
                    ";
                }

                /*Form for update recording*/
                if (isset($_POST['submit_upd'])) {
                    $id_user=$_POST['id_user'];
                    $query33 =  mysqli_query($connect,"SELECT * FROM `Students` WHERE id = '$id_user'");
                    $n = mysqli_num_rows($query33);
                    while($r = mysqli_fetch_array($query33)){
                        echo "<form action='#' method='POST' id='edit_form' class='edit_form' >
                            <select name='lrn_group' id='lrn_group'>";
                            $query_groups =  mysqli_query($connect,"SELECT * FROM `groups`");
                            $m = mysqli_num_rows($query_groups);
                            while($e = mysqli_fetch_array($query_groups)){
                                echo "<option value='$e[lrn_group]'>{$e[lrn_group]}</option>";
                            }
                        echo "</select>
                        <input type='text' name='fname' id='fname-$r[id]' value='{$r[fname]}' >
                        <input type='text' name='sname' id='sname-$r[id]' value='{$r[sname]}' >
                        <input type='text' name='tname' id='tname-$r[id]' value='{$r[tname]}' >
                        <input value='{$r[id]}' type='hidden' name='id_user'>
                        <input type='submit' name='update_cell' id='update_cell' value='Изменить'>
                        </form>";
                    }
                }
                if (isset($_POST['update_cell'])) {
                    $id2=$_POST['id_user'];
                    $lrn_group_upd=$_POST['lrn_group'];
                    $fname_upd=$_POST['fname'];
                    $sname_upd=$_POST['sname'];
                    $tname_upd=$_POST['tname'];
                    
                    $arr=array();
                    $arr[]="lrn_group='$lrn_group_upd'";
                    $arr[]="fname='$fname_upd'";
                    $arr[]="sname='$sname_upd'";
                    $arr[]="tname='$tname_upd'";
                    

                    $set=implode(',',$arr);
                    $query4 = "UPDATE `students` SET $set WHERE id = '$id2'";
                    if ($connect->query($query4) === TRUE) {
                            echo "
                            <div class='msg_box'>
                                <h5>Системное сообщение</h5>
                                <h3>Запись была изменена</h3>
                            </div>
                            ";
                    } else {
                        echo "
                            <div class='msg_box'>
                                <h5>Системное сообщение</h5>
                                <h3>Ошибка при измениии записи :".$conn->error."</h3>
                            </div>
                            ";
                    }

                }

            
                    
    ?>
        </ul>
    </div>
</header>
<script src="js/main.js"></script>
</body>
</html>