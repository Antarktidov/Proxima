const cityOptionsSelector = document.querySelector(".city-options");
const studyOptionsSelector = document.querySelector(".study-options");
const teacherstudyesStylesSelector = document.querySelector(".teacher-studyes-styles");
const teacherCityStylesSelector = document.querySelector(".teacher-city-styles");

studyOptionsSelector.onchange = function() {
    let studyOptionsData = studyOptionsSelector.value;

    if (studyOptionsData === 'all') {
        teacherstudyesStylesSelector.innerHTML = '';
    }
    else {
        teacherstudyesStylesSelector.innerHTML = `.teacher-card:not([data-teacher-studyes*="${studyOptionsData}"]) {
            display: none;
            }`
    }

}


cityOptionsSelector.onchange = function() {
    let cityOptionsData = cityOptionsSelector.value;

    if (cityOptionsData === 'all') {
        teacherCityStylesSelector.innerHTML = '';
    }
    else {
        teacherCityStylesSelector.innerHTML = `.teacher-card:not([data-teacher-city="${cityOptionsData}"]) {
            display: none;
            }`
    }

}