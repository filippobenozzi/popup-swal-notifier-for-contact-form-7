document.addEventListener( 'wpcf7mailsent', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'success',
	  showConfirmButton: false,
	  timer: 2500
	})
}, false );

document.addEventListener( 'wpcf7invalid', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'error',
	  showConfirmButton: false,
	  timer: 2500
	})
}, false );

document.addEventListener( 'wpcf7spam', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'warning',
	  showConfirmButton: false,
	  timer: 2500
	})
}, false );

document.addEventListener( 'wpcf7mailfailed', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'warning',
	  showConfirmButton: false,
	  timer: 2500
	})
}, false );

document.addEventListener( 'wpcf7submit', function( event ) {
	var divsToHide = document.getElementsByClassName("wpcf7-response-output");
	for(var i = 0; i < divsToHide.length; i++){
	    divsToHide[i].style.visibility = "hidden";
	    divsToHide[i].style.display = "none";
	}
}, false );