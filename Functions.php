<?php

 function Go_Header() {
  include('SiteSupp/Header.php');
 }

 function Go_Footer() {
  include('SiteSupp/Footer.php');
 }
 
 function Go_ContG() {
  include('SiteSupp/ContentG.php');
 } 
 
 function Go_ContI() {
  include('SiteSupp/ContentI.php');
 }

 function Go_ContT() {
  include('SiteSupp/ContentT.php');
 } 
 
 function Go_ContS() {
  include('SiteSupp/ContentS.php');
 } 
 
 function SigninUp() {
	   $error = array();
	   
	   if (isset($_POST['LoginN'])) {
	    $login = $_POST['LoginN'];
		$login = trim($login);
		
	    if(preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $login)) {
	     $_SESSION['Login'] = $login;
	    } else{
          $error[] = "Логин может состоять только из букв английского алфавита";
		 echo '<div class="Error">'.'Логин может состо¤ть только из букв английского алфавита.'.'</div>';
		  }
	   
	    if(strlen($login) < 3 or strlen($login) > 32) {
	     $error[] = "Ћогин должен быть не меньше 3-х символов и не больше 32.";
		 echo '<div class="Error">'.'Ћогин должен быть не меньше 3-х символов и не больше 32.'.'</div>';
	    }
	   }



	  if (isset($_POST['PasswordN']) && $_POST['PasswordN'] != "") {
	    $Password = $_POST['PasswordN'];
		$Password = trim($Password);
		
		
	    if(preg_match('/[a-zA-Z0-9\!]{6,12}/i', $Password)) {
	     $_SESSION['Password'] = $Password;
	    } else{ 
          $error[] = "ѕароль может состо¤ть только из букв английского алфавита";
		 echo '<div class="Error">'.'ѕароль может состо¤ть только из букв английского алфавита и цифр.'.'</div>';
		  }
	   
	    if(strlen($Password) < 6 or strlen($Password) > 12) {
	     $error[] = "ѕароль должен быть не меньше 6-х символов и не больше 12.";
		 echo '<div class="Error">'.'ѕароль должен быть не меньше 6 символов и не больше 12.'.'</div>';
	    }
	   } 
           
		   $sql = "SELECT * FROM `User` WHERE `login` = :login LIMIT 1";
		 $placeholders = array(':login' => $Login);
		 
		 $stmt = $dbh->prepare($sql);
		 $stmt->execute($placeholders);
		 $row = $stmt->fetch(PDO::FETCH_ASSOC);
	      
		 if ((count($row) > 0)) {
		  echo "Ползьзователь с таким Логином уже существует, предложет сменить пароль";
			} else {
			   $stmt = $dbh->prepare("INSERT INTO User (login, password) VALUES (:login, :password)");
			   $stmt->bindParam(':login', $login);
			   $stmt->bindParam(':password', $Password);
			} 
		  
	  }
		   

 
 
 function SigninIn()
 {
     $dbh = 'mysql:dbname=PlayStand;host=127.0.0.1';
     $user = 'root';
     $password = '';

     try {
         $dbh = new PDO($dbh, $user, $password);
         $dbh->query("SET NAMES 'utf8'");
     } catch (PDOException $e) {
         echo 'Подключение не удалось: ' . $e->getMessage();
     }

     if (!$dbh) {
         throw new PDOException();
     }

     $error = array();


     $login = $_POST['E-maill'];
     $login = trim($login);
     if (isset($_POST['E-maill'])) {
         if (preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $login)) {
             $_SESSION['Login'] = $login;
         } else {
             $error[] = "Логин может состоять только из букв английского алфавита";

             $body .= '<div class="container Error-padd Error">';
             $html .= '<div class="alert alert-danger">';
             $html .= '<button type="button" class="close" data-dismiss="alert">×</button>';
             $html .= '<strong>Ошибка!</strong> Введите правильно E-mail.';
             $html .= '</div>';
             $html .= '</div>';
             return $html;
         }

         if (strlen($login) < 3 or strlen($login) > 32) {
             $error[] = "Логин должен быть не меньше 3-х символов и не больше 32.";
             echo '<div class="Error">' . 'Логин должен быть не меньше 3-х символов и не больше 32.' . '</div>';
         }
     }


     $Password = $_POST['Passwordl'];
     $Password = trim($Password);

     if (preg_match('/[a-zA-Z0-9\!]{6,12}/i', $Password)) {
         $_SESSION['Password'] = $Password;
     } else {
         $error[] = "ѕароль может состо¤ть только из букв английского алфавита";
         echo '<div class="Error">' . 'ѕароль может состо¤ть только из букв английского алфавита и цифр.' . '</div>';


     }

     if (strlen($Password) < 6 or strlen($Password) > 12) {
         $error[] = "ѕароль должен быть не меньше 6-х символов и не больше 12.";
         echo '<div class="Error">' . 'ѕароль должен быть не меньше 6 символов и не больше 12.' . '</div>';
     }


     $sql = "SELECT * FROM `User` WHERE `Email` = :login";
     $placeholders = array(':login' => $Login);


     $stmt = $dbh->prepare($sql);
     $stmt->execute($placeholders);
     $row = $stmt->fetch(PDO::FETCH_ASSOC);



     if ((count($row) > 0)) {
         $html .= '<div class="container Error-padd Error">';
         $html .= '<div class="alert alert-danger">';
         $html .= '<button type="button" class="close" data-dismiss="alert">×</button>';
         $html .= '<strong>Ошибка!</strong> Введите правильно E-mail.';
         $html .= '</div>';
         $html .= '</div>';
         $html .= '</div>';

     } else {
         echo '<div class="Error">' . "Вы неправильно ввели логин или пароль" . '</div>';
     }




     if (count($error) == 0) {
         echo $_SESSION['Login'];
         echo $_SESSION['Password'];
         session_destroy();
     }
     return $html;
 }
 
 // Коля, проверка.
 
?>