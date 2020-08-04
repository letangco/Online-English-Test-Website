<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<style>
    td {
       border: 1px solid #f29393;
      
       text-align: center;
       padding: 10px;
    }

</style>

<?php
    $sql = 'SELECT * FROM `teacher` WHERE 1';
    $result = $conn->query($sql);
?>

<a href="./index.php?click=addTeacher&ac=add">
      <button name='btnAddTeacher'>Add new Teacher</button>
</a>
<br><br>
<div style="overflow: auto; height: 400px; width: 1140px;">
    <table>
        <tr>
            <td>USERNAME</td>
            <td>FULLNAME</td>
            <td>DOB</td>
            <td>SEX</td>
            <td>EMAIL</td>
            <td>ADDRESS</td>
            <td>PHONE</td>
            <td>CERTIFICATE</td>
            <td colspan=2>CONTROL</td>
        </tr>
    <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) //Trong khi con dong
        {
            ?>
             <tr>
                    <td><?php echo $row['USERNAME'] ?></td>
                    <td><?php echo $row['FULLNAME'] ?></td>
                    <td><?php echo $row['DOB'] ?></td>
                    <td><?php echo $row['SEX'] ?></td>
                    <td><?php echo $row['EMAIL'] ?></td>
                    <td><?php echo $row['ADDRESS'] ?></td>
                    <td><?php echo $row['PHONE'] ?></td>
                    <td><?php echo $row['CERTIFICATE'] ?></td>
                <td style='display: flex'>  
                <a href="./index.php?click=editTeacher&ac=edit&id=<?php echo $row['USERNAME']?>">
                    <button name='btnEditTeacher'>Edit</button>
                    </a>           
                </td>
                <td>
                  <button name='btnDelTeacher'>
                    <a href="./modules/teacher/controlTeacher.php?id=<?php echo $row['USERNAME']?>">
                        Delete
                    </a></button>
                </td>
             </tr>      
    <?php 
        $i++;
        } ?>
    </table>
    </div>
   
