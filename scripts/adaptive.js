const hamburegerMenuCrossSelector = document.querySelector('.hambureger-menu-cross');
const subNavSelectorMobile = document.querySelector('.sub-nav-mobile');

hamburegerMenuCrossSelector.onclick = function() {
    subNavSelectorMobile.classList.toggle('invisible');
}