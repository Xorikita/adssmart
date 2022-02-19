const button_dark = document.querySelector(".main-banner-button-dark")
const button_light = document.querySelector(".main-banner-button-light")
button_dark.addEventListener("click", () => {
    const light_form = document.querySelector(".contact-block_light")
    light_form.style.zIndex = "1";
    light_form.style.opacity = "1";
})
button_light.addEventListener("click", () => {
    const light_form = document.querySelector(".contact-block_light")
    light_form.style.zIndex = "-1";
    light_form.style.opacity = "0";
})