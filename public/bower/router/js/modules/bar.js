
define(['router.min!m/bar'], function(params) {

	console.log("Bar module loaded...");

	var name = params.name ? params.name : false;

	return {
		hello: function() {
			console.log("Bar says hello "+name);
		}
	};
});
