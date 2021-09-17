<?php
require_once("connection.php");
session_start();
?>
<?php
if(isset($_GET['delete']))
{                                         
$query = "select * from teacher_table where teacher_id = ".$_GET['id'];
$Statement=$conn->prepare($query);
$Statement->execute();
$row=$Statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php
	$query = "delete from teacher_table where teacher_id = ".$_GET['id'];
    $Statement=$conn->prepare($query);
    $Statement->execute();
    header('location:../teacher.php');
?>