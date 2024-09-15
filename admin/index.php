<?php
$function_url="../assets/php/functions.php";
include('./php/admin_functions.php');
if(!isset($_SESSION['admin_auth'])) header('Location:./pages/login.php');
$admin = getAdmin($_SESSION['admin_auth']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HubClub | Dashboard</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../assets/images/icon.png" alt="AdminLTELogo" height="60" width="60">
  </div>


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
 
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    
    <ul class="navbar-nav ml-auto">
      

      <li class="nav-item">
        <a class=" btn btn-sm btn-danger" href="php/admin_actions.php?logout" role="button">
          Logout
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
   
    </ul>
  </nav>


 
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="index3.html" class="brand-link">
      <img src="../assets/images/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HubClub</span>
    </a>

    <div class="sidebar">
   
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info">
          <a href="#" class="d-block"><?=$admin['full_name']?></a>
        </div>
      </div>


   

 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          <li class="nav-item">
            <a href="?dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Control Panel
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?edit_profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Edit Profile
              </p>
            </a>
          </li>
       
        </ul>
      </nav>
   
    </div>
 
  </aside>


  <div class="content-wrapper">
 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              <?php if(isset($_GET['edit_profile'])){
                echo "Edit Profile";

              }else{
                
                echo "Dashboard";
              } ?>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
        </div>
      </div>
    </div>
  

  
    <section class="content">
      <div class="container-fluid">
      
      <?php if(isset($_GET['edit_profile'])){

      }else{
        ?>
 <div class="row">
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=totalUsersCount()?></h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
         
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=totalPostsCount()?></h3>
                <p>Total Posts</p>
              </div>

              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
        
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=totalCommentsCount()?></h3>
                <p>Total Comments</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=totalLikesCount()?></h3>
                <p>Total Likes</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
         
        </div>
        <?php
      }

      ?>
       
       <div class="row">
<?php
if(isset($_GET['edit_profile'])){
?>
 <div class="card card-primary col-12">
              <div class="card-header">
                <h3 class="card-title">Edit Your Profile</h3>
              </div>
              
              <?=showError('adminprofile')?>
              <form method="post" action="php/admin_actions.php?updateprofile">
                <input type="hidden" name="user_id" value="<?=$admin['id']?>" >
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="full_name" value="<?=$admin['full_name']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email"  value="<?=$admin['email']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" value="<?=$admin['password_text']?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                
                  
                </div>
              

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
              </form>
            </div>
<?php
}else{
  ?>

            <div class="card w-100">
              <div class="card-header">
                <h3 class="card-title">User Lists</h3>
              </div>
            
              <div class="card-body">
                <?php
$userslist = getUsersList();
$count=1;
                ?>
                <table  class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#No</th>
                    <th>User</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
foreach($userslist as $user){
  ?>
   <tr>
                    <td>#<?=$count?></td>
                    <td>
                      <div class="d-flex">
                        <div>
                          <img src="../assets/images/profile/<?=$user['profile_pic']?>" class="rounded-circle border border-2 shadow-sm mx-2" width="55px" height="55px" />
                        </div>
                        <div>
                          <h5><?=$user['first_name'].' '.$user['last_name']?> - <span class="text-muted">@<?=$user['username']?></span></h5>
                          <h6 class="text-muted"><?=$user['email']?></h6>


                        </div>
</div>
                    </td>

                    <td>
                      
                     
                    <a href="./php/admin_actions.php?userlogin=<?=$user['email']?>" target="_blank" class="btn btn-success btn-sm m-1">Login User</a>
                    
                    <?php if($user['ac_status']==0): ?><button class="m-1 btn btn-warning btn-sm verify_user_btn" data-user-id="<?=$user['id']?>">Verify</button><?php endif; ?>
                     
                      
                       

                    </td>
                 
                  </tr>
  <?php
  $count++;
}
                  ?>
               
               
</tbody>
</table>
  <?php
}
?>
</div>
      
      </div>
    </section>



  <aside class="control-sidebar control-sidebar-dark">
 
  </aside>
  
</div> -->

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="plugins/chart.js/Chart.min.js"></script>

<script src="plugins/sparklines/sparkline.js"></script>

<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="dist/js/adminlte.js"></script>

<script src="dist/js/demo.js"></script>

<script src="dist/js/pages/dashboard.js"></script>
<script src="js/actions.js?v=<?=time()?>"></script>

</body>
</html>
<?php

if(isset($_SESSION['error'])){
  unset($_SESSION['error']);

}
?>