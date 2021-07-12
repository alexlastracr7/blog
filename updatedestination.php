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
$query= "SELECT * FROM destinations WHERE iddestinations = ${id}";
$resultado = mysqli_query(getConnection(), $query);
if ($fila = mysqli_fetch_assoc($resultado)):
    var_dump($fila);
?>

    <div>
        <form  method="POST">
            <input type="hidden" name= "txtid" value="<?php echo $fila['iddestinations']?>">
            <label for="">NAME: </label>
            <input type="text" name= "name" value="<?php echo $fila['namecity']?>"><br>
             
            <label for="">PHONE: </label>
            <input type="text" name= "images_des" value="<?php echo $fila['images_des']?>"><br> 
            <label for="">COMENTARY:</label>
            <textarea name= "description"><?php echo $fila['description']?></textarea><br>  
            
            <input type="submit" name= "" value ="UPDATE" href="destinationadmin.php" > 

            <a href="destinationadmin.php">RETURN</a>
        </form>
    </div>


 <?php endif;?>

    <?php  
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['name'];
        $imagesdes = $_POST['images_des'];
        $description = $_POST['description']; 
      

        //insert into the database 
      
        $query2 = "UPDATE destinations SET namecity ='$name', images_des ='$imagesdes', description ='$description' WHERE iddestinations = $id";

        $resultadoc2 = mysqli_query(getConnection(), $query2);
    }
    ?> 

<?php 
include '../../includes/templades/footers.php' 
?>
</body>
</html>