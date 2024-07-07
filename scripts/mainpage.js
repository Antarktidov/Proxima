const studiButtonSelectorAll = document.querySelectorAll('.studi-button');
const studiChoiceProgressBarFilledSelector = document.querySelector('.studi-choice-progress-bar-filled');
const studiChoiceFurtherButtonSelector = document.querySelector('.studi-choice-further-button');
const studiChoiceCounterSelector = document.querySelector('.studi-choice-counter');
const studiChoiceModalSelector = document.querySelector('.studi-choice-modal');
const choicedSstudiestextInputSelector = document.querySelector('.choiced-studiestext-input');

const studiButtonSelectorAllArrLen = studiButtonSelectorAll.length;

const studiLinkFilledText = 'ДОБАВИТЬ ПРЕДМЕТ';
const studiLinkHollowText = 'ДОБАВЛЕНО';

let choicedStudies = [];
let choicedStudiesCount = 0;

for (let i = 0; i < studiButtonSelectorAllArrLen; i++) {
    studiButtonSelectorAll[i].onclick = function() {
        let currentStudiButtonSelector = studiButtonSelectorAll[i];

        if (currentStudiButtonSelector.classList.contains('studi-link-filled') && choicedStudiesCount < 5) {

            studiesModalToggle();

            currentStudiButtonSelector.classList.remove('studi-link-filled');
            currentStudiButtonSelector.classList.add('studi-link-hollow');
            currentStudiButtonSelector.innerText = studiLinkHollowText;

            choicedStudiesCount++;
            
            changeDisplayedStudiesCounter();

            choicedStudies.push(currentStudiButtonSelector.value);

            if (choicedStudiesCount === 5) {
                for (let j = 0; j < studiButtonSelectorAllArrLen; j++) {
                    if ( studiButtonSelectorAll[j].classList.contains('studi-link-filled')) {
                        studiButtonSelectorAll[j].setAttribute('disabled', 'disabled');
                    }
                }
                studiChoiceProgressBarFilledSelector.style.borderTopRightRadius = 'var(--progress-bar-border-radius)';
                studiChoiceProgressBarFilledSelector.style.borderBottomRightRadius = 'var(--progress-bar-border-radius)';

            }

            studiChoiceProgressBarFilledChange();
            setPostValue();

        } else if (currentStudiButtonSelector.classList.contains('studi-link-hollow') && choicedStudiesCount > 0) {

            currentStudiButtonSelector.classList.remove('studi-link-hollow');
            currentStudiButtonSelector.classList.add('studi-link-filled');
            currentStudiButtonSelector.innerText = studiLinkFilledText;

            choicedStudiesCount--;

            studiesModalToggle();

            changeDisplayedStudiesCounter();

            let removingStudiIndex = choicedStudies.indexOf(currentStudiButtonSelector.value);
            choicedStudies.splice(removingStudiIndex, 1);

            if (choicedStudiesCount === 4) {
                for (let j = 0; j < studiButtonSelectorAllArrLen; j++) {
                    if ( studiButtonSelectorAll[j].classList.contains('studi-link-filled')) {
                        studiButtonSelectorAll[j].disabled = false;
                    }
                }

                studiChoiceProgressBarFilledSelector.style.borderTopRightRadius = '';
                studiChoiceProgressBarFilledSelector.style.borderBottomRightRadius = '';
            }

            studiChoiceProgressBarFilledChange();
            setPostValue();
        }
    }
}

function setPostValue() {
    choicedSstudiestextInputSelector.value = choicedStudies.toString();
}

function studiesModalToggle() {
    if (choicedStudiesCount === 0) {
        studiChoiceModalSelector.classList.toggle('invisible');
    }
}

function changeDisplayedStudiesCounter() {
    studiChoiceCounterSelector.innerText = choicedStudiesCount.toString();
}

function studiChoiceProgressBarFilledChange() {
    studiChoiceProgressBarFilledSelector.style.width = (choicedStudiesCount*20).toString() +'%';
}