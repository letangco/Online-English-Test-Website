<?php
    include('admin/connect.php'); 
    $username = '';
	if (isset($_SESSION['login']))
	{
		$username = $_SESSION['login'];
	}
    $id = $_GET['id'];
  
    $sql_role = "SELECT * FROM `account` WHERE username = '$username'";
	$result_role = $conn->query($sql_role);
	$row_role = $result_role->fetch_assoc();
	$user_role ='';
	if ($row_role['role_id'] == 'admin')
	{
		$user_role ='admin';
		$sql_ = "SELECT * 
			FROM test"; 
	}
	else if ($row_role['role_id'] == 'student') {
		$sql_ = "SELECT * 
				FROM test,  study, class
				WHERE test.CLASS_ID = class.CLASS_ID 
					AND class.CLASS_ID = study.CLASS_ID
					and study.USERNAME = '$username'
				"; 
        $user_role ='student';
        $sql_check_times = "SELECT COUNT(TIMES) AS A FROM `result` WHERE USERNAME = '$username'
                        AND TEST_ID = $id
                        group by USERNAME, TEST_ID";
         $result_check_times = $conn->query($sql_check_times);
         $row_check_times = $result_check_times->fetch_assoc();
	}
	//Hien thi danh sach cai bai test ma giao vien dang day
	else if ($row_role['role_id'] == 'teacher') {
		$sql_ = "SELECT * 
				FROM test, class
				WHERE test.CLASS_ID = class.CLASS_ID 
				and TEACHER = '$username'"; 
		$user_role ='teacher';
	}

	else {
		$sql_ = "SELECT * 
				FROM test;"; 
	}
    $result_ = $conn->query($sql_);
    
    $sql = "SELECT * FROM `test` WHERE TEST_ID = $id";
    $sql2 = "SELECT COUNT(QUESTION_ID) AS A FROM `question` 
             WHERE TEST_ID = $id
             GROUP BY TEST_ID";
    $sql3 = "SELECT * FROM `class` , `study`, TEST
            WHERE class.CLASS_ID = study.CLASS_ID
            AND study.USERNAME = '$username'
            AND TEST.CLASS_ID = CLASS.CLASS_ID
            AND TEST.TEST_ID = $id";
    
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_assoc();
    $row3 = $result3->fetch_assoc();

    $class_id = $row3['CLASS_ID'];
    $sql_test_todo = "SELECT TYPE
	                    FROM `test` 
	                    WHERE test.TEST_ID = $id
                        AND TYPE = 'todo'";
    $result_test_todo = $conn->query($sql_test_todo);
    $row_test_todo = mysqli_num_rows($result_test_todo);
    $is_todo = 'free';
    if ( $row_test_todo > 0)
    {
        $is_todo = 'todo';
    }
?>
 
<link rel="stylesheet" href="./css/test-detail.css">
<link rel="stylesheet" type="text/css" href="./css/doing-test.css">
<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
<script src="./js/doing-test.js"></script>
<head>
	<title><?php echo $row['TEST_NAME'];?></title>
</head>
<div name='user_role' user_role='<?php echo $user_role ?>'></div>
<div style='display: none' name='times' value="<?php echo $row_check_times['A']?>" ></div>
<div id='test-detail' class = 'content container '>
    <div name='test' id='<?php echo $row['TEST_ID'];?>' class_id='<?php echo $row3['CLASS_ID'];?>' 
         is_todo = "<?php echo $is_todo; ?>" class="test-detail row">
        <div clas='col-md-12 text-center'>
            <h4 class="test-title " style="font-size: 20px;""><?php echo $row['TEST_NAME'];?></h4>
             
             <hr>
            <div>
              <img src="./img/clock-icon.png" alt="address">
              <p>Time limit: <span id='timelimmit' value='<?php echo $row['TIMELIMMIT'];?>'><?php echo $row['TIMELIMMIT'];?> minutes</span></p>
              <img src="./img/count-icon.png" alt="mail"><p>Questions: <span name='num_question' value='<?php echo $row2['A'];?>'><?php echo $row2['A'];?></span></p> 
             </div> 
             <div class='test-submit'>
             <!---
             <a href="./index.php?click=doing-test&id=<?php // echo $row['TEST_ID'];?>"> -->
             <button id='DoTest' class="btn btn-success" >Do test</button>
             </div>  
        </div>
    </div>
</div> 

<div id='testing' class='content' style='display: none'>
<div class='container animated fadeInDown'>
		<div class="row">
			<div id='title' class='col-md-12 text-center'>
            <h1><?php echo $row['TEST_NAME'];?></h1>
            <div>
            <span>Remaining Time:</span>
            <span id="m"> Minutes</span>: 
            <span id="s"> Secounds</span>
        </div>	
			</div>
		</div>
		<div class="row" >
			<div class="col-md-3"></div>
			<div class="col-md-6" style="background: white; border-radius: 15px">
				 <form  id="q_a"  method=POST style="overflow: auto; height: 700px" >  
                     <div name='correct_ans' value=''></div>    
  					<div name='listQuestion'  id="answers">						  
					  </div>
 					 <hr>
 					 <div class="text-center">
                          <a href="index.php?click=tempResult&id=<?php echo $row['TEST_ID']; ?>">
                            <input name='btnSubmit' id="checkResult" class="btn btn-success" 
                            type="submit" value="Submit" 
                            />
                          </a>
                      </div>
 					 <br>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
		<br>
	</div> 
</div>