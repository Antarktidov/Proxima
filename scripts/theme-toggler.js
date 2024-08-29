const themeTogglerSelector = document.querySelector('.theme-toggler');
const themeTogglerMobileSelector = document.querySelector('.theme-toggler-mobile');
const body = document.body;

const cookie = document.cookie;
const cookies = cookie.split(';');
let proximaTheme = '';

for (let i = 0; i < cookies.length; i++) {
    if (cookies[i].startsWith('proximaTheme=')) {
        let splitedCookies = cookies[i].split('=');
        proximaTheme = splitedCookies[1];
    }
}

if (proximaTheme == 'dark') {
    toggleTheme();
}

themeTogglerSelector.onclick = function() {
    toggleTheme();
}

if (themeTogglerMobileSelector != null) {
    themeTogglerMobileSelector.onclick = function() {
        toggleTheme();
    }
}

function toggleTheme() {
    body.classList.toggle('theme-light');
    body.classList.toggle('theme-dark');

    if (body.classList.contains('theme-light'))
        document.cookie = "proximaTheme=light";
    else if (body.classList.contains('theme-dark'))
        document.cookie = "proximaTheme=dark";
}