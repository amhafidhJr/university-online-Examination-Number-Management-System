<?php
require_once("includes/connection.php");
                            $userInfo=$_SESSION['userName'];

                            $sqlQuery = "SELECT * FROM student_table INNER JOIN user_login USING (student_reg_no) WHERE student_reg_no = '$userInfo'";
                            $statement = $conn->prepare($sqlQuery);
                            $statement->execute();
                            $result = $statement->fetchAll();

                            if($result == true) {
                              
                              
                              foreach ($result as $photo) {
                                  
								  $fullname = $photo["student_fullname"];
								  $course = $photo["student_course"];
                              }
                             }
                                  
?>


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

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> login Success.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>


    <div class="col-sm-6 ">
    <div class="card ml-auto mr-auto">
  <div class="card-body">
    <h5 class="card-title">Student Details</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Reg No: <b class="ml-5"><?php echo $userInfo; ?></b> </li>
    <li class="list-group-item">Fullname: <b class="ml-5"><?php echo $fullname; ?></b></li>
    <li class="list-group-item">Course: <b class="ml-5"><?php echo $course; ?></b></li>
  </ul>
</div>
        </div>
    </div>
    <!--/.col-->

    



</div> <!-- .content -->
</div><!-- /#right-panel -->