<div class='content'>
    <?php
    if (isset($_GET['click'])) {
        $temp = $_GET['click']; // temp chứa những gì có trong biến menu

    } else {
        $temp = '';
    }
    switch ($temp) {
        case 'student':
            include('./modules/student/listStudent.php');
            break;
        case 'addStudent':
            include('./modules/student/addStudent.php');
            break;
        case 'editStudent':
            include('./modules/student/editStudent.php');
            break;
        case 'account':
            include('./modules/account/listAccount.php');
            break;
        case 'addAccount':
            include('./modules/account/addAccount.php');
            break;
        case 'editAccount':
            include('./modules/account/editAccount.php');
            break;
        case 'teacher':
            include('./modules/teacher/listTeacher.php');
            break;
        case 'addTeacher':
            include('./modules/teacher/addTeacher.php');
            break;
        case 'editTeacher':
            include('./modules/teacher/editTeacher.php');
            break;
        case 'course':
            include('./modules/course/listCourse.php');
            break;
        case 'addCourse':
            include('./modules/course/addCourse.php');
            break;
        case 'editCourse':
            include('./modules/course/editCourse.php');
            break;
        case 'class':
            include('./modules/class/listClass.php');
            break;
        case 'addClass':
            include('./modules/class/addClass.php');
            break;
        case 'editClass':
            include('./modules/class/editClass.php');
            break;
        case 'studentInClass':
            include('./modules/class/studentInClass.php');
            break;
        case 'addStdInClass':
            include('./modules/class/addStdInClass.php');
            break;
        case 'test':
            include('./modules/test/listTest.php');
            break;
        case 'addTest':
            include('./modules/test/addTest.php');
            break;
        case 'editTest':
            include('./modules/test/editTest.php');
            break;
        case 'result':
            include('./modules/result/listResult.php');
            break;
        default:
            # code...
            include('./modules/account/listAccount.php');
            break;
    }


    ?>
</div>