let cardComponents = document.querySelectorAll('.apear-card');
const fileInput = document.getElementById('file-input');
const imagePreview = document.getElementById('image-preview');

function setUpAnimation(components) {
    let sec = 1;
    components.forEach((component) => {
        sec += 1;
        component.style.animation = `upAnimation ${sec}s`
    })
}

setUpAnimation(cardComponents);

fileInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});
