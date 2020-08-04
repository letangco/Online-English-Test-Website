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
	<title>Add new test</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-7 info_">
            <div class="s_tittle"><i><a style="color: #7eb9be; text-decoration: none" href="./index.php?click=manage">Manage</a> >
            <a style="color: #7eb9be; text-decoration: none" href="./index.php?click=mn-test">Test</a> > Add</i></div>

            <?php
            // include('../connect.php');

            $sql = "SELECT * FROM COURSE,CLASS 
            WHERE COURSE.COURSE_ID=CLASS.COURSE_ID 
            AND CLASS.TEACHER='$username'
            GROUP BY CLASS.COURSE_ID";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
           
            <form class="form-add-test" action='site/user-right/user-manage-controlTest.php' enctype="multipart/form-data" method='POST'>
                <!---action='./modules/test/controlTest.php' -->
                <table id='tblTest'>
                    <tr>
                        <td>Test Name</td>
                        <td><input type="text" name='txtTestName' placeholder='test_name' required></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><select name="selType" id="selType">
                                <option value="">---Choose type of test---</option>
                                <option value="free">Free Test</option>
                                <option value="todo">Todo Test</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td>
                            <select name="selCourse" id="selCourse" onchange=CourseChanged(this)>
                                <option value="">---Choose course---</option>
                                <?php
                                foreach ($result as $row) {
                                    echo '<option value="' . $row["COURSE_ID"] . '">' . $row["COURSE_NAME"] . '</option>';
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
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Time limit</td>
                        <td><input type="number" name='txtTimeLimit' placeholder='ex: 30 (minutes)'></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" name='imgTest' required></td>
                    </tr>
                    <tr>
                        <td>Excel file</td>
                        <td><input type="file" name='fileExcel' required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style='font-size: 15px; padding: 5px'>Accept .xlsx file only</td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <button name='btnSubmitAdd'><strong>Submit</strong></button>
                    </tr>
                </table>
            </form>
            <script>
                function CourseChanged(obj) {
                    var value = obj.value;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "admin/modules/test/showClass_ajax_client.php",
                        data: 'string=' + value,
                        cache: false,
                        success: function(result) {
                            var html = '';
                            html += '<select name ="selClass" id="selClass">';
                            $.each(result, function(key, item) {
                                //  alert(item['CLASS_ID']);
                                html += '<option value="' + item['CLASS_ID'] + '">';
                                html += item['CLASS_NAME'];
                                html += '</option>';
                                // console.log(result); 
                            });
                            html += '</select>';
                            $('#listClass').html(html);
                        },
                        error: function(e) {
                            console.log(e.message);
                        }
                    });
                }
            </script>

        </div>

        <div class="clearfix"></div>
    </div>
</div>