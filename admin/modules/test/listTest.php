<style>
    td {
       border: 1px solid #f29393;
       max-width : max-content;
       text-align: center;
        padding: 8px;
    }
</style>
 
<?php 
    $sql = 'SELECT * FROM `test` WHERE 1';
    $result = $conn->query($sql);
?>
<a href="./index.php?click=addTest&ac=add">
      <button name='btnAddTest'>ADD NEW TEST</button>
</a><br><br>
<div class='test-info' style="overflow: auto; height: 500px; width: 1000px;" >
    <table>
        <tr>
            <td>TEST ID</td>
            <td>TEST NAME</td>
            <td>IMG</td>
            <td>CLASS ID</td>
            <td>TIME LIMIT</td>
            <td>CREATED BY</td>
            <td colspan=2>CONTROL</td>
        </tr>
        <?php
        $i = 0;
        while ($row = $result->fetch_assoc()) //Trong khi con dong
        {
            ?>
        <tr>
            <td><?php echo $row['TEST_ID'] ?></td>
            <td><?php echo $row['TEST_NAME'] ?></td>
            <td><?php echo $row['IMG'] ?></td>
            <td><?php echo $row['CLASS_ID'] ?></td>
            <td><?php echo $row['TIMELIMMIT'] ?> minutes </td>
            <td><?php echo $row['USERNAME'] ?></td>
            
            <td style='display: flex'>  
                <a href="./index.php?click=editTest&ac=edit&id=<?php echo $row['TEST_ID']?>">
                    <button name='btnEditTest'>Edit</button>
                    </a>                 
                </td>
                <td>
                  <button name='btnDelTest'>
                    <a href="./modules/test/controlTest.php?id=<?php echo $row['TEST_ID']?>">
                        Delete
                    </a></button>
            </td>
        </tr> 
        <?php 
        $i++;
        } ?>     
</table>
</div>
   
