var isAutoClose = PopUpParamsCF7.popupnotifiercf7_option_isAutoClose ? true : false;
var customSeconds = PopUpParamsCF7.popupnotifiercf7_option_customSeconds ? PopUpParamsCF7.popupnotifiercf7_option_customSeconds : 2500;
var customTextButton = PopUpParamsCF7.popupnotifiercf7_option_customTextButton ? PopUpParamsCF7.popupnotifiercf7_option_customTextButton : 'Close';

document.addEventListener( 'wpcf7mailsent', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'success',
	  showConfirmButton: isAutoClose,
	  timer: customSeconds,
	  confirmButtonText: customTextButton,
	})
}, false );

document.addEventListener( 'wpcf7invalid', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'error',
	  showConfirmButton: isAutoClose,
	  timer: customSeconds,
	  confirmButtonText: customTextButton,
	})
}, false );

document.addEventListener( 'wpcf7spam', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'warning',
	  showConfirmButton: isAutoClose,
	  timer: customSeconds,
	  confirmButtonText: customTextButton,
	})
}, false );

document.addEventListener( 'wpcf7mailfailed', function( event ) {
	Swal.fire({
	  title: event.detail.apiResponse.message,
	  icon: 'warning',
	  showConfirmButton: isAutoClose,
	  timer: customSeconds,
	  confirmButtonText: customTextButton,
	})
}, false );

document.addEventListener( 'wpcf7submit', function( event ) {
	var divsToHide = document.getElementsByClassName("wpcf7-response-output");
	for(var i = 0; i < divsToHide.length; i++){
	    divsToHide[i].style.visibility = "hidden";
	    divsToHide[i].style.display = "none";
	}
}, false );

