<?php
    include('../admin/connect.php');
    $id = $_POST["id"];
	$sql = "SELECT * FROM `question` WHERE TEST_ID = $id";
	$sql2 = "SELECT TEST_NAME FROM `test` WHERE TEST_ID = $id";
	$result = $conn->query($sql);
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
    $arrQuestion = array();
	while ($row = $result->fetch_assoc())
	{
		$arrQuestion[] = array(
            'question' => $row['CONTENT'],
			'options' => [$row['OPTION1'], $row['OPTION2'], $row['OPTION3']],
			'answer' => $row['ANSWER']
        );
    }
    echo (json_encode($arrQuestion));
   // return ($arrQuestion);
 //   echo '<p>hi</p>';
?>	