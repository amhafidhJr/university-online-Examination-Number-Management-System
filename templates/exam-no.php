
<?php
require_once("includes/connection.php");
                            
                            $userInfo=$_SESSION['userName'];

                            $sqlQuery = "SELECT * FROM examination_number_table WHERE student_reg_no = '$userInfo'";
                            $statement = $conn->prepare($sqlQuery);
                            $statement->execute();
                            $result = $statement->fetchAll();

                            if($result == true) {
                              
                              
                              foreach ($result as $photo) {
                                  
								  $id = $photo["student_id"];
								  
                              }
                             }
                                  
?>

    <div id="right-panel" class="right-panel">

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

    

    <div class="col-md-12 mt-5">
    <div class="alert alert-info ml-auto mr-auto" role="alert">
  <h4 class="alert-heading">EXAMINATION NUMBER</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0"> <a  href="./includes/exam-card.php?id=<?php echo $id;?>">Click here to download and print your examination number</a></p>
</div>
    </div>

    
        </div>
    </div>
    <!--/.col-->

    



</div> <!-- .content -->
</div><!-- /#right-panel -->