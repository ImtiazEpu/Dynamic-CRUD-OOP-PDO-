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
        <!-- End Page Header -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Export-->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4 style="margin-right: auto!important;">Update Student</h4>
                        <!-- Begin Success Modal -->
                        <a href="index.php" class="btn btn-shadow mr-1 mb-2">Back</a>
                        <!-- End Success Modal -->
                    </div>
                    <div class="widget-body">
                    	<?php
$id = $_GET['id'];
$table = "tbl_student";
$wherecond = array(
	'where' => array('id' => $id),
	'return_type' => 'single',
);
$getData = $db->select($table, $wherecond);
if (!empty($getData)) {?>
        <!-- Edit Begin Large Modal -->
                    <div class="widget-body" style="padding: 140px 0px">
                        <form action="lib/process_student.php" method="post" class="needs-validation" novalidate>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Name</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-primary">
                                            <i class="la la-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="name" value="<?php echo $getData['name']; ?>" required>
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
                                        <input type="email" class="form-control" name="email" value="<?php echo $getData['email']; ?>" required>
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
                                        <input type="text" class="form-control" name="phone" value="<?php echo $getData['phone']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                            	<input type="hidden" name="id" value="<?php echo $getData['id']; ?>">
                                <button class="btn btn-gradient-01" type="submit" name="update">Update</button>
                                <button class="btn btn-shadow" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
        <!-- End Large Modal -->
<?php }?>
                    </div>
                </div>
                <!--End Export -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->



<?php include "inc/footer.php";?>