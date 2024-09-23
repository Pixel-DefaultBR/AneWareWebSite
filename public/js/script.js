let cardComponents = document.querySelectorAll('.apear-card');

function setUpAnimation(components) {
    let sec = 1;
    components.forEach((component) => {
        sec += 1;
        component.style.animation = `upAnimation ${sec}s`
    })
}

setUpAnimation(cardComponents);