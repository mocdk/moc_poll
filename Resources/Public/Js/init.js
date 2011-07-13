jQuery(document).ready(function() {
	jQuery(".mocpoll").each(function() {
		/*global Poll*/
		new Poll(this);
	});
});