
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<?php
     $sql1 = "SELECT * FROM `student` WHERE USERNAME ='$_GET[id]'";
     $sql2 = "SELECT * FROM `account` WHERE username ='$_GET[id]'";
     $result1 = $conn->query($sql1);
     $result2 = $conn->query($sql2);
     $row1 = $result1->fetch_assoc();
     $row2 = $result2->fetch_assoc();
?>
<form class="form-edit-account" action='./modules/account/controlAcc.php?id=<?php echo $row2['username'];?>' 
        enctype="multipart/form-data" method='POST'>
        <img src="modules/uploads/<?php echo $row2['AVATAR']?>" alt="avatar"
         width=250px, height=250px>
        <br>
    <table> 
        <tr colspan=2> <strong>EDIT ACCOUNT</strong> </tr>
        <tr>
            <td>ACCOUNT</td>
            <td><input  disabled type="text" name='txtUsername' value='<?php echo $row2['username']?>' required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="text" name='txtPassword' value='<?php echo $row2['PASS']?>' required></td>
        </tr>
        <tr>
        <td>ROLE</td>
        <td><select name="role" id="role">
              <option value='<?php echo $row2['role_id']?>'><?php echo $row2['role_id']?></option>
        <?php
            $sql = "SELECT `ROLE_ID` FROM `role`";
             $result = $conn->query($sql);
             while ($row = $result->fetch_assoc())
             {
                ?>
                <option value='<?php echo $row['ROLE_ID'] ?>'><?php echo $row['ROLE_ID'] ?></option>
         <?php
             }
         ?>
            </select></td>
        </tr>
        <tr>
            <td>PROFILE PICTURE</td>
            <td>
                <input type="file" name='fileAvt'>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan=2>
                <button name='btnSubmitEdit'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>
