<?php  
// ����� ������
session_start(); 
// ���������� ��������� ����� � ���, ��� ��������� � ������

 if($_SESSION['capcha'] == $_POST['capcha']){
    echo '����� ������';
}else {
    echo '����� �� ������';
} 
// ������� �������� ����� �� ������ 
unset($_SESSION['capcha']);  
?>


<form method="post" action="/Cap/index.php">
    <img src="/Cap/capcha.php" width="100" height="40" /> <br />
    ��� � ��������: <input type="text" name="capcha" /><br />
    <input type="submit" value="���������" />
</form>