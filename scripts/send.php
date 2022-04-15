<?
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
&& !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) 
== 'xmlhttprequest' 
&& !empty($_POST['email'])) {
    $mailfrom = 'Email: ' . $_POST['email'] . ' ';
    $message .= 'Телефон: ' . $_POST['phone'] . "\n";
    if(!empty($_POST['message'])) {
        $message .= 'Сообщение: ' . $_POST['message'] . ' ';
    }
    $mailTo = "info@erpsmart.ru"; // Ваш e-mail
    // $mailTo = "sedrin880@gmail.com";
    $subject = "AdsSmart"; // Тема сообщения
    if(send_mime_mail($mailfrom,
    $mailfrom,
    $mailTo,
    $mailTo,
    'UTF-8',  // кодировка, в которой находятся передаваемые строки
    'KOI8-R', // кодировка, в которой будет отправлено письмо
    $subject,
    $message)) {
        echo "Спасибо за обращение!". "\n". "Мы свяжемся с вами в ближайшее время"; 
    } else {
        echo "Сообщение не отправлено!";
    }
}
?>

<?
    function send_mime_mail($name_from, // имя отправителя
    $email_from, // email отправителя
    $name_to, // имя получателя
    $email_to, // email получателя
    $data_charset, // кодировка переданных данных
    $send_charset, // кодировка письма
    $subject, // тема письма
    $body, // текст письма
    $html = FALSE, // письмо в виде html или обычного текста
    $reply_to = FALSE
    ) {
$to = mime_header_encode($name_to, $data_charset, $send_charset)
. ' <' . $email_to . '>';
$subject = mime_header_encode($subject, $data_charset, $send_charset);
$from =  mime_header_encode($name_from, $data_charset, $send_charset)
 .' <' . $email_from . '>';
if($data_charset != $send_charset) {
    $body = iconv($data_charset, $send_charset . '//IGNORE', $body);
}
$headers = "From: $from\r\n";
$type = ($html) ? 'html' : 'plain';
$headers .= "Content-type: text/$type; charset=$send_charset\r\n";
$headers .= "Mime-Version: 1.0\r\n";
if ($reply_to) {
$headers .= "Reply-To: $reply_to";
}
return mail($to, $subject, $body, $headers);
}

function mime_header_encode($str, $data_charset, $send_charset) {
if($data_charset != $send_charset) {
    $str = iconv($data_charset, $send_charset . '//IGNORE', $str);
}
return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}
?>