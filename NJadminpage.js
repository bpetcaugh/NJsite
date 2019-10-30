// UNTESTED
// css selectors are illegible :)

function get_file_tree() {
	let policy_tree = new FormData();

	// this invokes the php script at includes/policy_tree which is just an invocation of the python script at py/walk_polices.py :)
	$.ajax(
		url: "<?php echo site_url(includes/policy_tree.php); ?>",
		type: "POST",
		data: form_data,
		dataType: "json",
		success: data => {
			// note: this is terrible. please implement some way to check for errors. what were you thinking
			return true;
		}
	);
	return policy_tree;
}

// sorry wasn't sure what to name this function
// its just selector garbage to get the name of the selected option in the select element corresponding to the specified name within its div
function cool(self, section_type) {
	return self.parent().children("select[name=\"" + section_type + "\"] .policy-control")[0].children("option[selected=\"selected\"]")[0].attr("value");
}

function download_policy(self, filetype) {
	// just make sure we convert to docx if filetype is "word" and we're good
	// i have no idea how to download and i do not have internet access at the time of editing this

	if (self.parent().children('select[name="subchapter"] .policy-control').children('option[selected="selected"]').length > 0) {
		// i so desperately wish i could use map
		file_location = "/".join("../res/policies", cool(self, "volume"), cool(self, "chapter"), cool(self, "subchapter"), cool(self, "policy"));
	}
}

$(document).ready(function() {
	var policy_tree = get_file_tree();

	$("div.policy-selection").each((ind, elem) => {
		// populate volume dropdown if the div is empty (it probably will be)
		if ($(this).contents().length == 0) {
			// using strings at html elements is an awful idea. rewrite to use objects later
			var volume_select = '<select name="volume" class="policy-control form-control">';

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

			if ($(this).attr("class").split(" ").contains("policy-download")) {
				children += ["<button type=\"button\" class=\"btn btn-primary\" id=\"policy-download-word\">Download Document (Word)</button>", "<button type=\"button\" class=\"btn btn-primary\" id=\"policy-download-pdf\">Download Document (PDF)</button>"];
			} else if ($(this).attr("class").split(" ").contains("policy-upload")) {
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
	if ($(this).contents().length == 0) {
		return;
	}

	// update the tree
	var policy_tree = get_file_tree();

	// keys is going to be the list of names of possible options for the current select field
	var keys = [];

	// options is the generated html based on the names
	var options = "";

	if ($(this).attr("name") == "volume") {
		keys = policy_tree.policies[$(this).children('option[selected="selected"]')[0].attr("value")].keys();
	} else if ($(this).attr("name") == "chapter") {
		keys = policy_tree.policies[cool($(this), "volume")][cool($(this), "chapter")].keys();
	} else if ($(this).attr("name") == "subchapter") {
		keys = policy_tree.policies[cool($(this), "volume")][cool($(this), "chapter")][cool($(this), "subchapter")].keys();
	}

	keys.each((ind, elem) => {
		options += '\n\t<option value="' + elem + '">' + elem + '</option>';
	});

	// if ($(this).attr("name") == "subchapter") {
	// 	keys.each((ind, elem) => {
	// 		// modify this line when matt decides the naming scheme for the files. don't want version denotation appearing on the website
	// 		options += '\n\t<option value="' + elem + '">' + elem + '</option>';
	// 	});
	// } else {
	// 	keys.each((ind, elem) => {
	// 		// policy categories dont have versions
	// 		options += '\n\t<option value="' + elem + '">' + elem + '</option>';
	// 	});
	// }

	// populate the options of the following select element now that specificity has increased by a degree
	if ($(this).attr("name") != "policy") {
		// unfortunately we cannot create a select tag with the name "ik5sdyufng,jbg" as a result of this hack
		// that element is just a safety net and should never actually be accessed by the script
		let categories = ["volume", "chapter", "subchapter", "policy", "ik5sdyufng,jbg"];

		$(this).parent().children('select[name="' + categories[categories.index($(this).attr("name"))+1] + '"] .policy-control')[0].html(options);
	}
});

$("button#policy-download-word").click(function() {
	download_policy($(this), "word");
});

$("button#policy-download-pdf").click(function() {
	download_policy($(this), "pdf");
});
