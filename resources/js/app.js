(async () => {
    const currentHour = new Date().getHours();
    let greeting = "Bom dia!";
    if (currentHour >= 12 && currentHour < 18) {
        greeting = "Boa tarde!";
    } else if (currentHour >= 18 && currentHour <= 23) {
        greeting = "Boa noite!";
    }

    const greetingEl = document.getElementById("greeting");
    greetingEl.innerText = greeting;
})();
