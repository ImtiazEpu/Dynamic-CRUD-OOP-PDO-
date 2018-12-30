<?php include "lib/Session.php";
Session::init();
?>
<?php include "inc/header.php";?>
<?php
include "lib/Database.php";
$db = new Database();
?>

<div class="content">
    <div class="container">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header" style="padding-top: 30px">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">PHP OOP & PDO Dynamic</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item active">PHP OOP & PDO Dynamic</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
$msg = Session::get('msg');
if (!empty($msg)) {
	echo $msg;
	Session::set('msg', NULL);
}
?>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Export-->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4 style="margin-right: auto!important;">Student List</h4>
                        <!-- Begin Success Modal -->
                        <button type="button" class="btn btn-gradient-04 mr-1 mb-2" data-toggle="modal" data-target="#modal-large">Add Student</button>
                        <!-- End Success Modal -->
                    </div>
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table id="export-table" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$table = "tbl_student";
$order_by = array('order_by' => 'id DESC');
/*$wherecond = array(
'where' => array('id' => '3', 'email' => 'lawrence@gmail.com'),
'return_type' => 'single',
);*/
//$limit = array('start' => '2', 'limit' => '5');
$studentData = $db->select($table, $order_by);
if (!empty($studentData)) {
	$i = 0;
	foreach ($studentData as $data) {$i++;?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['phone']; ?></td>
                                        <td class="td-actions">
                                            <a href="edit.php?id=<?php echo $data['id']; ?>"><i class="la la-edit edit"></i></a>
                                            <a href="lib/process_student.php?action=delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure to Delete')"><i class="la la-close delete"></i></a>
                                        </td>
                                    </tr>
<?php }} else {?>
    <tr><td colspan="5"><h2>No Data found...</h2></td></tr>
<?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--End Export -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->

    <!-- Add Student Modal -->
        <div id="modal-large" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <div class="widget-body">
                        <form action="lib/process_student.php" method="post" class="needs-validation" novalidate >
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Name</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-primary">
                                            <i class="la la-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Email Address *</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-primary">
                                            <i class="la la-email">@</i>
                                        </span>
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Phone Number</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-primary">
                                            <i class="la la-phone"></i>
                                        </span>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-gradient-01" type="submit" name="add">Add Student</button>
                                <button class="btn btn-shadow" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Add Student Modal -->



<?php include "inc/footer.php";?>
