/* dCodes Framework: (c) TemplateAccess */

$(function () {
	$("span.dc_spoiler").hide();
	$('<a class="dc_view">View Spoiler &gt;&gt;</a> ').insertBefore('.dc_spoiler');
	$("a.dc_view").click(function () {
		$(this).parents("p").children("span.dc_spoiler").fadeIn(2000);
		$(this).parents("p").children("a.dc_view").fadeOut(500);
	});
});