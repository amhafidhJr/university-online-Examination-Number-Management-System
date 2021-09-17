<?php 
    require_once("connection.php");

    try {
        

            $id = $_GET['id'];
            $query ="SELECT * FROM student_table where student_id=?";
            $Statement1=$conn->prepare($query);
            $Statement1->execute(array($id));
            $result1=$Statement1->fetchAll(PDO::FETCH_ASSOC);

            if($result1 == true) {
                foreach ($result1 as $row) {
                    $student_id = $row['student_id'];
                    $student_reg_no = $row['student_reg_no'];
                    $exam_no = random_int(100000, 999999);
                }
           
                    $SqlQuery = "INSERT INTO examination_number_table VALUES (?,?,?,?)";
                    $statement = $conn->prepare($SqlQuery);
                    $result2 = $statement->execute(array(null,$student_id, $student_reg_no, $exam_no));

            }

            if ($result2 == true) {

                $status = "Assigned";
                
                $SqlQuery = "UPDATE student_table SET status = 'Assigned' where student_id = $id";
                $statement = $conn->prepare($SqlQuery);
                $result3 = $statement->execute(array($status));
            }
                if($result3 == true) {


                        ?>
                        <script>
                            alert("Added Successefully");
                           window.location.href = "../student.php"; 
                        </script>
                        <?php
                }



    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>