// UNTESTED
// css selectors are illegible :)

function get_file_tree() {
	let policy_tree = new FormData();
	let err = false;

	// this invokes the php script at includes/policy_tree which is just an invocation of the python script at py/walk_polices.py :)
	$.ajax(
		url: '<?php echo site_url("includes/policy_tree.php"); ?>',
		type: "POST",
		data: form_data,
		dataType: "json",
		success: data => {
			if (data.error !== 0) {
				// theres got to be a better way
				err = true;
				alert("error: could not index policies");
			}
		}
	);
	if (!err) {
		return policy_tree;
	}
	return false;
}

// sorry wasn't sure what to name this function
// its just selector garbage to get the name of the selected option in the select element corresponding to the specified name within its div
function cool(self, section_type) {
	return self.parent().children("select[name=\"" + section_type + "\"] .policy-control")[0].children("option[selected=\"selected\"]")[0].attr("value");
}

$(document).ready(function() {
	var policy_tree = get_file_tree();
	if (!policy_tree) return;

	$("div.policy-selection").each((ind, elem) => {
		// populate volume dropdown if the div is empty (it probably will be)
		if ($(this).contents().length == 0) {
			// using strings at html elements is an awful idea. rewrite to use objects later
			let volume_select = '<select name="volume" class="policy-control form-control">';

			// sort the keys alphabetically so they are in volume order least -> greatest
			let volumes = policy_tree.policies.keys();

			volumes.each((ind, elem) => {
				volume_select += '\n\t<option value="' + elem + '">' + elem + '</option>';
			});
			volume_select += "</select>";

			// i should not be let near functional programming
			children = [volume_select, "<br>",`<select name="chapter" class="policy-control form-control">
			</select>`, "<br>", `<select name="subchapter" class="policy-control form-control">
			</select>`, "<br>", `<select name="policy" class="policy-control form-control">
			</select>`, "<br>"];

			if ($(this).hasClass("policy-download")) {
				children += [`<form method="get" action="">
					<button type="button" class="btn btn-secondary" id="policy-download-word">Download Document (Word)</button>
				</form>`, `<form method="get" action="">
					<button type="button" class="btn btn-secondary" id="policy-download-pdf">Download Document (PDF)</button>
				</form>`];
			} else if ($(this).hasClass("policy-upload")) {
				children += [`<form>
					<p>Describe what changes you are making in the document. Then upload the
						new version (*This will include directions on what the file name should be*).
					</p>
					<textarea rows="6" cols="70"></textarea>
					<br><br>
					<p>Upload the new version of your document here:</p>
					<input type="file" class="filestyle">
					<br><br>
					<button type="button" class="btn btn-primary">Update</button>
				</form>`];
			}

			// loops through the array and adds every element specified as a child of the div
			children.map($(this).append);
		}
	});
});

$("select.policy-control").change(function() {
	// if there are no options in the element and it somehow fired a change event do nothing
	if ($(this).contents().length == 0) return;

	// update the tree
	let policy_tree = get_file_tree();
	if (!policy_tree) return; // i made error checking look!!

	// keys is going to be the list of names of possible options for the current select field
	let keys = [];

	// options is the generated html based on keys the names
	let options = "";

 	switch ($(this).attr("name")) {
	case "volume":
		keys = policy_tree.policies[$(this).children('option[selected="selected"]')[0].attr("value")].keys();
		break;
	case "chapter":
		keys = policy_tree.policies[cool($(this), "volume")][cool($(this), "chapter")].keys();
		break;
	case "subchapter":
		keys = policy_tree.policies[cool($(this), "volume")][cool($(this), "chapter")][cool($(this), "subchapter")].keys();
		break;
	case "policy":
		if ($(this).parent().hasClass("policy-download")) {
			let docpath = "/".join("../res/policies", cool(self, "volume"), cool(self, "chapter"), cool(self, "subchapter"), cool(self, "policy"))
			$(this).parent().children("form:has(button#policy-download-word)").attr("action", docpath);
			$(this).parent().children("form:has(button#policy-download-word) > button#policy-download-word").removeClass("btn-secondary").addClass("btn-primary");

			// conversions need to happen here. uncomment the lines below after the file conversion stuff has been implemented
			let pdfpath = "";
			// $(this).parent().children("form:has(button#policy-download-pdf)").attr("action", pdfpath);
			// $(this).parent().children("form:has(button#policy-download-pdf) > button#policy-download-pdf").removeClass("btn-secondary").addClass("btn-primary");
		}
		// no break statement because i want it to fall through to the return in the default block
		// this is on purpose. no one correct this
	default:
		return;
	}

	keys.each((ind, elem) => {
		options += '\n\t<option value="' + elem + '">' + elem + '</option>';
	});

	// populate the options of the following select element now that specificity has increased by a degree
	if ($(this).attr("name") != "policy") {
		// unfortunately we cannot create a select tag with the name "ik5sdyufng,jbg" as a result of this hack
		// that element is just a safety net and should never actually be accessed by the script
		let categories = ["volume", "chapter", "subchapter", "policy", "ik5sdyufng,jbg"];

		$(this).parent().children('select[name="' + categories[categories.index($(this).attr("name"))+1] + '"] .policy-control')[0].html(options);
	}
});
