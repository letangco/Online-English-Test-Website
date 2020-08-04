<link rel="stylesheet" type="text/css" href="css/user-manage-cls-std.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>List students</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 info_">
            <?php
            $tittle = $_GET['id'];
            echo '<div class="s_tittle"><i><a style="color: #7eb9be; text-decoration: none" href="./index.php?click=manage">Manage</a> >
            <a style="color: #7eb9be; text-decoration: none" href="./index.php?click=mn-class">Class</a> > ' . $tittle . '</i></div>';
            ?>
            <div class="table-std" style="overflow: auto; height: 500px;">
                <table id='list-student'>
                    <tr>
                        <td>USERNAME</td>
                        <td>FULL NAME</td>
                        <td>DATE OF BIRTH</td>
                        <td>GENDER</td>
                        <td>E-MAIL</td>
                        <td>ADDRESS</td>
                        <td>PHONE NUMBER</td>
                    </tr>

                    <?php
                    include('admin/modules/result/connection.php');
                    $sql = "SELECT * FROM STUDY,STUDENT WHERE STUDY.CLASS_ID='$tittle' AND STUDY.USERNAME=STUDENT.USERNAME";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<tr>
                            <td>' . $row["USERNAME"] . '</td>
                            <td>' . $row["FULLNAME"] . '</td>
                            <td>' . $row["DOB"] . '</td>
                            <td>' . $row["SEX"] . '</td>
                            <td>' . $row["EMAIL"] . '</td>
                            <td>' . $row["ADDRESS"] . '</td>
                            <td>' . $row["PHONE"] . '</td>
                            </tr>';
                    }

                    ?>
                </table>


            </div>


        </div>
        <script>
            $(document).ready(function($) {
                $('#course').change(function(event) {
                    courseId = $('#course').val();
                    teacherId = $('#course').find(':selected').data('tchr');
                    $.post('site/user-right/ajax-mn-class.php', {
                        "courseid": courseId,
                        "teacherid": teacherId
                    }, function(data) {
                        $('#list-class').html(data);
                    })
                })
                // $('#class').change(function(event) {
                //     classId = $('#class').val();
                //     $.post('modules/result/test_ajax.php', {
                //         "classid": classId
                //     }, function(data) {
                //         $('#test').html(data);
                //     })
                // })
                // $('#class').change(function(event) {
                //     classId = $('#class').val();
                //     $.post('modules/result/ShowTestClass_ajax.php', {
                //         "classid": classId
                //     }, function(data) {
                //         $('#list-result').html(data);
                //     })
                // })

            })
        </script>
    </div>

    <div class="clearfix"></div>
</div>
</div>