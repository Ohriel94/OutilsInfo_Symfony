function allowDrop(event) {
	console.log('allowDrop', event);
	event.preventDefault();
}

function drag(event) {
	console.log('drag', event);
	event.dataTransfer.setData('text', event.target.innerText);
}

function drop(event) {
	console.log('drop', event);
	event.preventDefault();
	var data = event.dataTransfer.getData('text');
	event.target.appendChild(document.createTextNode(data));
}
