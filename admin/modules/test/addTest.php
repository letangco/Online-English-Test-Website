<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<style>
    select {
    margin: 5px;
    border: 1px solid #f29393;
    padding: 10px;
}
</style>
<?php
    //require_once('modules/PHPExcel/Classes/PHPExcel.php');
     $sql1 = "SELECT * FROM `test`";
     $sql3 ="SELECT * FROM `course`";
     $result1 = $conn->query($sql1);
     $result3 = $conn->query($sql3);
?>
<form class="form-add-class" method='POST' enctype="multipart/form-data" action='./modules/test/controlTest.php'>
        <!---action='./modules/test/controlTest.php' -->        
    <table id='tblTest'>
        <tr colspan=2> <strong>ADD NEW TEST</strong> </tr>
        <tr>
            <td>Created by</td>
            <td><input type="text" name='txtCreatedBy' value='admin' readonly ></td>
        </tr>
        <tr>
            <td>Test Name</td>
            <td><input type="text" name='txtTestName' placeholder='test_name' required></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><select name="selType" id="selType">
                    <option value="">---Choose type of test---</option>
                    <option value="free">Free Test</option>
                    <option value="todo">Todo Test</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Course</td>
            <td>
            <select name="selCourse" id="selCourse" onchange=CourseChanged(this)>  
                <option value="">---Choose course---</option>        
<?php
    while ($row3 = $result3->fetch_assoc())
    {
    ?>
        <option value="<?php echo $row3['COURSE_ID'];?>"><?php echo $row3['COURSE_NAME'];?></option>
 <?php
    }
    ?>
             </select></td>
        <tr>
            <td>Class</td>
            <td>
                <div id='listClass'>
                    <select name="selClass" id="selClass">
                    <option value="">---Choose class---</option>
                </div>
            </td>
        </tr>
        <tr>
            <td>Time limit</td>
            <td><input type="number" name='txtTimeLimit' placeholder='ex: 30 (minutes)'></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name='imgTest'required accept="image/*" ></td>
        </tr>
        <tr>
            <td>Excel file</td>
            <td><input type="file" name='fileExcel'  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required ></td>
        </tr>
        <tr>
            <td></td>
            <td style='font-size: 15px; padding: 5px'>Accept .xlsx file only</td>
        </tr>
        <tr>
            <td colspan=2>
            <button name='btnSubmitAdd' ><strong>Submit</strong></button>
        </tr>
    </table>
</form>

<script>
    function CourseChanged(obj)
            {
            var value = obj.value;
            $.ajax ({
                type: "POST",
                dataType: "json", 
                url: "modules/test/showClass_ajax.php",
                data: 'string=' + value, 
                cache: false,
                success: function(result)
                {                                
                   var html = '';
                     html += '<select name ="selClass" id="selClass">';
                    $.each(result, function (key, item)
                    {
                      //  alert(item['CLASS_ID']);
                        html += '<option value="' + item['CLASS_ID'] + '">';
                        html += item['CLASS_NAME'];
                        html += '</option>'; 
                       // console.log(result); 
                    });  
                        html += '</select>';
                    $('#listClass').html(html);                      
                },
                    error: function (e) {
                        console.log(e.message);
                    }
              });  
            }
/*  function AddQuestion() {
        
        $('#tblQues').show();
        var num_ques = $('input[name="txtQuestions"]').val();
       // alert(num_ques);
        $.ajax({
            type: "POST",
            url: "modules/test/addQuestions_ajax.php",
            data: 'string=' + num_ques,
            dataType: "json",
            cache: false,
            success: function (response) {
                var html = '';
                for (i=0; i < response; i++)
                {
                    html += '<tr>';
                        html += '<td>Question ' + (i+1);
                        html += '</td>';
                        html += '<td><input type="text" placeholder="Question content" name ="ques' 
                                + (i+1) + '"' +'></td>';
                        html += '<td><input type="text" placeholder="Option 1" name="opt1ans' 
                                + (i+1) +'"' +'></td>';
                        html += '<td><input type="text" placeholder="Option 2" name="opt2ans' 
                                + (i+1) +'"' +'></td>';
                        html += '<td><input type="text" placeholder="Option 3" name="ans' 
                                + (i+1) +'"' +'></td>';
                        html += '<td><input type="number" min="1" max="3" placeholder="index of correct answer" name="index'
                                + (i+1) +'"></td></tr>';
                }        
                    $('#tblQues').html(html);                     
                },
                    error: function (e) {
                        console.log(e.message);
            }
        });
    }

    var arrQuestion = [];
    var num_ques = $('input[name="txtQuestions"]').val();
    for (i=0 ; i < num_ques; i++)
    {
        var question = {content:'', option: [], answer:''};
        question.content = $('input[name="ques'+(i+1)+'"]').val();
        question.option = [$('input[name="ans'+(i+1)+'opt1"]').val(), 
                            $('input[name="ans'+(i+1)+'opt2"]').val(),
                            $('input[name="ans'+(i+1)+'opt3"]').val()];
        question.answer = $('input[name="index'+(i+1)+'"]').val();
        arrQuestion.push(question);
    } 
   var postData = JSON.stringify(arrQuestion);
        console.log(postData);      
    $.ajax({
        type: "POST",
        url: "modules/test/controlTest.php",
        data: 'string = ' + postData,
        dataType:"text",
        cache: false,        
        success: function (response) {
                  //    alert(response);
                 },
    });
  //  console.log(postData);
  */
</script>