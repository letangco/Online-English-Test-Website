<?php
    include('admin/modules/result/connection.php');
    //include('admin/connect.php');
    //	session_start();
        $tittle = $_GET['id-class'];
        $id_std = $_GET['id-std'];
        $username = $_SESSION['login'];
        $sql_role = "SELECT * FROM `account` WHERE username = '$username'";
        $query_role = $conn->prepare($sql_role);
        $query_role->execute();
        $result_role = $query_role->fetch(PDO::FETCH_ASSOC);

        $sql_std = "SELECT * FROM STUDY, RESULT, TEST
                    WHERE STUDY.CLASS_ID='$tittle' 
                    AND STUDY.USERNAME = RESULT.USERNAME
                    AND TEST.CLASS_ID = '$tittle'
                    AND RESULT.TEST_ID = TEST.TEST_ID
                    AND STUDY.USERNAME = '$id_std'";
        $query_std = $conn->prepare($sql_std);
        $query_std->execute();
        $result_std = $query_std->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="css/user-manage-cls-std.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6 info_">
<?php
           
            echo '<div class="s_tittle"><i><a style="color: #7eb9be; text-decoration: none" href="./index.php?click=lo">Learning Outcome</a> > 
            <a style="color: #7eb9be; text-decoration: none" href="./index.php?click=lo-listStudent&id=' . $tittle .'">' . $tittle . '</a> > '.$id_std.'</i></div>';
            
            if ($row['role_id'] != 'student')
            {
                ?>
                     <div class="table-std" style="overflow: auto; height: 470px">
                <table id='list-student'>
                    <tr>
                        <td>TEST NAME</td>
                        <td>TIMES</td>
                        <td>RESULT</td>                   
                    </tr>
                    <?php
                    foreach ($result_std as $row) {
                        echo '<tr>
                            <td>' . $row["TEST_NAME"] . '</td>
                            <td>' . $row["TIMES"] . '</td>
                            <td>' . $row["POINT"] . '</td>
                            </tr>';
                    }
                   

                    ?>
                </table>
            </div>

                <?php
            }

?>
            
        </div>
    </div>

    <div class="clearfix"></div>
</div>
</div>