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
                                       
                                        <a  href="./includes/print-all-exam.php" class="btn btn-warning btn-sm ml-2"><i class="fa fa-print"></i>&nbsp; Print All</a>
</div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Student Report</strong>
                        
                    </div>
                    
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Student Reg.No</th>
                                    <th>Fullname</th>
                                    <th>Depertment</th>
                                    <th>Course</th>
                                    <th>Examination No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                         
                         include "./includes/connection.php";
                         $query ="SELECT * FROM student_table INNER JOIN examination_number_table USING (student_id)";
                         $Statement=$conn->prepare($query);
                         $Statement->execute();
                         $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                         $count=1;
                         foreach ($row as $display){
                             $student_id = $display['id'];
                             $student_reg_no = $display['student_reg_no'];
                             $student_fullname = $display['student_fullname'];
                             $student_dept = $display['student_dept'];
                             $student_course = $display['student_course'];
                             $exam_no = $display['exam_no'];
                             
                                 ?>
                                 <tr>
                                 <td><?php echo $student_reg_no ?></td>
                                 <td><?php echo $student_fullname ?></td>
                                 <td><?php echo $student_dept ?></td> 
                                 <td><?php echo $student_course ?></td>
                                 <td><?php echo $exam_no ?></td>                                                
                                    <td><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; View</button>
                                    <button type="button" class="btn btn-warning btn-sm ml-2"><i class="fa fa-print"></i>&nbsp; Print</button></td>
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


<!-- Student modal -->

<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Teacher Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <label for="my-input">Employee Number</label>
        <input id="my-input" class="form-control" type="file" name="">
        </div>   

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


