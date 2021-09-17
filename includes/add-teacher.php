<?php 
    require_once("connection.php");

    try {
        
        if(isset($_POST['add-teacher'])) {

        
            $var_employee_no = $_POST['employee_no'];
            $var_fullname  = $_POST['fullname'];
            $var_teacher_dept = $_POST['teacher_dept'];
            $var_teacher_email = $_POST['email'];
           

            $SqlQuery = "INSERT INTO teacher_table VALUES (?,?,?,?,?)";
            $statement = $conn->prepare($SqlQuery);
            $result = $statement->execute(array(null, $var_employee_no, $var_fullname, $var_teacher_dept, $var_teacher_email));


                if($result == true) {
                        ?>
                        <script>
                            alert("Added Successefully");
                           window.location.href = "../teacher.php"; 
                        </script>
                        <?php
                }

        }

    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>