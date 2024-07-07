let studiApplicationStudiesNameCrossSelector =
 document.querySelectorAll('.studi-application-studies-name-cross');
 const choicedStudiestextInputSelector = document.querySelector('.choiced-studiestext-input');
const renderedFormSelector = document.querySelector('.rendered-form');
const studiApplicationButtonSelector = document.querySelector('.studi-application-button');
const studiesNumberSelector = document.querySelector('.studies-number');
const studiesCaseSelector = document.querySelector('.studies-case');

 let choicedStudies = choicedStudiestextInputSelector.value.split(',');

 for (let i = 0; i < studiApplicationStudiesNameCrossSelector.length; i++) {
    studiApplicationStudiesNameCrossSelector[i].onclick = function() {
      let currentStudiApplicationSstudiesNameContainer = this.parentNode;
      let studiId =  currentStudiApplicationSstudiesNameContainer.getAttribute('data-studi-id');
      let removingStudiIndex = choicedStudies.indexOf(studiId);
      choicedStudies.splice(removingStudiIndex, 1);
      choicedStudiestextInputSelector.value = choicedStudies.toString();

      currentStudiApplicationSstudiesNameContainer.classList.add('invisible');

      let choicedStudiesLength = choicedStudies.length;
      studiesNumberSelector.innerText = choicedStudiesLength.toString();

      switch(choicedStudiesLength) {
        case 0:
        case 5:
          studiesCaseSelector.innerText = 'предметов';
          break;
        case 1:
          studiesCaseSelector.innerText = 'предмет';
          break;
        case 2:
        case 3:
        case 4:
          studiesCaseSelector.innerText = 'предмета';
          break;
      }

      if (choicedStudiesLength === 0 ) {
        studiApplicationButtonSelector.disabled = true;
      }
    }
 }
 renderedFormSelector.onchange = function() {
    studiApplicationButtonSelector.disabled = !renderedFormSelector.checkValidity();
 }