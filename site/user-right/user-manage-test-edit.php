<?php
include('admin/modules/result/connection.php');
//include('admin/connect.php');
//	session_start();
$username = $_SESSION['login'];
$test_name = $_GET['name'];
$test_id = $_GET['id'];
?>
<link rel="stylesheet" type="text/css" href="css/user-manage-cls-std.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>Edit test</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-7 info_">
            <?php
            echo '<div class="s_tittle"><i><a style="color: #7eb9be; text-decoration: none" href="./index.php?click=manage">Manage</a> >
            <a style="color: #7eb9be; text-decoration: none" href="./index.php?click=mn-test">Test</a> > Edit ' . $test_name . ' </i></div>';
            ?>

            <?php
            $sql = "SELECT * FROM COURSE,CLASS 
             WHERE COURSE.COURSE_ID=CLASS.COURSE_ID 
             AND CLASS.TEACHER='$username'
             GROUP BY CLASS.COURSE_ID";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            // include('../connect.php');
            $sql1 = "SELECT * FROM ((TEST
     INNER JOIN CLASS ON TEST.CLASS_ID = CLASS.CLASS_ID)
     INNER JOIN COURSE ON COURSE.COURSE_ID = CLASS.COURSE_ID)
                WHERE TEST.TEST_ID ='$test_id'";
            $sql2 = "SELECT * FROM `course`";
            $sql3 = "SELECT * FROM CLASS WHERE COURSE_ID IN
            (SELECT CLASS.COURSE_ID FROM ((TEST
            INNER JOIN CLASS ON TEST.CLASS_ID = CLASS.CLASS_ID)
            INNER JOIN COURSE ON COURSE.COURSE_ID = CLASS.COURSE_ID)
                       WHERE TEST.TEST_ID ='$test_id')
                       AND TEACHER = '$username'"; // tìm những lớp cùng khóa với lớp có test_id là $test_id
            $result1 = $conn->prepare($sql1);
            $result1->execute();
            $row1 = $result1->fetch(PDO::FETCH_ASSOC);
            $query3 = $conn->prepare($sql3);
            $query3->execute();
            $result3 = $query3->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <form class="form-edit-test" action='site/user-right/user-manage-controlTest.php?id=<?php echo $test_id; ?>' enctype="multipart/form-data" method='POST'>
                <table id='tblTest'>
                    <tr>
                        <td>Test Name</td>
                        <td><input type="text" name='txtTestName' placeholder='test_name' value='<?php echo $test_name; ?>' required>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><select name="selType" id="selType">
                                <option value='<?php echo $row1["TYPE"] ?>'>---Click here to change type of test---</option>
                                <option value="free">Free Test</option>
                                <option value="todo">Todo Test</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td>
                            <select name="selCourse" id="selCourse">
                                <option data-test="" value="">---Choose course---</option>
                                <?php
                                foreach ($result as $row) {
                                    echo '<option data-test="' . $test_id . '"  ';
                                    if ($row["COURSE_ID"] === $row1["COURSE_ID"]) echo 'selected="selected"';
                                    echo ' value="' . $row["COURSE_ID"] . '">' . $row["COURSE_NAME"] . '</option>';
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>
                            <div id='listClass'>
                                <select name="selClass" id="selClass">
                                    <option value="">---Choose class---</option>
                                    <?php
                                    foreach ($result3 as $row3) {
                                        echo '<option data-test="' . $test_id . '"  ';
                                        if ($row3["CLASS_ID"] === $row1["CLASS_ID"]) echo 'selected="selected"';
                                        echo ' value="' . $row3["CLASS_ID"] . '">' . $row3["CLASS_NAME"] . '</option>';
                                    }
                                    ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Time limit</td>
                        <td><input type="number" name='txtTimeLimit' value='<?php echo $row1['TIMELIMMIT']; ?>'>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" name='imgTest' accept="image/*"></td>
                    </tr>
                    <tr>
                        <td>Excel file</td>
                        <td><input type="file" name='fileExcel' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style='font-size: 15px; padding: 5px'>Accept .xlsx file only</td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <button name='btnEdit'><strong>Submit</strong></button>
                    </tr>
                </table>
            </form>
            <script>
                $(document).ready(function($) {
                    $('#selCourse').change(function(event) {
                        courseId = $('#selCourse').val();
                        testId = $('#selCourse').find(':selected').data('test');
                        $.post('site/user-right/ajax-mn-tstedit-clss.php', {
                            "courseid": courseId,
                            "testid": testId
                        }, function(data) {
                            $('#selClass').html(data);
                        })
                    })
                })
            </script>
        </div>

        <div class="clearfix"></div>
    </div>
</div>