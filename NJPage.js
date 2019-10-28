$(document).ready(function () {
    if($(window).height() <= 675) { // Toggle elements on mobile
        $('#sidebar').toggleClass('active');
        $('#sidebarCollapse').toggleClass('acive');
    }

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
        if($(window).height() <= 675) { // Toggle elements on mobile
            $(".headerLogo").toggle();
        }
    });

	// uploads
	$("div.upload").each((i, elem) => {
		elem.id = i.toString();

		["dragenter", "dropenter", "dragleave", "drop"].forEach(eventName => {
			elem.on(eventName, () => {
				e.preventDefault();
				e.stopPropagation();
			});
		});

		["dragenter", "dragover"].forEach(eventName => {
			elem.on(eventName, e => {
				e.addClass("upload-highlight");
			});
		});

		["dragleave", "drop"].forEach(eventName => {
			elem.on(eventName, e => {
				e.removeClass("upload-highlight");
			});
		});

		elem.on("drop", e => {
			e.dataTransfer.files.forEach(file => {
				let url = "./upload.php";
				let xhr = new XMLHttpRequest();
				let formData = new FormData();
				xhr.open("POST", url, true);

				xhr.addEventListener("readystatechange", el => {
					if (xhr.readyState == 4 && xhr.status == 200) {
						// upload done
					} else if (xhr.readyState == 4 && xhr.status != 200) {
						// error
					}
				});

				formData.append("file", file);
				xhr.send(formData);
			});
		});
	});
});