// unfortunately we cannot create a select tag with the name "ik5sdyufng,jbg" as a result of this hack
// that element is just a safety net and should never actually be accessed by the script
var categories = ["volume", "chapter", "subchapter", "policy", "ik5sdyufng,jbg"];

function get_file_tree() {
	$.ajaxSetup({async: false});
	let policy_tree = {};
	$.getJSON("./res/dcf_policy_manual.json", (data) => {
		policy_tree = data;
	});
	$.ajaxSetup({async: true});
	return policy_tree;
}

$(document).ready(() => {
    if($(window).height() <= 675) { // Toggle elements on mobile
        $('#sidebar').toggleClass('active');
        $('#sidebarCollapse').toggleClass('acive');
    }

    $('#sidebarCollapse').on('click', () => {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
        if($(window).height() <= 675) { // Toggle elements on mobile
            $(".headerLogo").toggle();
        }
    });

	let policy_tree = get_file_tree();
	if (!policy_tree) return;

	$("div.policy-selection").each((ind, elem) => {
		// populate volume dropdown if the div is empty (it probably will be)
		if ($(elem).children().length == 0) {
			// using strings at html elements is an awful idea. rewrite to use objects later
			let volume_select = $("<select/>", {
				name: "volume",
				class: "policy-control form-control"
			});

			// sort the keys alphabetically so they are in volume order least -> greatest
			let volumes = Object.keys(policy_tree);

			$.each(volumes, (ind, elem) => {
				volume_select.append($("<option/>", {
					value: elem
				}).text(elem));
			});

			let children = [volume_select, $("<br>")];
			$.each(categories.slice(1, 4), (ind, elem) => {
				children.push($("<select/>", {
					name: elem,
					class: "policy-control form-control"
				}));
				children.push($("<br>"));
			});

			if ($(elem).hasClass("policy-download")) {
				$.each(["Word", "PDF"], (ind, elem) => {
					children.push($("<form/>", {
						method: "get",
						action: ""
					}).append(
						$("<button/>", {
							class: "btn",
							id: "policy-download-" + elem.toLowerCase()
						}).text(`Download Document (${elem})`)
					));
				});
			} else if ($(elem).hasClass("policy-upload")) {
				// i tried to make this legible
				$.map([$("<p/>")
					.text("Describe what changes you are making in the document. Then upload the new version (*This will include directions on what the file name should be*)."),
				$("<textarea/>", {
					rows: "6",
					cols: "70",
					id: "upload-reason"
				}),
				$("<br/>"), $("<br/>"),
				$("<p/>")
					.text("Upload the new version of your document here:"),
				$("<input/>", {
					type: "file",
					id: "policy-upload",
					class: "filestyle",
					name: "to_upload"
				}),
				$("<br/>"), $("<br/>"),
				$("<input/>", {
					id: "policy-submit",
					class: "btn",
					value: "Update"
				}).text("Update")], (e, i) => {
					children.push(e);
				});
			}

			// loops through the array and adds every element specified as a child of the div
			$.map(children, (e, i) => {
				elem.append(e[0]);
			});
		}
	});

	$(`div.policy-download select.policy-control`).change(function() {
		console.log($(this).attr("name"));
		switch ($(this).attr("name")) {
		case "volume":
			let nextc = Object.keys(policy_tree[this.value]);
			let next_elemc = $("<div/>");
			$.each(nextc, (ind, elem) => {
				next_elemc.append($("<option/>", {
					value: elem
				}).text(elem));
			});
			$(this).parent().find(`select[name="chapter"].policy-control`).html(next_elemc.html());
		case "chapter":
			let nexts = Object.keys(policy_tree[$(this).parent().find(`select[name="volume"]`)[0].value][$(this).parent().find(`select[name="chapter"].policy-control`)[0].value]);
			let next_elems = $("<div/>");
			$.each(nexts, (ind, elem) => {
				next_elems.append($("<option/>", {
					value: elem
				}).text(elem));
			});
			$(this).parent().find(`select[name="subchapter"].policy-control`).html(next_elems.html());
		case "subchapter":
			let nextp = Object.keys(policy_tree[$(this).parent().find(`select[name="volume"]`)[0].value][$(this).parent().find(`select[name="chapter"]`)[0].value][$(this).parent().find(`select[name="subchapter"]`)[0].value]);
			let next_elemp = $("<div/>");
			$.each(nextp, (ind, elem) => {
				next_elemp.append($("<option/>", {
					value: elem
				}).text(elem.substring(0, elem.lastIndexOf(" - "))));
			});
			$(this).parent().find(`select[name="policy"].policy-control`).html(next_elemp.html());
		case "policy":
			$(`button#policy-download-word`).removeClass("btn-primary");
			$(`button#policy-download-pdf`).removeClass("btn-primary");
			let path = "./res/policies/" + policy_tree[$(this).parent().find(`select[name="volume"]`)[0].value][$(this).parent().find(`select[name="chapter"]`)[0].value][$(this).parent().find(`select[name="subchapter"]`)[0].value][$(this).parent().find(`select[name="policy"]`)[0].value];
			$(`button#policy-download-word`).parent().attr("action", path.split(".pdf")[0] + ".docx");
			$(`button#policy-download-pdf`).parent().attr("action", path);
			$(`button#policy-download-word`).addClass("btn-primary");
			$(`button#policy-download-pdf`).addClass("btn-primary");
		}
	});

	$(`div.policy-upload select.policy-control`).change(function() {
		console.log($(this).attr("name"));
		switch ($(this).attr("name")) {
		case "volume":
			let nextc = Object.keys(policy_tree[this.value]);
			let next_elemc = $("<div/>");
			$.each(nextc, (ind, elem) => {
				next_elemc.append($("<option/>", {
					value: elem
				}).text(elem));
			});
			$(this).parent().find(`select[name="chapter"].policy-control`).html(next_elemc.html());
		case "chapter":
			let nexts = Object.keys(policy_tree[$(this).parent().find(`select[name="volume"]`)[0].value][$(this).parent().find(`select[name="chapter"].policy-control`)[0].value]);
			let next_elems = $("<div/>");
			$.each(nexts, (ind, elem) => {
				next_elems.append($("<option/>", {
					value: elem
				}).text(elem));
			});
			$(this).parent().find(`select[name="subchapter"].policy-control`).html(next_elems.html());
		case "subchapter":
			let nextp = Object.keys(policy_tree[$(this).parent().find(`select[name="volume"]`)[0].value][$(this).parent().find(`select[name="chapter"]`)[0].value][$(this).parent().find(`select[name="subchapter"]`)[0].value]);
			let next_elemp = $("<div/>");
			$.each(nextp, (ind, elem) => {
				next_elemp.append($("<option/>", {
					value: elem
				}).text(elem.substring(0, elem.lastIndexOf(" - "))));
			});
			$(this).parent().find(`select[name="policy"].policy-control`).html(next_elemp.html());
		case "policy":
			let policy_upload = new FormData();
			policy_upload.append("to_upload", $(this).parent().children('input#policy-upload[type="file"]').prop("file"));
			policy_upload.append("reason", $(this).parent().children("textarea#upload-reason").text());
			policy_upload.append("newname", policy_tree[$(this).parent().find(`select[name="volume"]`)[0].value][$(this).parent().find(`select[name="chapter"]`)[0].value][$(this).parent().find(`select[name="subchapter"]`)[0].value][$(this).parent().find(`select[name="policy"]`)[0].value]);
			console.log($(this).parent().children('input#policy-upload[type="file"]').prop("file"));
			console.log($(this).parent().children("textarea#upload-reason").val());

			$.ajax({
				url: "./includes/upload.php",
				dataType: "text",
				data: policy_upload,
				success: response => alert(response),
				error: response => alert(response)
			});
		}
	});
});
