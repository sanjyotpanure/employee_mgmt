<?php include 'dbcon.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <?php include 'links.php';
    include 'header.php'; ?>
</head>
<body>
    <div class="container addEmployee">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 addEmployee-left">
                <img src="./images/admin1.png" alt="admin pic" width="70px">
                <h3 style="font-size: 2rem; font-weight:bolder;">Welcome Admin</h3>
                <p style="font-size: 1.2rem;">Please fill all the details carefully.</p>
                <a href="show_employees.php">Check Employees List</a> <br>
            </div>
            <div class="col-lg-8 col-md-8 col-12 addEmployee-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="addEmployee-heading">Add New Employee Details</h3>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                            <div class="row addEmployee-form" align="center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 text-left">Emp. Name <span class="text-danger">*</span></label>
                                            <div class="col-md-8">    
                                                <input type="text" class="form-control" id="contact-name" placeholder="Employee name" name="name" value="" required onkeyup="validateName()">
                                                <span id="name-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row" >
                                            <label class="col-md-4 text-left">Phone No. <span class="text-danger">*</span></label>
                                            <div class="col-md-8">    
                                                <input type="tel" class="form-control" id="contact-phone" placeholder="Phone number" name="phone" value="" required onkeyup="validatePhone()">
                                                <span id="phone-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 text-left">Hired Date <span class="text-danger">*</span></label>
                                            <div class="col-md-8">    
					                            <input type="date" class="form-control" placeholder="Hired date" name="hired_date" value="" required>                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 text-left">Email Address <span class="text-danger">*</span></label>
                                            <div class="col-md-8">    
                                                <input type="email" class="form-control" id="contact-email" placeholder="Email address" name="email" value="" required onkeyup="validateEmail()">
                                                <span id="email-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 text-left">Department <span class="text-danger">*</span></label>
                                            <div class="col-md-8">    
					                            <input type="text" class="form-control" placeholder="Department" name="department" value="" required>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">                                            
                                            <label class="col-md-4 text-left">Profile Photo<span class="text-danger">*</span></label>
                                            <div class="col-md-8">    
                                                <input type="file" name="profile_image" class="form-control" value="./images/profile0.png" accept="image/*"/>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="Upload"/>
                                            </div>
				                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btnaddEmployee" name="submit" value="Add Employee" onclick="validateForm()">
                                        <span id="submit-error"></span>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>  
</body>

<?php
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $hired_date = mysqli_real_escape_string($con, $_POST['hired_date']);
        $department = mysqli_real_escape_string($con, $_POST['department']);        
   
        if (isset($_FILES['profile_image']['name'])) {
        $file_name = $_FILES['profile_image']['name'];
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        move_uploaded_file($file_tmp,"./images/".$file_name);        

        $insertquery = " INSERT INTO employee_data (employee_name, phone, email, hired_date, department, profile)  
                        VALUES('$name', '$phone', '$email', '$hired_date', '$department', '$file_name') ";
        $iquery = mysqli_query($con, $insertquery);

        if ($iquery){
            ?>
                <div class="alert alert-success alert-dismissible fade show text-center">
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Data Inserted Successfully.
                </div>
            <?php
        }else{
            ?>
                <div class="alert alert-danger alert-dismissible fade show text-center">
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Data Insertion Unsuccessful!
                </div>
            <?php
        }
       }else{
        ?>
            <div class="alert alert-danger alert-dismissible fade show text-center">
                <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong> Image uploading failed!.
            </div>
        <?php
       }
    }
   
?>

</html>