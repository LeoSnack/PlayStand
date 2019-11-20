<?
 session_start();
?>
<head>
  <title>PlayStand - мониторинг игр</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/reset.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
  <script src="js/index.js"></script>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
 </head>
 <div class="wrapper">
 <? 
//Подключение к БД/  
  $dsn = 'mysql:dbname=PlayStand;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

if (!$dbh) {
throw new PDOException();
}

$dbh->query("SET NAMES 'utf8'");
//Подключение к БД
  
  function generateMenu()
{
        $html .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?action=listPages">Просмотреть страницы</a></li>'; 
        $html .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?action=addPage">Добавить страницу</a></li>';
		$html .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?action=editPage">Редактировать страницу</a></li>';
    return $html;
}
 
 function listPages($dbh) {
$sql = "SELECT * FROM `Cs16`";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $html .= '<table class="OsT">';
      $html .= '<thead>';
	  $html .= '<tr>';
	  $html .=  '<th>'.'№'.'</th>';
	  $html .=  '<th>'.'Название сервера'.'</th>';
	  $html .= '<th>'.'Адрес'.'</th>';
	  $html .= '<th>'.'Игроки'.'</th>';
	  $html .= '<th>'.'Рейтинг'.'</th>';
	  $html .= '</tr>';
	  $html .= '</thead>';
foreach ($rows as $row) { 
      $html .='<tbody>';	 
	  $html .= '<tr>';
	  $html .= '<td><a href="' . $_SERVER['PHP_SELF'] . '?action=editPage&id=' . $row['id'] . '">' . $row['id'] . '</a></td>' ;
	  $html .=   '<td>'. htmlspecialchars($row['Name'], ENT_NOQUOTES, 'UTF-8') .'</td>';
	   $html .=  '<td>'. htmlspecialchars($row['Ip'], ENT_NOQUOTES, 'UTF-8') .'</td>';
	   $html .=  '<td>'.'5/12'.'</td>';
	   $html .=  '<td>'. htmlspecialchars($row['RT'], ENT_NOQUOTES, 'UTF-8') .'</td>';
	   $html .= '</tr>';		
	  $html .='</tbody>';
	   $html .= '</tr>';
	   
	     
	
}
$html .= '</table>';
return $html;

}

function frmAddPage()
{
$html = '<br />';
$html = '<form name="frmEditPage" action="/test.php?action=addPage"' . $_SERVER['PHP_SELF'] . '" method="post">';
$html .= '<input type="hidden" name="action" value="savePage"><br /> <br />';

$html .= '<input type="text" name="Name">Введите Name сервера <br /> <br />';
$html .= '<input type="text" name="Ip">Введите Ip сервера <br /> <br />';
$html .= '<input type="text" name="RT">Введите RT сервера <br /> <br />';
$html .= '<input type="submit" value="ok"> <br>';
$html .= '</form>';
 
 

   
return $html;
}  


function insertPage($arr, $dbh)
{


$arr = array(
    Name  => $_POST['Name'],
    Ip => $_POST['Ip'],
    RT => $_POST['RT']
);


$sql = "INSERT INTO `Cs16` SET `Name` = :Name, `Ip` = :Ip, `RT` = :RT";
$placeholders = array(
':Name' => $arr[Name],
':Ip' => $arr[Ip],
':RT' => $arr[RT]
);


$stmt = $dbh->prepare($sql);
if ($stmt->execute($placeholders)) {
$html .= '<div>Запись добавлена!</div>';
}

return $html;
}



function editPage($id, $dbh)
{

$sql = "SELECT * FROM `Cs16` WHERE `id` = :id";

$placeholders = array(':id' => $id);		 

$stmt = $dbh->prepare($sql);
$stmt->execute($placeholders);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$html = '<form name="frmEditPage" action="' . $_SERVER['PHP_SELF'] . '" method="post">';
$html .= '<input type="hidden" name="action" value="savePage">';
$html .= '<input type="hidden" name="id" value="' . $row['id'] . '"> <br />';

  

$html .= '<label for="title">Name</label>';
$html .= '<input name="NameE" value="' . htmlspecialchars($row['Name'], ENT_NOQUOTES, 'UTF-8') . '"> <br />';


$html .= '<label for="title">Ip</label>';
$html .= '<textarea name="IpE">' . htmlspecialchars($row['Ip'], ENT_NOQUOTES, 'UTF-8') . '</textarea>';


$html .= '<div>';
$html .= '<button>Сохранить!</button>';
$html .= '</div>';

$html .= '</form>';

return $html;
}

function updatePage($arr, $dbh) {
$sql = "UPDATE `Cs16` SET `Name` = :Name, `Ip` = :Ip WHERE `id` = :id";
$placeholders = array(
':Name' => $arr['NameE'],
':Ip' => $arr['IpE'],
':id' => $arr['id'],
);

 //var_dump($_POST['NameE']);

$stmt = $dbh->prepare($sql);
if ($stmt->execute($placeholders)) {
$html = '<div>Запись обновлена</div>';
}

return $html;
} 
 
 echo generateMenu();
 

 
  if (isset($_GET['action'])) {
	switch ($_GET['action']) {
     case 'listPages':
      echo listPages($dbh);
      break;
	  
	 case 'addPage':
	  echo frmAddPage();
	  echo insertPage($arr, $dbh);     
	  break;
	  
	 case 'editPage': 
	  echo editPage($_GET['id'], $dbh);
	  break;
	  
	 case 'savePage':
      echo updatePage($_POST, $dbh);
      break;		
	}		 
       	 
  } elseif ($_POST['action']) {
        switch ($_POST['action']) {
            case 'savePage':
	          echo updatePage($_POST, $dbh);
              break;		
	}
   }	
 ?>
 
 </div>



