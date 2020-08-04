
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<?php
     $sql1 = "SELECT * FROM `teacher` WHERE USERNAME ='$_GET[id]'";
     $sql2 = "SELECT * FROM `account` WHERE username ='$_GET[id]'";
     $result1 = $conn->query($sql1);
     $result2 = $conn->query($sql2);
     $row1 = $result1->fetch_assoc();
     $row2 = $result2->fetch_assoc();
     $date= $row1['DOB'];
     $newdate = date("Y-m-d", strtotime($date)); 
?>
<script>
    $(document).ready(function (){
        if ('<?php echo $row1['SEX']?>' === 'male')
        {
            $('#male').prop('checked',true);
        }
        else {
     
            $('#female').prop('checked',true);
        }
    })
</script>

<form class="form-edit-student" action='./modules/teacher/controlTeacher.php?id=<?php echo $row1['USERNAME'];?>' method='POST'
enctype="multipart/form-data" >
    <img src="modules/uploads/<?php echo $row2['AVATAR']?>" alt="avt" width=200px, height=200px>
    <table>
        <tr colspan=2> <strong>EDIT TEACHER</strong> </tr>
        <tr>
            <td>ACCOUNT</td>
            <td><input  readonly type="text" name='txtAccount' value='<?php echo $row1['USERNAME']?>' required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="text" name='txtPassword' value='<?php echo $row2['PASS']?>' required></td>
        </tr>
        <tr>
            <td>PROFILE PICTURE</td>
            <td>
                <input type="file" name='fileAvt'>
            </td>
        </tr>
        <tr>
            <td>FULLNAME</td>
            <td><input type="text" name='txtFullname' value='<?php echo $row1['FULLNAME']?>' ></td>
        </tr>
        <tr>
            <td>Date of birth</td>
            <td><input type="date" name='txtDob' value='<?php echo $newdate ?>'></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td>
                <label for="female"><input type="radio" name='rbSex' id='female' value='female'>Female</label>
                <label for="male"><input type="radio" name='rbSex' id='male' value='male'>Male</label>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name='txtEmail' value='<?php echo $row1['EMAIL']?>'></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name='txtAddr' value='<?php echo $row1['ADDRESS']?>'></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="number" name='txtPhone' value='<?php echo $row1['PHONE']?>'></td>
        </tr>
        <tr>
            <td>Certificate</td>
            <td><input type="text" name='txtCerti' value='<?php echo $row1['CERTIFICATE']?>'></td>
        </tr>
        <tr>
            <td></td>
            <td colspan=2>
                <button name='btnSubmitEdit'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>
