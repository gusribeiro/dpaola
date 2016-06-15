$(function() {
	$("a.about").click(function() {
		$("#about").slideDown();
	});
	
	if ($(".work_list").length > 0) {
		var i = 1;
		$(".work_list li").each(function() {
			if (i % 3 == 0) {
				$(this).css("marginRight","0");
			}
			i++;
		});
	}
});