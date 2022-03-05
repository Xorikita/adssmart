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
    $message = 'Имя: ' . $_POST['email'] . ' ';
    $message .= 'Телефон: ' . $_POST['phone'] . ' ';
    if(!empty($_POST['message'])) {
        $message .= 'Текст: ' . $_POST['message'] . ' ';
    }
    $mailTo = "sedrin880@gmail.com"; // Ваш e-mail
    $subject = "Письмо с сайта"; // Тема сообщения
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: sedrin880@gmail.com <sedrin880@gmail.com>\r\n";
    if(mail($mailTo, $subject, $message, $headers)) {
        echo "Спасибо, ".$_POST['email'].", мы свяжемся с вами в самое ближайшее время!"; 
    } else {
        echo "Сообщение не отправлено!"; 
    }
}
?>