function openNav() {
	document.getElementById('mySidenav').style.width = '250px';
	document.getElementById('main').style.marginLeft = '250px';
}

function closeNav() {
	document.getElementById('mySidenav').style.width = '0';
	document.getElementById('main').style.marginLeft = '0';
}

var acc = document.getElementsByClassName('accordion');
var i;

for (i = 0; i < acc.length; i = i + 1) {
	acc[i].addEventListener('click', function () {
		this.classList.toggle('active');
		var panel = this.nextElementSibling;
		if (panel.style.display === 'block') {
			panel.style.display = 'none';
		} else {
			panel.style.display = 'block';
		}
	});
}
