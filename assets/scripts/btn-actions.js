// Get all elements with class="close"
var closebtns = document.getElementsByClassName('btn-close');
var i;

// Loop through the elements, and hide the parent, when clicked on
for (i = 0; i < closebtns.length; i++) {
	closebtns[i].addEventListener('click', closeNotifications);
}

function closeNotifications() {
	console.log(this.parentElement);
	this.parentElement.style.display = 'none';
}
