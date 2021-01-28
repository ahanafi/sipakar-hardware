let showAlert = function (type, alertType, alertTitle, messageText) {
	'use strict';
	if (type === 'message') {
		Swal.fire({
			title: alertTitle,
			text: messageText,
			icon: alertType,
			timer: 2000,
		})

	} else if (type === 'confirm') {
		Swal.fire({
			title: alertTitle,
			text: messageText,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3f51b5',
			cancelButtonColor: '#ff4081',
			confirmButtonText: 'Ya, Lanjutkan.',
		})
	}
}
