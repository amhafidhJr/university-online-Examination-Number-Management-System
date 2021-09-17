<?php 
    require_once("connection.php");

    try {
        
        if(isset($_POST['change'])) {

        
            $pass = $_POST['pass'];
            
            
           

            $SqlQuery = "UPDATE  INTO teacher_table VALUES (?,?,?,?,?)";
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