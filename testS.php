<html>
<head>

    <meta charset="utf-8">
</head>
<?php

require_once('/library/simplehtmldom/simple_html_dom.php');

$html = new simple_html_dom();

$html = file_get_html('http://servers-samp.ru/');

if($html->innertext!='' and count($html->find('table'))) {
    foreach($html->find('table[class="gen-table indpage"] td h3 a ') as $a){
        //echo('<p>'.$a.'</p>');
       $text = $a;
        $pattern = '/<a[^<>]+?>(.*?)<\/a>/uis';
        if (!preg_match_all($pattern, $text, $matches)) {
            echo 'error!';
        } else {
           // echo($matches[1]);
            foreach($matches[1] as $Nota) {
                echo('<p>'.$Nota.'</p>');
            }
        }
    }
}

//освобождаем ресурсы
$html->clear();
unset($html);


?>
</html>