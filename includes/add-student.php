
<?php 
    require_once("connection.php");
    require_once('../PHPExcel/Classes/PHPExcel.php');
    require_once('../PHPExcel/Classes/PHPExcel/IOFactory.php');

    try {
        
        if(isset($_POST['add-student'])) {

            $uploadfile=$_FILES['uploadfile']['tmp_name'];
            $status = "Not Signed";

            $objExcel=PHPExcel_IOFactory::load($uploadfile);
            foreach($objExcel->getWorksheetIterator() as $worksheet) {
	            $highestrow=$worksheet->getHighestRow();

	            for($row=0;$row<=$highestrow;$row++) {
                    $regNo=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
                    $fullname=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
                    $dept=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
                    $course=$worksheet->getCellByColumnAndRow(3,$row)->getValue();

                    if($regNo != null & $fullname != null & $dept != null & $course != null) {
                        
                        $SqlQuery = "INSERT INTO student_table VALUES (?,?,?,?,?,?)";
                        $statement = $conn->prepare($SqlQuery);
                        $result = $statement->execute(array(null, $regNo, $fullname, $dept, $course,$status));

                        $defaultPassword = "12345";
                        $role = "student";
                        $SqlQuery = "INSERT INTO user_login VALUES (?,?,?,?)";
                        $statement = $conn->prepare($SqlQuery);
                        $result = $statement->execute(array(null, $regNo, $defaultPassword,$role));
                    }

                }
            }
                if($result == true) {
                        
                        ?>
                        <script>
                            alert("Added Successefully");
                           window.location.href = "../student.php"; 
                        </script>
                        <?php
                }
            

        }

    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>

