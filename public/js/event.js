var modal = document.getElementById('order-box');
var noidung = document.getElementById('output-content');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
// var idEating;
// function outputContent(id, str) {
//     document.getElementById('output-content').innerHTML = str + id;
//     document.getElementById('idEating').value = parseInt(id);
//     // idEating = parseInt(id);
//     // document.getElementById('output-content').innerHTML = idEating;
// }

function showEating(id, str) {
	document.getElementById('order-box').style.display = 'block';
	document.getElementById('output-content').innerHTML = str;
	document.getElementById('idEating').value = parseInt(id);
}

function confirmOrder() {
	var r = confirm('Do you really want to order?');
	if (r) {
		// alert('Successed! Click OK to back HOMEPAGE.');
		return true;
	} else {
		return false;
	}
}