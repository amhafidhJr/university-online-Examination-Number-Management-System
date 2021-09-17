<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
           

        <div class="col-sm-5">
            

            

        </div>
    </div>

</header><!-- /header -->
<!-- Header-->

<div class="breadcrumbs">
    
</div>

<div class="content mt-3">

    <div class="col-sm-12">
        
    </div>


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        
            <div class="col-md-12">
            <div class="card-body">
                                       
            <a  href="./includes/print-all-teacher.php" class="btn btn-warning btn-sm ml-2"><i class="fa fa-print"></i>&nbsp; Print All</a>
</div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Student Report</strong>
                        
                    </div>
                    
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Employee Number</th>
                                    <th>Fullname</th>
                                    <th>Depertment</th>
                                    <th>Assigned Class</th>
                                    <th>Assigned Time</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                         
                         include "./includes/connection.php";
                         $query ="SELECT * FROM teacher_table INNER JOIN teacher_assigned_details USING (teacher_id)";
                         $Statement=$conn->prepare($query);
                         $Statement->execute();
                         $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                         $count=1;
                         foreach ($row as $display){
                             $teacher_id = $display['teacher_id'];
                             $teacher_empNo = $display['employee_number'];
                             $teacher_fullname = $display['teacher_fullname'];
                             $teacher_depertment = $display['teacher_department'];
                             $assigned_class = $display['assigned_class'];
                             $assigned_time = $display['assigned_time'];
                             
                                 ?>
                                 <tr>
                                 <td><?php echo $teacher_empNo ?></td>
                                 <td><?php echo $teacher_fullname ?></td>
                                 <td><?php echo $teacher_depertment ?></td> 
                                 <td><?php echo $assigned_class ?></td>
                                 <td><?php echo $assigned_time ?></td>                                                
                                    
                                </tr>
                                <?php  
                     
                    }
                ?> 
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->




