const studyButtonSelectorAll = document.querySelectorAll('.study-button');
const studyChoiceProgressBarFilledSelector = document.querySelector('.study-choice-progress-bar-filled');
const studyChoiceFurtherButtonSelector = document.querySelector('.study-choice-further-button');
const studyChoiceCounterSelector = document.querySelector('.study-choice-counter');
const studyChoiceModalSelector = document.querySelector('.study-choice-modal');
const choicedSstudyestextInputSelector = document.querySelector('.choiced-studyestext-input');

const studyButtonSelectorAllArrLen = studyButtonSelectorAll.length;

const studyLinkFilledText = 'ДОБАВИТЬ ПРЕДМЕТ';
const studyLinkHollowText = 'ДОБАВЛЕНО';

let choicedstudyes = [];
let choicedstudyesCount = 0;

for (let i = 0; i < studyButtonSelectorAllArrLen; i++) {
    studyButtonSelectorAll[i].onclick = function() {
        let currentstudyButtonSelector = studyButtonSelectorAll[i];

        if (currentstudyButtonSelector.classList.contains('study-link-filled') && choicedstudyesCount < 5) {

            studyesModalToggle();

            currentstudyButtonSelector.classList.remove('study-link-filled');
            currentstudyButtonSelector.classList.add('study-link-hollow');
            currentstudyButtonSelector.innerText = studyLinkHollowText;

            choicedstudyesCount++;
            
            changeDisplayedstudyesCounter();

            choicedstudyes.push(currentstudyButtonSelector.value);

            if (choicedstudyesCount === 5) {
                for (let j = 0; j < studyButtonSelectorAllArrLen; j++) {
                    if ( studyButtonSelectorAll[j].classList.contains('study-link-filled')) {
                        studyButtonSelectorAll[j].setAttribute('disabled', 'disabled');
                    }
                }
                studyChoiceProgressBarFilledSelector.style.borderTopRightRadius = 'var(--progress-bar-border-radius)';
                studyChoiceProgressBarFilledSelector.style.borderBottomRightRadius = 'var(--progress-bar-border-radius)';

            }

            studyChoiceProgressBarFilledChange();
            setPostValue();

        } else if (currentstudyButtonSelector.classList.contains('study-link-hollow') && choicedstudyesCount > 0) {

            currentstudyButtonSelector.classList.remove('study-link-hollow');
            currentstudyButtonSelector.classList.add('study-link-filled');
            currentstudyButtonSelector.innerText = studyLinkFilledText;

            choicedstudyesCount--;

            studyesModalToggle();

            changeDisplayedstudyesCounter();

            let removingstudyIndex = choicedstudyes.indexOf(currentstudyButtonSelector.value);
            choicedstudyes.splice(removingstudyIndex, 1);

            if (choicedstudyesCount === 4) {
                for (let j = 0; j < studyButtonSelectorAllArrLen; j++) {
                    if ( studyButtonSelectorAll[j].classList.contains('study-link-filled')) {
                        studyButtonSelectorAll[j].disabled = false;
                    }
                }

                studyChoiceProgressBarFilledSelector.style.borderTopRightRadius = '';
                studyChoiceProgressBarFilledSelector.style.borderBottomRightRadius = '';
            }

            studyChoiceProgressBarFilledChange();
            setPostValue();
        }
    }
}

function setPostValue() {
    choicedSstudyestextInputSelector.value = choicedstudyes.toString();
}

function studyesModalToggle() {
    if (choicedstudyesCount === 0) {
        studyChoiceModalSelector.classList.toggle('invisible');
    }
}

function changeDisplayedstudyesCounter() {
    studyChoiceCounterSelector.innerText = choicedstudyesCount.toString();
}

function studyChoiceProgressBarFilledChange() {
    studyChoiceProgressBarFilledSelector.style.width = (choicedstudyesCount*20).toString() +'%';
}