<?
function strip_data($telephone)
{
$deny_words = array("union","char","select","update","group","order","benchmark");

str_replace($deny_words, "", strtolower($telephone), $count);    
if ($count > 0) {
exit('SQL - inj');}

    
return $telephone;
}
if (isset($_POST['submit'])) {
if (isset($_POST['selec'])) {$selec = ($_POST['selec']);  if ($selec == '') { unset($selec);}}
if (isset($_POST['telephone'])) {$telephone = strip_data($_POST['telephone']); if ($telephone == '') { unset($telephone);}} //Проверка отправилось ли наше поля name и не пустые ли они


$telephone = strip_tags($telephone);
$telephone = htmlentities($telephone);
$telephone = mysql_escape_string($telephone);
    
        $to = 'zelenskyvl@mail.ru,burichin@mail.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = '4k'; //Загаловок сообщения
        $message = '
                <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Задачи компа: '.$selec.'</p> 
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