let studyApplicationstudyesNameCrossSelector =
 document.querySelectorAll('.study-application-studyes-name-cross');
 const choicedstudyestextInputSelector = document.querySelector('.choiced-studyestext-input');
const renderedFormSelector = document.querySelector('.rendered-form');
const studyApplicationButtonSelector = document.querySelector('.study-application-button');
const studyesNumberSelector = document.querySelector('.studyes-number');
const studyesCaseSelector = document.querySelector('.studyes-case');

 let choicedstudyes = choicedstudyestextInputSelector.value.split(',');

 for (let i = 0; i < studyApplicationstudyesNameCrossSelector.length; i++) {
    studyApplicationstudyesNameCrossSelector[i].onclick = function() {
      let currentstudyApplicationSstudyesNameContainer = this.parentNode;
      let studyId =  currentstudyApplicationSstudyesNameContainer.getAttribute('data-study-id');
      let removingstudyIndex = choicedstudyes.indexOf(studyId);
      choicedstudyes.splice(removingstudyIndex, 1);
      choicedstudyestextInputSelector.value = choicedstudyes.toString();

      currentstudyApplicationSstudyesNameContainer.classList.add('invisible');

      let choicedstudyesLength = choicedstudyes.length;
      studyesNumberSelector.innerText = choicedstudyesLength.toString();

      switch(choicedstudyesLength) {
        case 0:
        case 5:
          studyesCaseSelector.innerText = 'предметов';
          break;
        case 1:
          studyesCaseSelector.innerText = 'предмет';
          break;
        case 2:
        case 3:
        case 4:
          studyesCaseSelector.innerText = 'предмета';
          break;
      }

      if (choicedstudyesLength === 0 ) {
        studyApplicationButtonSelector.disabled = true;
      }
    }
 }
 renderedFormSelector.onchange = function() {
    studyApplicationButtonSelector.disabled = !renderedFormSelector.checkValidity();
 }