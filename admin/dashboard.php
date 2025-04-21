<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Portal System|||Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- End layout styles -->
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                        $sql1 ="SELECT * from  tblclass";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totclass=$query1->rowCount();
?>
                          <span class="report-title">Total Class</span>
                          <h4><?php echo htmlentities($totclass);?></h4>
                          <a href="manage-class.php"><span class="report-count"> View Classes</span></a>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-book-open"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php 
                        $sql2 ="SELECT * from  tblstudent";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totstu=$query2->rowCount();
?>
                          <span class="report-title">Total Students</span>
                          <h4><?php echo htmlentities($totstu);?></h4>
                          <a href="manage-students.php"><span class="report-count"> View Students</span></a>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-user"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php 
                        $sql3 ="SELECT * from  tblnotice";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totnotice=$query3->rowCount();
?>
                          <span class="report-title">Total Class Notice</span>
                          <h4><?php echo htmlentities($totnotice);?></h4>
                          <a href="manage-notice.php"><span class="report-count"> View Notices</span></a>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-doc"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <?php 
                        $sql4 ="SELECT * from  tblpublicnotice";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totpublicnotice=$query4->rowCount();
?>
                          <span class="report-title">Total Public Notice</span>
                          <h4><?php echo htmlentities($totpublicnotice);?></h4>
                          <a href="manage-public-notice.php"><span class="report-count"> View PublicNotices</span></a>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-doc"></i>
                        </div>
                      </div>
                    </div>
<hr />
  <div class="row report-inner-cards-wrapper">
                      <div class="col-md-3 col-xs report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                        $sql5 = "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'studentmsdb' AND table_name = 'tblattendance'";
$query5 = $dbh->prepare($sql5);
$query5->execute();
$tableExists = $query5->fetchColumn();

if ($tableExists) {
    $sql5 = "SELECT * from tblattendance";
    $query5 = $dbh->prepare($sql5);
    $query5->execute();
    $totalattendance = $query5->rowCount();
} else {
    $totalattendance = 0;
}
?>
                          <span class="report-title">Total Attendance Records</span>
                          <h4><?php echo htmlentities($totalattendance);?></h4>
                          <a href="manage-attendance.php"><span class="report-count"> View Attendance</span></a>
                        </div>
                        <div class="inner-card-icon bg-info">
                          <i class="icon-calendar"></i>
                        </div>
                      </div>

                      <div class="col-md-3 col-xs report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                        $sql6 = "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'studentmsdb' AND table_name = 'tblfees'";
$query6 = $dbh->prepare($sql6);
$query6->execute();
$tableExists = $query6->fetchColumn();

if ($tableExists) {
    $sql6 = "SELECT * from tblfees";
    $query6 = $dbh->prepare($sql6);
    $query6->execute();
    $totalfees = $query6->rowCount();
} else {
    $totalfees = 0;
}
?>
                          <span class="report-title">Fee Records</span>
                          <h4><?php echo htmlentities($totalfees);?></h4>
                          <a href="manage-fees.php"><span class="report-count"> View Fees</span></a>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-credit-card"></i>
                        </div>
                      </div>

                      <div class="col-md-3 col-xs report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                        $sql7 = "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'studentmsdb' AND table_name = 'tblresults'";
$query7 = $dbh->prepare($sql7);
$query7->execute();
$tableExists = $query7->fetchColumn();

if ($tableExists) {
    $sql7 = "SELECT * from tblresults";
    $query7 = $dbh->prepare($sql7);
    $query7->execute();
    $totalresults = $query7->rowCount();
} else {
    $totalresults = 0;
}
?>
                          <span class="report-title">Student Results</span>
                          <h4><?php echo htmlentities($totalresults);?></h4>
                          <a href="manage-results.php"><span class="report-count"> View Results</span></a>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-graduation"></i>
                        </div>
                      </div>

                      <div class="col-md-3 col-xs report-inner-card">
                        <div class="inner-card-text">
                           <?php 
                        $sql1 ="SELECT * from  tblhomework";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalhw=$query1->rowCount();
?>
                          <span class="report-title">Total Homeworks </span>
                          <h4><?php echo htmlentities($totalhw);?></h4>
                          <a href="manage-homeworks.php"><span class="report-count"> View Homework</span></a>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-doc"></i>
                        </div>
                      </div>
                    </div>



           
                  </div>
                </div>
              </div>
            </div>
           
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>