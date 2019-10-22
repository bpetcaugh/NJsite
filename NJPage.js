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
				let formData = new FormData();

				formData.append("file", file);

				fetch("", {
					method: "POST",
					body: formData
				}).then(() => {
					// upload successful
				}).catch(() => {
					// upload failed
				});
			});
		});
	});
});