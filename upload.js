// i need to test this oops

function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(function() {
	if (!(document.createElement && document.getElementsByTagName)) return;

	var fakeFileUpload = document.createElement('div');
	fakeFileUpload.className = 'fakefile';
	fakeFileUpload.appendChild(document.createElement('input'));

	var image = document.createElement('img');
	image.src = 'pix/button_select.gif';
	fakeFileUpload.appendChild(image);

	var x = document.getElementsByTagName('input');
	for (var i=0; i<x.length; i++) {
		if (x[i].type != 'file') continue;
		if (x[i].parentNode.className != 'upload') continue;
		x[i].className = 'file hidden';

		var clone = fakeFileUpload.cloneNode(true);
		x[i].parentNode.appendChild(clone);
		x[i].relatedElement = clone.getElementsByTagName('input')[0];

		x[i].onchange = x[i].onmouseout = function() {
			this.relatedElement.value = this.value;
		}
		x[i].onselect = function() {
			this.relatedElement.select();
		}
	}
})
