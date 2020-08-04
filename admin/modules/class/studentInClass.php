
<style>
    td {
       border: 1px solid #f29393;
       max-width : max-content;
       text-align: center;
        padding: 8px;
    }
    
</style>
 
<?php 
$classid = $_GET['id'];
    $sql = "SELECT STUDENT.USERNAME, STUDENT.FULLNAME  FROM STUDY, STUDENT 
    WHERE STUDY.USERNAME=STUDENT.USERNAME
    AND STUDY.CLASS_ID = '$classid'";
    $sql1 = "SELECT COUNT(USERNAME) AS NUMBER_OF_STD FROM STUDY
    WHERE CLASS_ID = '$classid'";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
?>
<strong> STUDENT LIST OF <?php echo $classid ?> </strong>
<br><br>
<div class='list-std' style="overflow: auto; height: 400px">
    <table>
        
        <tr>
            <td>USERNAME</td>
            <td>FULL NAME</td>
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
          
                <td>
                  <button name='btnDelStudent'>
                    <a href="modules/class/addStudentIntoClass.php?acc=del&id=<?php echo $classid ?>&username=<?php echo $row['USERNAME']?>">
                        Delete
                    </a></button>
            </td>
        </tr> 
        <?php 
        $i++;
        } ?>     
        <tr>
            <td colspan=4>NUMBER OF STUDENT: <?php echo $row1['NUMBER_OF_STD'] ?> </td>
        </tr>
    </table>
    <a href="./index.php?click=addStdInClass&id=<?php echo $classid ?>">
      <button name='btnAddStudent'>ADD NEW STUDENT</button>
</div>
    <br><br>
   
</a>


   
