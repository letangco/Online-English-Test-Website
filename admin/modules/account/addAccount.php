
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
<form class="form-add-account" action='./modules/account/controlAcc.php' method='POST'
        enctype="multipart/form-data" >
    <table>
        <tr colspan=2> <strong>ADD NEW ADMIN</strong> </tr>
        <tr>
            <td>ACCOUNT</td>
            <td><input type="text" name='txtAccount' placeholder='admin_name' required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="password" name='txtPassword' placeholder='123456' required></td>
        </tr>
        
<?php
      //  while($row = $result->fetch_assoc())
 //       {
    ?>
            <option value="<?php //echo $row['ROLE_ID'];?>"><?php //echo $row['ROLE_ID'];?></option>
<?php
      //  }
    ?>
       
        <tr>
            <td>PROFILE PICTURE</td>
            <td><input type="file" name='fileAvt'></td>
        </tr>
        <tr>
            <td></td>
            <td colspan=2>
                <button name='btnSubmitAdd'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>
