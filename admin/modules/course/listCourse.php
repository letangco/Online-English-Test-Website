<style>
    td {
       border: 1px solid #f29393;
       max-width = max-content;
       text-align: center;
        padding: 8px;
    }
</style>
 
<?php 
    $sql = 'SELECT * FROM `course` WHERE 1';
    $result = $conn->query($sql);
?>
<a href="./index.php?click=addCourse&ac=add">
      <button name='btnAddCourse'>ADD NEW COURSE</button>
</a><br><br>
<div class='course-info'></div>
    <table>
        <tr>
            <td>COURSE_ID</td>
            <td>COURSE_NAME</td>
            <td>FEE</td>
            <td>DESCRIPTION</td>
            <td>BENCHMARK</td>
            <td colspan=2>CONTROL</td>
        </tr>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) //Trong khi con dong
        {
            ?>
        <tr>
            <td><?php echo $row['COURSE_ID'] ?></td>
            <td><?php echo $row['COURSE_NAME'] ?></td>
            <td><?php echo $row['FEE'] ?></td>
            <td><?php echo $row['DESCRIPTION'] ?></td>
            <td><?php echo $row['BENCHMARK'] ?></td>
            <td style='display: flex'>  
                <a href="./index.php?click=editCourse&ac=edit&id=<?php echo $row['COURSE_ID']?>">
                    <button name='btnEditStudent'>Edit</button>
                    </a>                 
                </td>
                <td>
                  <button name='btnDelStudent'>
                    <a href="./modules/course/controlCourse.php?id=<?php echo $row['COURSE_ID']?>">
                        Delete
                    </a></button>
            </td>
        </tr> 
        <?php 
        $i++;
        } ?>     
    </table>

   
