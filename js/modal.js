function getModal(idModal, idSpan)
{
	// Get the button that opens the modal
	//var btn = document.getElementById(idBtn);

	// Get the modal
	var modal = document.getElementById(idModal);

	// Get the <span> element that closes the modal
	var span = document.getElementById(idSpan);

	// When the user clicks the button, open the modal
	//btn.onclick = function() {
	    modal.style.display = "block";
	//}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}/**
	 * Created by Brenn on 29/08/2016.
	 */
}

