function openNav() {
	document.getElementById('sidenav').style.width = '200px';
	document.getElementById('main').style.marginLeft = '200px';
}

function closeNav() {
	document.getElementById('sidenav').style.width = '0';
	document.getElementById('main').style.marginLeft = '0';
}

var accordions = document.getElementsByClassName('accordion');
var i;

for (i = 0; i < accordions.length; i = i + 1) {
	accordions[i].addEventListener('click', function () {
		this.classList.toggle('active');
		var panel = this.nextElementSibling;
		if (panel.style.display === 'block') {
			panel.style.display = 'none';
		} else {
			panel.style.display = 'block';
		}
	});
}
