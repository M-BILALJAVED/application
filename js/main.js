document.addEventListener("DOMContentLoaded", function () {
    const captchaDiv = document.getElementById("captcha");
    const refreshButton = document.querySelector(".captch_box .input-group-text");
    // const captchaInput = document.getElementById("captchaInput");
    // const verifyButton = document.getElementById("my_button");
    const captchaHiddenInput = document.getElementById("generatedCaptchaInput");

    const fonts = ["Arial", "Verdana", "Courier New", "Georgia", "Times New Roman", "Comic Sans MS"];

    function generateCaptcha() {
        const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        const colors = ["#FF5733", "#33FF57", "#3357FF", "#F333FF", "#FFDD33", "#33FFF3", "#FF5733", "#FF8C00", "#00FF7F", "yellow"];
        const captchaLength = 4;
        let captchaText = "";

        captchaDiv.innerHTML = "";

        for (let i = 0; i < captchaLength; i++) {
            const char = chars.charAt(Math.floor(Math.random() * chars.length));
            const span = document.createElement("span");

            span.textContent = char;
            span.style.color = colors[Math.floor(Math.random() * colors.length)];
            span.style.fontFamily = fonts[Math.floor(Math.random() * fonts.length)];
            span.style.fontSize = `${Math.floor(Math.random() * 11) + 15}px`;

            captchaDiv.appendChild(span);
            captchaText += char;
        }

        captchaHiddenInput.value = captchaText; // Store CAPTCHA in hidden input for submission
    }

    generateCaptcha();

    refreshButton.addEventListener("click", generateCaptcha);
});
