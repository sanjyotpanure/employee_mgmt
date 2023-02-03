<?php 
    include 'dbcon.php';
    // code for pagination
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }

    $records_per_page = 6;
    $start_from = ($page-1)*$records_per_page;

    $pquery = " select * from employee_data limit $start_from, $records_per_page ";
    $presult = mysqli_query($con, $pquery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <?php include 'header.php' ?>
    <?php include 'links.php' ?>
    <style>
        .page-buttons{
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-top: 3%;
            margin-bottom: 2%;
            width: 100%;
        }
        .page-buttons a{
            font-weight: bold;
            color: #383d41;
            padding: 8px 16px;
            text-decoration: none; 
            
        }        
    </style>
</head>
<body>
    <div class="container" style="margin-top:30px">
        <div class="card">
            <div class="card-header text-center">
                <h4>List of Employees </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table>
                        <thead align = "center">
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Hired Date</th>
                            <th>Department</th>
                            <th>Active</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                        <?php
                        
                            while (($result = mysqli_fetch_assoc($presult))) {                       
                        ?>
                            <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><img src="./images/<?php echo $result['profile']; ?>" class='img-thumbnail' width="80px"></td>
                            <td><?php echo $result['employee_name']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['hired_date']; ?></td>
                            <td><?php echo $result['department'] ?></td>
                            <td><?php echo $result['isactive'] ?></td>
                            <td>
                            <?php
                                $currdate=date("Y-m-d");                                
                                $date_diff = abs(strtotime($currdate) - strtotime($result['hired_date']));
                                $years = floor($date_diff / (365*60*60*24));

                                if ($years >= 5 && $result['isactive']=='yes'){                                    
                                    echo '<i class="fa fa-circle" data-toggle="tooltip" 
                                    data-placement="left" title="Experience more than 5 years & Active" style=" color:#18dc2c;"></i>';
                                }
                                else if($years <= 5 && $result['isactive']=='yes'){
                                    echo '<i class="fa fa-circle" data-toggle="tooltip" 
                                    data-placement="left" title="Experience less than 5 years & Active" style=" color:#ff0000;"></i>';
                                } 
                                else {
                                    echo '<i class="fa fa-circle" data-toggle="tooltip" 
                                    data-placement="left" title="Inactive" style=" color:#ff0000;"></i>';
                                } 
                                
                            ?></td>
                            <td><a href="update_employee.php?id=<?php echo $result['id']; ?>" data-toggle="tooltip" 
                                data-placement="left" title="Edit"><i class="fa fa-edit"></i></a></td>
                            <td><a href="delete_employee.php?id=<?php echo $result['id']; ?>" data-toggle="tooltip" 
                                data-placement="left" title="Delete"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>                
                </div>
            </div>
        </div>
        <div class="page-buttons">
            <div class="pagination">
                <?php
                    $pr_query = " select * from employee_data ";
                    $pr_result = mysqli_query($con, $pr_query);
                    $total_records = mysqli_num_rows($pr_result);
                    $total_pages = ceil($total_records/$records_per_page);
                    
                    if ($page>1) {
                        echo " <a href='show_employees.php?page=".($page-1)."' class='btnPage'>Previous</a> ";
                    }
                    for ($i=1; $i < $total_pages; $i++) { 
                        echo " <a href='show_employees.php?page=".$i."' class='btnPage'>$i</a> ";
                    }
                    if ($page<$i) {
                        echo " <a href='show_employees.php?page=".($page+1)."' class='btnPage'>Next</a> ";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</html>