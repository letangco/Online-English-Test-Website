<?php
include('admin/connect.php');
//session_start();
?>
<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="./css/header.css">
<style>
  
    .banner  p
    {
        max-width: max-content;
        font-size: 15px;
        margin-top: 30px;
        margin-left: 400px;
    }
</style>
<script src="./js/header.js"></script>
<header style="padding: 40px">
  <div class="row banner">
    <div class="col-md-3"><img src="./img/banner.png"></div>
    <div class="col-md-6">
      <h1>English Online</h1>
      <p>Tel: ( 84 -28 ) 3824 5618<br>Email: adm@vnseameo.org</p>
    </div>
    <div class="col-md-1">
      <a id='tempResult' href='./index.php?click=tempResult' class="btn btn-outline-dark btn-rounded">Result</a>
    </div>

    <?php
    if (isset($_SESSION['login'])) {
      ?>
      <div id='signed' class="col-md-2">
        <a id='btnLogin' href='./index.php?click=info&username=<?php echo $_SESSION['login']; ?>' class="btn btn-outline-dark btn-rounded"><?php echo $_SESSION['login']; ?></a>
      </div>
    <?php
    } else {
      ?>
      <div id='signed' class="col-md-2">
        <a id='btnLogin' class="btn btn-outline-dark btn-rounded" data-toggle="modal" data-target="#modalLoginForm">Login</a>
      </div>
    <?php
    }
    ?>

  </div>
  </div>
  <div class="row">
  </div>
  <div class="modal fade" id="modalLoginForm" style='display:none'>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <img src="./img/avt.png">
          <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
          <button id='close' type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <form class="form" method='POST'>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter uername" required value="">
              <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" required value="">
            </div>
            <div class="text-center">
              <button aria-hidden="true" class="btn btn-dark" id="btnSubmit" data-dismiss="modal" aria-label="Close">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>