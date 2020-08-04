<div class='content'>
    <?php
        if (isset($_GET['click']))
        {
            $temp = $_GET['click']; // temp chứa những gì có trong biến menu

        } else {
            $temp = '';
        }

        if ($temp == 'home') {
            include ('site/home.php');
        }
        else if ($temp == 'test')
        {
            include ('site/test-list.php');
        }
        else if ($temp == 'about'){
            include ('site/about.php');
        }
        else if ($temp == 'course'){
            include ('site/course.php');
        }
        else if ($temp == 'doing-test') {
            include ('site/doing-test.php');
        }
        else if ($temp == 'test-choosen') {
            include ('site/test-detail.php');
        }
        else if ($temp == 'info')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-info.php');
            
        }
        else if ($temp == 'editPro')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-info-edit.php');
        }
        else if ($temp == 'editPass')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-info-password.php');
        }
        else if ($temp == 'manage')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-manage.php');
        }
        else if ($temp == 'mn-class')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-manage-class.php');
        }
        else if ($temp == 'mn-test')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-manage-test.php');
        }
        else if ($temp == 'mn-detail-test')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-manage-test-detail.php');
        }
        else if ($temp == 'mn-test-edit')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-manage-test-edit.php');
        }
        else if ($temp == 'mn-test-add')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-manage-addTest.php');
        }
        else if ($temp == 'mn-listStudent')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-manage-list-std.php');
        }
        else if ($temp == 'lo')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-lo.php');
        }
        else if ($temp == 'lo-listStudent')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-lo-list-std.php');
        }
        else if ($temp == 'tempResult')
        {
            include ('site/tempResult.php');
        }
        else if ($temp == 'lo-student')
        {
            include ('site/user-left/user-menu.php');
            include ('site/user-right/user-lo-std.php');
        }
        else if ($temp == 'chart')
        {
            include ('site/user-left/user-menu.php');
            include ('site/chart.php');
        }
        else if ($temp == 'testChart')
        {
            include ('site/user-left/user-menu.php');
            include ('site/testChart.php');
        }
        else if ($temp == 'teacherChart')
        {
            include ('site/user-left/user-menu.php');
            include ('site/teacherChart.php');
        }
        else {
            include ('site/home.php');
        }
    ?>
</div>