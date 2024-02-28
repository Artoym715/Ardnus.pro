<?
function strip_data($telephone)
{
$deny_words = array("union","char","select","update","group","order","benchmark");

str_replace($deny_words, "", strtolower($telephone), $count);    
if ($count > 0) {
exit('SQL - inj');}

    
return $telephone;
}
if(isset($_POST['bt1'])){
if (isset($_POST['sel1'])) {$sel1 = ($_POST['sel1']); if ($sel1 == '') { unset($sel1);}}
if (isset($_POST['sel2'])) {$sel2 = ($_POST['sel2']); if ($sel2 == '') { unset($sel2);}}
if (isset($_POST['sel3'])) {$sel3 = ($_POST['sel3']); if ($sel3 == '') { unset($sel3);}}
if (isset($_POST['sel4'])) {$sel4 = ($_POST['sel4']); if ($sel4 == '') { unset($sel4);}}	
if (isset($_POST['telephone'])) {$telephone = strip_data($_POST['telephone']); if ($telephone == '') { unset($telephone);}} //Проверка отправилось ли наше поля name и не пустые ли они


$telephone = strip_tags($telephone);
$telephone = htmlentities($telephone);
$telephone = mysql_escape_string($telephone);
    
        $to = 'zelenskyvl@mail.ru,burichin@mail.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Platinum'; //Загаловок сообщения
        $message = '
                <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>'.$sel1.'</p>
                        <p>'.$sel2.'</p>
                        <p>'.$sel3.'</p>
						<p>'.$sel4.'</p>
                        <p>Телефон: '.$telephone.'</p> 
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: ardnus.kz <ardnus@ardnus.kz>\r\n"; //Наименование и почта отправителя
        $verify = mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
    
    if ($verify == 'true')
{
header('Location:http://ardnus.kz/Thanks.html');
}
else 
{
header('Location:http://ardnus.kz/Error.html');
}
    
}
else
{
header('Location:http://ardnus.kz/Exit.html');
}
?>