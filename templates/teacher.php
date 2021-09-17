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
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#teacherModal"><i class="fa fa-plus"></i>&nbsp; Add Teacher</button>
</div>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Employee Number</th>
                                    <th>Fullname</th>
                                    <th>Depertment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                         
                                            include "./includes/connection.php";
                                            $query ="SELECT * FROM teacher_table";
                                            $Statement=$conn->prepare($query);
                                            $Statement->execute();
                                            $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                                            $count=1;
                                            foreach ($row as $display){
                                                $teacher_id = $display['teacher_id'];
                                                $teacher_empNo = $display['employee_number'];
                                                $teacher_fullname = $display['teacher_fullname'];
                                                $teacher_depertment = $display['teacher_department'];
                                                
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $teacher_empNo ?></td>
                                                    <td><?php echo $teacher_fullname ?></td>
                                                    <td><?php echo $teacher_depertment ?></td> 

                                                    <td>
                                                    <a  href="assign-teacher.php?id=<?php echo $teacher_id;?>" class="btn btn-success btn-sm"  ><span class="fa fa-magic"></span>&nbsp; Assign</a>
                                                    <a  href="./includes/remove-teacher.php?id=<?php echo $teacher_id;?>" class="btn btn-danger btn-sm"  ><span class="fa fa-trash"></span>&nbsp; Remove</a>
                                                   
                                                   </td>
                                                
                                                    
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


<!-- Teacher modal -->

<div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Teacher Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="./includes/add-teacher.php">
        <div class="form-group">
        <label for="my-input">Employee Number</label>
        <input id="my-input" class="form-control" type="text" name="employee_no" required>
        </div>
     

      <div class="form-group">
        <label for="my-input">Fullname</label>
        <input id="my-input" class="form-control" type="text" name="fullname" required>
        </div>

        <div class="form-group">
        <label for="my-input">Email</label>
        <input id="my-input" class="form-control" type="email" name="email" required>
        </div>
     

      <div class="form-group">
        <label for="my-input">Deprtement</label>
        <input id="my-input" class="form-control" type="text" name="teacher_dept" required>
        </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add-teacher">
      </div>
      </form>
    </div>
  </div>
</div>


