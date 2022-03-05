<?php

// if(isset($_POST['submit'])){
// $to = "sedrin880@gmail.com";; // Здесь нужно написать e-mail, куда будут приходить письма
// $from = $_POST['email']; // this is the sender's Email address
// $phone = $_POST['phone'];
// $subject = "adssmart";
// $subject2 = "Copy of your form submission";
// $message = $from . " оставил сообщение:" . "\n\n" . $_POST['message'] . "\n\n" . "Контактный телефон отправителя:" . $phone;
// $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

// $headers = "From:" . $from;
// $headers2 = "From:" . $to;

// mail($to,$subject,$message,$headers);
// // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender - Отключено!
// echo "Сообщение отправлено. Спасибо Вам " . $first_name . ", мы скоро свяжемся с Вами.";
// echo "<br /><br /><a href='http://adssmart.ru/index.html'>Вернуться на сайт.</a>";

// }

?>


<!--Переадресация на главную страницу сайта, через 3 секунды-->
<!-- <script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="http://adssmart.ru/index.html");}
window.setTimeout("changeurl();",3000);
</script> -->

<?
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && !empty($_POST['email'])) {
    $message = 'Email: ' . $_POST['email'] . ' ';
    $message .= 'Телефон: ' . $_POST['phone'] . "\n";
    if(!empty($_POST['message'])) {
        $message .= 'Сообщение: ' . $_POST['message'] . ' ';
    }
    $mailTo = "sedrin880@gmail.com"; // Ваш e-mail
    $subject = "Сообщение с сайта"; // Тема сообщения
    $headers= "Adssmart\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: adssmart.ru <adssmart.ru>\r\n";
    if(mail($mailTo, $subject, $message, $headers)) {
        echo "Спасибо за обращение!". "\n". "Мы свяжемся с вами в ближайшее время"; 
    } else {
        echo "Сообщение не отправлено!";
    }
}
?>