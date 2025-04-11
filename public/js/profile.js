//profile imange preview
function previewImage() {
	const photo = document.querySelector('#photo');
	const imgPreview = document.querySelector('.img-preview');

	imgPreview.style.display = 'block';

	const oFReader = new FileReader();
	oFReader.readAsDataURL(photo.files[0]);

	oFReader.onload = function(oFREvent) {
		imgPreview.src = oFREvent.target.result;
	}
}

//password validation
function validatePasswords() {
	const password = document.getElementById('password').value;
	const passwordConfirmation = document.getElementById('password_confirmation').value;

	if (password !== passwordConfirmation) {
		alert('Passwords do not match.');
		return false;
	}
	return true;
}

//adminLTE file input
jQuery(document).ready(function () {
	bsCustomFileInput.init();
});