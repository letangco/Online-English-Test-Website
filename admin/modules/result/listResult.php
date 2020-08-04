<style>
    td {
       border: 1px solid #f29393;
       max-width = max-content;
       text-align: center;
        padding: 8px;
    }
    table{
        margin: 20px;

    }
</style>
<div class="choose">
    <label for="">Course</label>
    <select name="course" id="course">
        <option value="">--choose course--</option>
        <?php
            include('modules/result/connection.php');
            $sql = "SELECT * FROM COURSE";
            $query = $conn -> prepare($sql);
            $query -> execute();
            $result = $query -> fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row ) {
                echo '<option value="'.$row["COURSE_ID"].'">'.$row["COURSE_NAME"].'</option>';
            }
        ?>
    </select>
    <label for="">Class</label>
    <select name="class" id="class">
        <option value="">--choose class--</option>
    </select>
    <label for="">Test</label>
    <select name="test" id="test">
        <option value="">--choose test--</option>
    </select>
    
</div>
<div class='result-info'></div>
    <table id='list-result'>
       
    </table>   
        
</div>        
    <script>
        $(document).ready(function ($) {
            $('#course').change(function (event) {
                courseId = $('#course').val();
                $.post('modules/result/class_ajax.php', {"courseid":courseId}, function(data) {
                    $('#class').html(data);
                })
            })
            $('#class').change(function (event) {
                classId = $('#class').val();
                $.post('modules/result/test_ajax.php', {"classid":classId}, function(data) {
                    $('#test').html(data);
                })
            })
            $('#class').change(function (event) {
                classId = $('#class').val();
                $.post('modules/result/ShowTestClass_ajax.php', {"classid":classId}, function(data) {
                    $('#list-result').html(data);
                })
            })
            
            $('#test').change(function (event) {
                testId = $('#test').val();
                $.post('modules/result/showTest_ajax.php', {"testid":testId}, function(data) {
                    $('#list-result').html(data);
                })
            })
        })
    </script>