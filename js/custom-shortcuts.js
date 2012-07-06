
shortcut.add("Ctrl+A",function() {
	window.location = "/competitors/create";
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});
shortcut.add("Ctrl+S",function() {
	window.location = "/competitors/admin";
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});
shortcut.add("Ctrl+Shift+S",function() {
	window.location = "/competitors/globaladmin";
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});