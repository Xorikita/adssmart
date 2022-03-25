const button_dark = document.querySelector(".main-banner-button-dark")
const button_light = document.querySelector(".main-banner-button-light")
button_dark.addEventListener("click", () => {
    const light_form = document.querySelector(".contact-block_light")
    light_form.style.zIndex = "1";
    light_form.style.opacity = "1";
})

const title = document.querySelector(".contacts-title")
const contacts = document.querySelector(".contacts-block")

title.addEventListener("click",() =>{
    // console.log(contacts.offsetWidth)
    test.play();
})

let test = anime({
    targets: contacts,
    width: contacts.offsetWidth + 250,
    delay: 5,
    easing: "easeInOutSine",
    direction: "alternate",
    autoplay: false,
  });
// button_light.addEventListener("click", () => {
//     const light_form = document.querySelector(".contact-block_light")
//     light_form.style.zIndex = "-1";
//     light_form.style.opacity = "0";
// })\

$(document).ready(function () {
    $("form").submit(function () {
        
        // Получение ID формы
        let formID = $(this).attr('id');
        // Добавление решётки к имени ID
        let formNm = $('#' + formID);
        $.ajax({
            type: "POST",
            url: '/scripts/send.php',
            data: formNm.serialize(),
            beforeSend: function () {
                // Вывод текста в процессе отправки
                $(formNm).html('<p style="text-align:center">Отправка...</p>');
            },
            success: function (data) {
                // Вывод текста результата отправки
                document.querySelector(".faq-form").style.maxWidth = "90%"
                $(formNm).html('<p style="text-align:center; font-family: Montserrat-Medium; font-size: 24px; line-height: 29px; text-align: center; letter-spacing: 0.02em; color: #293849;">Спасибо за обращение!<br>Мы свяжемся с вами в ближайшее время</p>');
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                $(formNm).html(error);
            }
        });
        return false;
    });
});