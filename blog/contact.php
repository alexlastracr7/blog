
<?php 
	include 'includes/templades/headers.php';
	require 'includes/templades/config/database.php';
?>

<?php


//array for validation 

$error =[]; //tengo que validar el usuario



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $mail = $_POST['mail'];
  $comentary = $_POST['comentary']; 



  //insert into the database 

  $query = "INSERT INTO contact_me (name, phone, mail, comentary) VALUES ('$name','$phone','$mail','$comentary')";

  $resultadoc = mysqli_query(getConnection(), $query);
  if ($resultadoc) {
   
  }
}
?>


<p class="contactme">CONTACT ME</p>
    

    <section>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <fieldset class="cuadricula">
                <legend class="callme">Contact us  <div>and tell about your trip</div>  </legend>

                <div class="encuesta">
                    <div>
                        <label>Name</label>
                        <input type="text" placeholder="Your Name" name="name" >
                    </div>
                    
                    <div>
                        <label>Phone</label>
                        <input type="tel" placeholder="+7*********" name="phone">    
                    </div>
                    
                    <div>
                        <label>E-mail</label>
                        <input type="email" placeholder="example@email.com" name="mail">
                    </div>
                    
                    <div>
                        <label>Comentary</label>
                        <textarea name="comentary"></textarea>
                    </div>
                   
					<div class="send">
                		<input type="submit" value="SEND"> 
           			 </div>
                                     
                </div>
                
            </fieldset>

        </form>
    </section>
<?php 
include './includes/templades/footers.php' 
?>
</body>
</html>