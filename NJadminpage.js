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

function selected_option(self, section_type) {
	return self.parent().children(`select[name="${section_type}"] .policy-control > option:selected`);
}

function next_field_keys(current, tree) {
	if (current.attr("name") == "policy") {
		return [];
	} else {
		keys = [];
		index_n_times = categories.indexOf(current.attr("name")) + 1;
		c_tree = tree;
		for (i = 0; i < index_n_times; i++) {
			console.log(selected_option(current, categories[i]).attr("value"))
			c_tree = c_tree[selected_option(current, categories[i]).val()];
		}
		return Object.keys(c_tree); // working on this error right now
	}
}

function prepare_policy(self) {
	if (self.parent().hasClass("policy-download")) {
		let docpath = "/".join(["../res/policies", $.each(categories.slice(0, 4), (ind, elem) => selected_option(self, elem).val())].flat());
		self.parent().children("form:has(button#policy-download-word)").attr("action", docpath);
		self.parent().children("form:has(button#policy-download-word) > button#policy-download-word").removeClass("btn-secondary").addClass("btn-primary");

		// conversions need to happen here. uncomment the lines below after the file conversion stuff has been implemented
		let pdfpath = "";
		// current.parent().children("form:has(button#policy-download-pdf)").attr("action", pdfpath);
		// current.parent().children("form:has(button#policy-download-pdf) > button#policy-download-pdf").removeClass("btn-secondary").addClass("btn-primary");
		return [];
	} else if (self.parent().hasClass("policy-upload")) {
		// IMPLEMENT UPLOADS AAA
		policy_upload = new FormData();
		policy_upload.append("to_upload", self.parent().children('input#policy-upload[type="file"]').prop("file"));
		policy_upload.append("reason", self.parent().children("textarea#upload-reason").text());

		$.ajax({
			url: "./includes/upload.php",
			dataType: "text",
			data: policy_upload,
			success: response => alert(response),
			error: response => alert(response)
		});
	}
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
					}).append("<button></button>", {
						class: "btn btn-secondary",
						id: "policy-download-" + elem.toLowerCase()
					}).text(`Download Document (${elem})`));
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
					class: "btn btn-secondary",
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

	$("select.policy-control").change(function() {
		console.log("policy option changed owo");
		let self = $(this) // scary
		// if there are no options in the element and it somehow fired a change event do nothing
		if (self.children().length == 0) return;

		// update the tree
		let policy_tree = get_file_tree();
		if (!policy_tree) {
			console.log("cant find file tree. ugxemricfssdaf");
			return; // i made error checking look!!
		}

		let changed = self.attr("name");
		let set = [];
		self.parent().children('select.policy-control').each((e, i) => {
			console.log($(this).is('select.policy-control:has(option:selected)'));
			set.push($(this).is('select.policy-control:has(option:selected)') && !$(this).is(self));
		});

		// when a field is changed all elements below said field are reset
		// this fixes the problem when, if, for example, chapter is changed while policy is set, the policy and subchapter fields are not reset and an invalid path is created
		if (!set.every((elem) => elem)) {
			console.log("169");
			$.each(categories.slice(set.indexOf(false)+1, categories.length-1), (ind, elem) => {
				selected_option(self, elem).html("");
			});
			$.each(["word", "pdf"], (ind, elem) => {
				self.parent().children(`form:has(button#policy-download-${elem})`).attr("action", "");
				self.parent().children(`form:has(button#policy-download-${elem}) > button#policy-download-${elem}`).removeClass("btn-primary").addClass("btn-secondary");
			});
		}

		// populate the options of the following select element now that specificity has increased by a degree
		if (self.attr("name") != "policy") {
			console.log("181");
			// keys is going to be the list of names of possible options for the current select field
			let keys = next_field_keys(self, policy_tree);

			// i should not be let near functional programming
			let options = $.map(keys, (e, i) => $("<option/>", {value: e}).text(e.split(" - ")));
			console.log(options);
			console.log(self.parent().children(`select[name="${categories[categories.indexOf(self.attr("name"))+1]}"].policy-control`).first());
			$.map(options, (e, i) => {
				console.log("e");
				self.parent().children(`select[name="${categories[categories.indexOf(yea)+1]}"].policy-control`).first().append(e);
			});
		} else {
			prepare_policy(self);
		}
	});
});
