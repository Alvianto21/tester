// Penandaan menu aktif
document.addEventListener('DOMContentLoaded', function() {
	const currentUrl = window.location.pathname;
	const navLinks = document.querySelectorAll('.nav-link');

	navLinks.forEach(link => {
		if (link.getAttribute('href') === currentUrl) {
			link.classList.add('active');
			link.closest('.nav-item').classList.add('menu-open');
			if(link.parentElement.parentElement.classList.contains("nav-treeview")){
				link.parentElement.parentElement.style.display = 'block';
			}
		}
	});

	// Penanganan tombol pushmenu
	const pushmenuButton = document.querySelector('[data-widget="pushmenu"]');
	const body = document.querySelector('body');

	pushmenuButton.addEventListener('click', function(event) {
		event.preventDefault();
		body.classList.toggle('sidebar-collapse');
		body.classList.toggle('sidebar-open');
	});
});

//toggle dark ?dark-mode
function toggleDarkMode() {
	const body = document.getElementById('body-element');
	const darkModeButton = document.querySelector('.nav-link .fas.fa-adjust');
	const currentTheme = body.classList.contains('dark-mode') ? 'light' : 'dark';

	if (currentTheme === 'dark') {
		body.classList.add('dark-mode');
		localStorage.setItem('theme', 'dark');
		darkModeButton.classList.remove('fa-sun');
		darkModeButton.classList.add('fa-moon');
	} else {
		body.classList.remove('dark-mode');
		localStorage.setItem('theme', 'light');
		darkModeButton.classList.remove('fa-moon');
		darkModeButton.classList.add('fa-sun');
	}
};

// Set initial theme based on localStorage value
document.addEventListener('DOMContentLoaded', function() {
	const body = document.getElementById('body-element');
	const savedTheme = localStorage.getItem('theme') || 'light';
	if (savedTheme === 'dark') {
		body.classList.add('dark-mode');
	} else {
		body.classList.remove('dark-mode');
	}
});