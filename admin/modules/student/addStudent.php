
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<style>
    select {
    margin: 5px;
    border: 1px solid #f29393;
    padding: 10px;
}
</style>
<form class="form-add-student" action='./modules/student/control.php' method='POST'
        enctype="multipart/form-data" >
    <table>
        <tr colspan=2> <strong>ADD NEW STUDENT</strong> </tr>
        <tr>
            <td>ACCOUNT</td>
            <td><input type="text" name='txtAccount' placeholder='std_ngocmn' required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="password" name='txtPassword' placeholder='123456' required></td>
        </tr>

      
        <tr>
            <td>PROFILE PICTURE</td>
            <td><input type="file" name='fileAvt'></td>
        </tr>
        <tr>
            <td>FULL NAME</td>
            <td><input type="text" name='txtFullname' placeholder='Nguyen Van A'></td>
        </tr>
        <tr>
            <td>Date of birth</td>
            <td><input type="date" name='txtDob'></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td>
                <label for="female"><input type="radio" name='rbSex' id='female' value='female' checked>Female</label>
                <label for="male"><input type="radio" name='rbSex' id='male' value='male'>Male</label>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name='txtEmail' placeholder='example@gmail.com'></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name='txtAddr' placeholder='HCM City'></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="number" name='txtPhone' placeholder='012345686'></td>
        </tr>
        <tr>
            <td></td>
            <td colspan=2>
                <button name='btnSubmitAdd'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>
