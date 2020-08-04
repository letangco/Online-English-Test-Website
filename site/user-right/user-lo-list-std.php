<?php
include('admin/modules/result/connection.php');
//include('admin/connect.php');
//	session_start();
$tittle = $_GET['id'];
$username = $_SESSION['login'];
$sql_role = "SELECT * FROM `account` WHERE username = '$username'";
$query_role = $conn->prepare($sql_role);
$query_role->execute();
$result_role = $query_role->fetch(PDO::FETCH_ASSOC);

$sql_std = "SELECT * FROM STUDY, RESULT, TEST
                    WHERE STUDY.CLASS_ID='$tittle' 
                    AND STUDY.USERNAME = RESULT.USERNAME
                    AND RESULT.TEST_ID = TEST.TEST_ID
                    and study.CLASS_ID = test.CLASS_ID
                    AND STUDY.USERNAME='$username'";
$query_std = $conn->prepare($sql_std);
$query_std->execute();
$result_std = $query_std->fetchAll(PDO::FETCH_ASSOC);

?>
<link rel="stylesheet" type="text/css" href="css/user-manage-cls-std.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title><?php echo $tittle ?></title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6 info_">
            <?php

            echo '<div class="s_tittle"><i><a style="color: #7eb9be; text-decoration: none" href="./index.php?click=lo">Learning Outcome</a> > ' . $tittle . '</i></div>';

            if ($row['role_id'] == 'student') {
            ?>
                <div style="padding: 15px"><a target="_blank" href='index.php?click=testChart&id=<?php echo $tittle ?>'>View in chart</a></div>
                <div class="table-std" style="overflow: auto; height: 400px">
                    <table id='list-student'>
                        <tr>
                            <td>TEST NAME </td>
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
            } else {
            ?>
                <div style="padding: 15px"><a target="_blank" href='index.php?click=teacherChart&id=<?php echo $tittle ?>'>View in chart</a></div>
                <div class="table-std">
                    <table id='list-student'>
                        <tr>
                            <td>USERNAME</td>
                            <td>FULL NAME</td>
                            <td>RESULT</td>
                            <td>RANK</td>
                        </tr>

                        <?php
                        include('admin/modules/result/connection.php');
                        $sql = "SELECT * FROM STUDY,STUDENT 
                    WHERE STUDY.CLASS_ID='$tittle' 
                    AND STUDY.USERNAME=STUDENT.USERNAME";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row) {
                            echo '<tr>
                            <td><a href=./index.php?click=lo-student&id-std=' . $row["USERNAME"] . '&id-class=' . $tittle . '>' . $row["USERNAME"] . '</td>
                            <td>' . $row["FULLNAME"] . '</td>
                            <td>' . $row["RESULT"] . '</td>
                            <td>' . $row["RANK"] . '</td>
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