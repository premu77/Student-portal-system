<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student Portal System | Manage Fees</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container-scroller">
      <?php include_once('includes/header.php');?>
      <div class="container-fluid page-body-wrapper">
        <?php include_once('includes/sidebar.php');?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Manage Fees</h3>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Fee Records</h4>
                      <a href="add-fees.php" class="text-dark ml-auto mb-3 mb-sm-0"> Add New Fee Record</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Class</th>
                            <th class="font-weight-bold">Amount</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold">Payment Date</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql="SELECT tblfees.ID as fid,tblfees.StudentID,tblfees.ClassID,tblfees.FeesAmount,
                          tblfees.PaymentStatus,tblfees.PaymentDate,tblstudent.StudentName,tblclass.ClassName 
                          from tblfees 
                          join tblstudent on tblstudent.ID=tblfees.StudentID 
                          join tblclass on tblclass.ID=tblfees.ClassID";
                          $query = $dbh -> prepare($sql);
                          $query->execute();
                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                          $cnt=1;
                          if($query->rowCount() > 0) {
                            foreach($results as $row) { ?>
                              <tr>
                                <td><?php echo htmlentities($cnt);?></td>
                                <td><?php echo htmlentities($row->StudentName);?></td>
                                <td><?php echo htmlentities($row->ClassName);?></td>
                                <td><?php echo htmlentities($row->FeesAmount);?></td>
                                <td><?php echo htmlentities($row->PaymentStatus);?></td>
                                <td><?php echo htmlentities($row->PaymentDate);?></td>
                                <td>
                                  <a href="edit-fees.php?editid=<?php echo htmlentities($row->fid);?>" class="btn btn-primary btn-sm">Edit</a>
                                  <a href="manage-fees.php?delid=<?php echo htmlentities($row->fid);?>" onclick="return confirm('Do you really want to delete?');" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                              </tr>
                              <?php $cnt=$cnt+1;
                            }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include_once('includes/footer.php');?>
        </div>
      </div>
    </div>
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
  </body>
</html>
<?php } ?> 