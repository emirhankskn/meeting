/* ALERT MESSAGES */
function flash(message, kind) {
    var alertDiv = document.createElement('div');
    alertDiv.classList.add('alert', kind);
    alertDiv.setAttribute('role', 'alert');
    alertDiv.textContent = message;
    document.getElementById('alertContainer').appendChild(alertDiv);

    setTimeout(function () { alertDiv.remove(); }, 5000); // 5 saniye sonra kaldır
}
/* ALERT MESSAGES */



/* PRODUCT LARGE IMAGES */
function enlargeImage(image) {
    var src = image.src;
    var enlargedImageHTML = '<div class="enlarged-image-overlay" onclick="closeEnlargedImage()"><img class="enlarged-image" src="' + src + '"></div>';
    document.body.insertAdjacentHTML('beforeend', enlargedImageHTML);
    document.body.style.overflow = 'hidden';
}

function closeEnlargedImage() {
    var enlargedImageOverlay = document.querySelector('.enlarged-image-overlay');
    enlargedImageOverlay.remove();
    document.body.style.overflow = 'auto';
}

/* PRODUCT LARGE IMAGES */
