
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<style>
    select {
    margin: 5px;
    border: 1px solid #f29393;
    padding: 10px;
}
</style>
<?php
     $sql = "SELECT * FROM `role`";
     $result = $conn->query($sql);
?>
<form class="form-add-course" action='./modules/course/controlCourse.php' method='POST'
        enctype="multipart/form-data" >
    <table>
        <tr colspan=2> <strong>ADD NEW COURSE</strong> </tr>
        <tr>
            <td>COURSE NAME</td>
            <td><input type="text" name='txtCourseName' placeholder='course_name' required></td>
        </tr>
        <tr>
            <td>FEE</td>
            <td><input type="number" name='txtFee' placeholder='ex: 52$/month' required></td>
        </tr>
        <tr>
            <td>DESCRIPTION</td>
            <td><input type="file" name='fileDesc' accept="text/plain"></td>
        </tr>
        <tr>
            <td></td>
            <td style='font-size: 15px; padding: 5px'>Accept .txt file only</td>
        </tr>
        <tr>
            <td>BENCHMARK</td>
            <td><input type="number" step=0.01 name='txtBenchMark' placeholder='ex: 3.0' required></td>
        </tr>
        <tr>
            <td></td>
            <td colspan=2>
                <button name='btnSubmitAdd'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>
