<?php
include('admin/modules/result/connection.php');
//include('admin/connect.php');
//	session_start();
$username = $_SESSION['login'];
$test_id = $_GET['id'];
?>
<link rel="stylesheet" type="text/css" href="css/user-manage-cls-std.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>Test detail</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 info_">
            <?php
            $sql = "SELECT TEST_NAME FROM TEST WHERE TEST_ID= '$test_id'";
            $result = $conn->prepare($sql);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo '<div class="s_tittle"><i><a style="color: #7eb9be; text-decoration: none" href="./index.php?click=manage">Manage</a> >
            <a style="color: #7eb9be; text-decoration: none" href="./index.php?click=mn-test">Test</a> > ' . $test_id . ' </i></div>';
            ?>
            <center>
                <h3><?php echo $row["TEST_NAME"] ?></h3>
            </center>
            <div class="table-detail" style="margin-bottom: 10px; overflow: auto; height: 400px;">
                <?php
                // include('../connect.php');
                $sql1 = "SELECT * FROM QUESTION
                WHERE TEST_ID ='$test_id'";
                $result1 = $conn->prepare($sql1);
                $result1->execute();
                $result1 = $result1->fetchAll(PDO::FETCH_ASSOC);
                echo '<table >
                    <tr>
                        <td>QUESTION ID</td>
                        <td>CONTENT</td>
                        <td> A </td>
                        <td> B </td>
                        <td> C </td>
                    </tr>';
                foreach ($result1 as $row1) {
                    echo '<tr>
                 <td>' . $row1["QUESTION_ID"] . '</td>
                 <td>' . $row1["CONTENT"] . '</td>';
                    if ($row1["ANSWER"] == 1)
                        echo '<td><b style="color: #7eb9be;">' . $row1["OPTION1"] . '</b></td>';
                    else echo '<td>' . $row1["OPTION1"] . '</td>';
                    if ($row1["ANSWER"] == 2)
                        echo '<td><b style="color: #7eb9be;">' . $row1["OPTION2"] . '</b></td>';
                    else echo '<td>' . $row1["OPTION2"] . '</td>';
                    if ($row1["ANSWER"] == 3)
                        echo '<td><b style="color: #7eb9be;">' . $row1["OPTION3"] . '</b></td>';
                    else echo '<td>' . $row1["OPTION3"] . '</td>';
                    echo ' </tr>';
                }
                echo '</table>';
                ?>
            </div>
            <div >
                
               <?php 
               echo '<a  href="./index.php?click=mn-test-edit&ac=edit&id=' . $test_id . '&name='.$row["TEST_NAME"].'">
               <button  name="btnEditTest">Edit Test </button>
                </a>';
                ?>
                </div>
            
        </div>

        <div class="clearfix"></div>
    </div>
</div>