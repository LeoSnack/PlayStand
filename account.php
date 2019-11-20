<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayStand - мониторинг игровых серверов</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/MyStyle.css">

    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/index.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
</body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand"  href="/iBootstrap.php">PlayStand</a>
        </div>
    </div>
</div>


<div class="container con-padd con-fix">
    <div class="row ">

        <div class="col-xs-12 col-sm-12 col-lg-5 box-padd">
            <div class="panel panel-primary panel-fix" >
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Авторизация </h3>
                </div>
          <!-- ВХОД-->
              <div id="login">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 login-box form-w">
                            <form role="form " class="form-auto"  method="post">
                                <div class="input-group login-padd ">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" placeholder="E-mail" name="E-maill" required autofocus />
                                </div>
                                <div class="input-group ">
                                    <span class="input-group-addon "><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" class="form-control form-w" placeholder="Ваш пароль" name="Passwordl" required />
                                </div>
                                <p>
                                    <a href="#" class="reset-pass">Забыли свой пароль?</a></p>
                                У вас нет аккаунта? <a href="#" class="ch-href">Регистрация</a>



                        </div>
                       </div>
                    </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <button type="submit" class="btn btn-labeled btn-success" name="Sign-In">
                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span> <span class="btn-choo" title="Sign-In">Войти</span></button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 check-flow">
                            <div class="checkbox ">
                                <label >
                                    <input type="checkbox" value="Remember">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                  </form>
              </div>
                <!-- !ВХОД-->


                <?php
                // старт сессии

                // Сравниваем введенную капчу с тем, что храниться в сессии
                 if (isset($_POST['capcha'])) {
                  if($_SESSION['capcha'] == $_POST['capcha']){
                    echo 'Капча верная';
                }else {
                    echo 'Капча не верная';
                }
                 }
                // Удаляем значение капчи из сессии
                unset($_SESSION['capcha']);
                ?>

                <!-- регистрация-->
                <div id="registration">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 login-box form-w">
                            <form role="form" class="form-signin" method="post" action="account.php">
                                <div class="input-group login-padd ">
                                    <input type="Name" class="form-control" placeholder="Ваше имя" name="Name" required autofocus />
                                    <input type="Surname" class="form-control " placeholder="Ваша фамилия" name="Surname" required />
                                </div>

                               <div class="input-group login-padd">
                                   <input type="E-mail" class="form-control " placeholder="Введите Ваш E-mail" name="E-mail" required autofocus />
                                   <input type="Pass" class="form-control" placeholder="Ваш пароль" name="Password" required />
                                   <input type="Pass" class="form-control" placeholder="Повторите пароль" name="PasswordR" required />
                                </div>

                                <div class="input-group login-padd-1">
                                    <img src="/Cap/capcha.php" width="100" height="40" /> <br />
                                    <input type="Cap" class="form-control form-cap" placeholder="Введите ответ" required />
                                </div>

                                    <a href="#" class="ch-href1">Вернуться к входу</a>

                            </div>
                        </div>
                        </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <button type="submit" class="btn btn-labeled btn-success" name="ok">
                                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span> <span class="btn-choo" title="Sign-In">Войти</span></button>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 check-flow">
                                            <div class="checkbox ">
                                                <label >
                                                    <input type="checkbox" value="Remember">
                                                    Запомнить меня
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </form>
                             </div>
                <!-- !регистрация-->


                <!-- восстановление пароля-->
            <div id="reset-pass">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 login-box form-w">
                            <form role="form" class="form-auto" >
                                <div class="input-group login-padd1">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="text" class="form-control" placeholder="Введите Ваш E-mail" required autofocus />
                                </div>

                                <a href="/account.php" class="ch-href2">Вернуться к авторизации</a>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <button type="submit" class="btn btn-labeled btn-success" name="ok">
                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span> <span class="btn-choo" title="Sign-In">Войти</span></button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 check-flow">
                            <div class="checkbox ">
                                <label >
                                    <input type="checkbox" value="Remember">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                    </div>
                <!-- !восстановление пароля-->



</div>
</div>

<div class="container Error-padd Error">
    <!--<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Ошибка!</strong> Введите правильно E-mail.
    </div>

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Ошибка!</strong> Введите правильно пароль.
    </div>-->
</div>

<?php

$html = '<div class="container Error-padd Error">';
$html .= '<div class="alert alert-danger">';
$html .= '<button type="button" class="close" data-dismiss="alert">×</button>';
$html .= '<strong>Ошибка!</strong> Введите правильно E-mail.';
$html .= '</div>';
$html .= '</div>';
return $html;


include('/Functions.php');
include('/DB.php');


 if (isset($_POST['Sign-In'])) {
     SigninIn();
 } else     echo 'No';
?>


</html>