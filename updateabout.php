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
$query= "SELECT * FROM about_me WHERE id = ${id}";
$resultado = mysqli_query(getConnection(), $query);
if ($fila = mysqli_fetch_assoc($resultado)):
    var_dump($fila);
?>

    <div>
        <form  method="POST">
            <input type="hidden" name= "txtid" value="<?php echo $fila['id']?>">
            <label for="">PICTURE: </label>
            <input type="" name= "images_me" value="<?php echo $fila['images_me']?>"><br>
            <label for="">COMENTARY:</label>
            <textarea name= "text_aboutme"><?php echo $fila['text_aboutme']?></textarea><br>  
            
            <input type="submit" name= "" value ="UPDATE" href="aboutadmin.php" > 

            <a href="aboutadmin.php">RETURN</a>
        </form>
    </div>


 <?php endif;?>

    <?php  
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $imagesabout = $_POST['images_me'];
        $textabout = $_POST['text_aboutme']; 
      

        //insert into the database 
      
        $query2 = "UPDATE about_me SET images_me ='$imagesabout', text_aboutm ='$textabout' WHERE id=$id";
      
        $resultadoc2 = mysqli_query(getConnection(), $query2);
        
    }
    ?> 

<?php 
include '../../includes/templades/footers.php' 
?>
</body>
</html>