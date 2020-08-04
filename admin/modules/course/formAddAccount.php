
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<style>
    select {
    margin: 5px;
    border: 1px solid #f29393;
    padding: 10px;
}
td {
    border: 1px solid #f29393;
    
    padding: 5px;
    max-width: max-content;
    }
</style>
<script>
function addAccount()
{
  //  $('#account-info').hide();
    //$('#account-info').append('<p>ahihi</p>');
    $('#form-add-account').toggle();
}

function SubmitAdd()
{
    var username = $('input[name="txtAccount"]').val(),
        password = $('input[name="txtPassword"]').val(),
        createDate = $('input[name="txtCreateDate"]').val(),
        ava = $('input[name=fileAvt]')[0].files[0].name;
    var data = 'username1='+ username + '&password1='+ password + 
                '&createDate1='+ createDate + '&avt1=' + ava;
                $.ajax({
        type: "POST",
        url: "testAjax.php",
        data: data,
        cache: false,
        success: function(result){
                alert(result);
            }
});

}
</script>
<?php
  
    include('../connect.php');
    //Luu file duoc upload vao thu muc uploads
    $sql = "SELECT * FROM `role`";
    $result = $conn->query($sql);
    $sql2 = 'SELECT * FROM `account` WHERE 1';
    $result2 = $conn->query($sql2);
?>

<div class='container'>
    <div class= row>
        <br>
        <button name='btnAddAccount' onclick = 'addAccount()'>Add new Account</button>
    </div>
    <div class = row>
        <div class='col-md-6 account-info' id='account-info'>
             <br><br>
               <table>
                <tr>
                    <td>USERNAME</td>
                    <td>PASS</td>
                    <td>ROLE ID</td>
                    <td>CREATE DATE</td>
                    <td>AVATAR</td>
                    <td>CONTROL</td>
                </tr>
        <?php
        $i = 0;
        while ($row2 = $result2->fetch_assoc()) //Trong khi con dong
        {
            ?>
        <tr>
            <td><?php echo $row2['username'] ?></td>
            <td><?php echo $row2['PASS'] ?></td>
            <td><?php echo $row2['role_id'] ?></td>
            <td><?php echo $row2['create_date'] ?></td>
            <td><img src="../../modules/uploads/<?php echo $row2['AVATAR']?>" alt="avatar" width=70px, height=70px></td>
            <td>   
                 <button  name='btnEditStudent'>Edit</button>
            </td>
        </tr> 
        <?php 
        $i++;
        } ?>     
             </table>          
        </div>
    <div class = col-md-1>
        <span></span>
    </div>
    <div class = col-md-5>
        <br>
    <form class="form-add-account" id="form-add-account" method='POST' action='saveImg.php'
        enctype="multipart/form-data" style='display: none;'>
    <table>
        <tr colspan=2> <strong>ADD NEW ADMIN</strong> </tr>
        <tr>
            <td>ACCOUNT</td>
            <td><input type="text" name='txtAccount' placeholder='admin_name' required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="password" name='txtPassword' placeholder='123456'></td>
        </tr>
        <tr>
            <td>CREATE DATE</td>
            <td><input type="date" name='txtCreateDate'></td>
        </tr>
        <tr>
            <td>PROFILE PICTURE</td>
            <td><input type="file" name='fileAvt'>
            <P
        </td>
        </tr>
        <tr>
            <td></td>
            <td colspan=2>
                <button name='btnSubmitAdd' onclick='SubmitAdd()'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>

    </div>

</div>


</div>


