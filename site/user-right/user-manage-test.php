<?php
include('admin/modules/result/connection.php');
//include('admin/connect.php');
//	session_start();
$username = $_SESSION['login'];

?>
<link rel="stylesheet" type="text/css" href="css/user-manage-cls-std.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>Manage Test</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 info_">
            <div class="s_tittle"><i><a style="color: #7eb9be; text-decoration: none" href="./index.php?click=manage">Manage</a> > Test</i></div>

            <div class="choose">
                <label for="">Course</label>
                <select name="course" id="course">
                    <option data-tchr="" value="">--choose course--</option>
                    <?php
                    $sql = "SELECT * FROM COURSE,CLASS 
                    WHERE COURSE.COURSE_ID=CLASS.COURSE_ID 
                    AND CLASS.TEACHER='$username'
                    GROUP BY CLASS.COURSE_ID";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option data-tchr="' . $username . '" value="' . $row["COURSE_ID"] . '">' . $row["COURSE_NAME"] . '</option>';
                    }
                    ?>
                </select>
                <label for="">Class</label>
                <select name="class" id="class">
                    <option value="">--choose class--</option>
                </select>
            </div>
            <a href="./index.php?click=mn-test-add&ac=add">
                <button name='btnAddTest'>ADD NEW TEST</button>
            </a><br><br>
            <div id="list-test" class="listTest" style="margin-bottom: 10px; overflow: auto; height: 350px;">
                <table>
                    <tr>
                        <td>TEST ID</td>
                        <td>TEST NAME</td>
                        <td>IMG</td>
                        <td>CLASS ID</td>
                        <td>TIME LIMIT</td>
                        <td colspan=2>CONTROL</td>
                    </tr>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function($) {
                $('#course').change(function(event) {
                    courseId = $('#course').val();
                    teacherId = $('#course').find(':selected').data('tchr');
                    $.post('site/user-right/ajax-mn-tst-clss.php', {
                        "courseid": courseId,
                        "teacherid": teacherId
                    }, function(data) {
                        $('#class').html(data);
                    })
                })
                $('#course').change(function(event) {
                    courseId = $('#course').val();
                    teacherId = $('#course').find(':selected').data('tchr');
                    $.post('site/user-right/ajax-mn-test.php', {
                        "courseOrClass": courseId,
                        "teacherid": teacherId
                    }, function(data1) {
                        $('#list-test').html(data1);
                    })
                })
                $('#class').change(function(event) {
                    classId = $('#class').val();
                    teacherId = $('#course').find(':selected').data('tchr');
                    $.post('site/user-right/ajax-mn-test.php', {
                        "courseOrClass": classId,
                        "teacherid": teacherId
                    }, function(data1) {
                        $('#list-test').html(data1);
                    })
                })

            })
        </script>
    </div>

    <div class="clearfix"></div>
</div>
</div>