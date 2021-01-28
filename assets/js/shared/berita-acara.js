const readURL = (input) => {
	if (input.files && input.files.length > 0) {
		const imgPreview = document.querySelector("#preview");
		if(imgPreview.hasChildNodes()) {
			document.querySelectorAll("#preview > div").forEach(el => el.remove());
		}
		const inputLength = input.files.length;
		for (let i = 0; i < inputLength; i++) {
			let reader = new FileReader();
			const colWidth = (inputLength === 1) ? "12" : (inputLength === 2) ? "6" : "4";
			let div = document.createElement("div");
			div.setAttribute("class", `col-${colWidth}`);
			reader.onload = function (e) {
				div.innerHTML = `<img class='img img-fluid' src="${e.target.result}" />`;
			}
			reader.readAsDataURL(input.files[i]);
			imgPreview.appendChild(div);
		}
	}
}

if(document.getElementById("uraian_materi")) {
	$("#uraian_materi").summernote({
		height: 280,
		tabSize:1
	});
}

 const toggleOtherApp = (el) => {
	if(el.getAttribute('data-checked') == 'false') {
		el.setAttribute('data-checked', 'true');
		document.getElementById("otherAppName").classList.remove('hidden');
	} else {
		el.setAttribute('data-checked', 'false');
		document.getElementById("otherAppName").classList.add('hidden');
	}
 }
