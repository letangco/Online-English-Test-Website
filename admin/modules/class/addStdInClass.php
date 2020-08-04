<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<style>
    td {
        margin: 5px;
        border: 1px solid #f29393;
        padding: 10px;
    }
</style>
<?php
$classid = $_GET['id'];

$sql1 = "SELECT * FROM STUDENT WHERE USERNAME NOT IN (
        SELECT STUDY.USERNAME FROM STUDY,CLASS
        WHERE STUDY.CLASS_ID = CLASS.CLASS_ID
        AND (CURRENT_DATE >= CLASS.BEGIN
        AND CURRENT_DATE <= CLASS.END)
        OR STUDY.CLASS_ID = '$classid')";

$result1 = $conn->query($sql1);

?>
<script>
    var arrayStd_checked = [];
</script>
<strong value="<?php echo $classid ?>"> ADD NEW STUDENT(S) INTO <?php echo $classid ?> </strong>
<br><br>
<form >
    <div style="overflow: auto; height: 400px; max-width: max-content">
    <table >
        <tr>
            <td>CHOOSE</td>
            <td>USERNAME</td>
            <td>FULL NAME</td>
        </tr>
        <?php
        $i = 0;
        foreach ($result1 as $row1) {
            ?>
            
            <tr>
                <td>
                    <input type="checkbox" name="username" id="<?php echo $row1['USERNAME'] ?>">
                </td>
                <td><?php echo $row1['USERNAME'] ?></td>
                <td><?php echo $row1['FULLNAME'] ?></td>
            </tr>
            <?php
                ?>
        <?php
        }
        ?>
    </table>
    </div>
    <br><br>
        <button name='btnAddStudent'><a href="./index.php?click=studentInClass&id=<?php echo $classid ?>">
        Submit</a></button>
         
</form>

<script>
    $(document).ready(function() {
        var class_id = $('strong').attr('value');
        $('button[name="btnAddStudent"]').on("click", function() {
            var $checkbox = $('input:checked');
            $checkbox.each(function() {
                var value = $(this).attr('id');
                arrayStd_checked.push(value);
            })
            console.log(arrayStd_checked);

            $.ajax({
                type: "POST",
                url: "./modules/class/addStudentIntoClass.php",
                data: {
                    "arrayStd_checked": JSON.stringify(arrayStd_checked),
                    "class_id": class_id
                },
                success: function(response) {
                  //  alert(response);
                    window.location="./index.php?click=studentInClass&id=<?php echo $classid ?>";
                   
                }
               
                
            });
            alert('Successfully');  
        })

    })
</script>