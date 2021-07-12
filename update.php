<?php 

	session_start();

	$auth = $_SESSION['login'];

	if (!$auth){
		header('Location: /');
	}

?>

<?php 
	include '../../includes/templades/headers.php';
	require '../../includes/templades/config/database.php';

?>

<?php

$id=$_GET['id'];
$query= "SELECT * FROM contact_me WHERE id = ${id}";
$resultado = mysqli_query(getConnection(), $query);
if ($fila = mysqli_fetch_assoc($resultado)):
    var_dump($fila);
?>

    <div>
        <form  method="POST">
            <input type="hidden" name= "txtid" value="<?php echo $fila['id']?>">
            <label for="">NAME: </label>
            <input type="text" name= "txtname" value="<?php echo $fila['name']?>"><br>
             
            <label for="">PHONE: </label>
            <input type="text" name= "txtphone" value="<?php echo $fila['phone']?>"><br>
            <label for="">MAIL: </label>
            <input type="text" name= "txtmail" value="<?php echo $fila['mail']?>"><br><br>  
            <label for="">COMENTARY:</label>
            <textarea name= "comentary"><?php echo $fila['comentary']?></textarea><br>  
            
            <input type="submit" name= "" value ="UPDATE" href="create.php" > 

            <a href="create.php">RETURN</a>
        </form>
    </div>


 <?php endif;?>

    <?php  
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['txtname'];
        $phone = $_POST['txtphone'];
        $mail = $_POST['txtmail'];
        $comentary = $_POST['comentary']; 
      

        //insert into the database 
      
        $query2 = "UPDATE contact_me SET name ='$name', phone ='$phone', mail = '$mail',comentary ='$comentary' WHERE id=$id";
      
        $resultadoc2 = mysqli_query(getConnection(), $query2);
        if ($resultadoc2) {
         
        }
    }
    ?> 

<?php 
include '../../includes/templades/footers.php' 
?>
</body>
</html>