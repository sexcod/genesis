Router - AMD Plugin
===================

Router is an AMD plugin which helps to asynchronously load modules in a multi page website. The modules required for the page are specified in a body tag attribute with optional key/value pair arguments. The example in this repo uses [Curl.js](https://github.com/cujojs/curl) but Router will work with [RequireJS](http://requirejs.org/) or any AMD loader that follows the CommonJS Loader Plugin specification.

**Specify the required modules with optional arguments in body[data-route]** 
	
	<body data-route="foo bar?name:chambaz,something:else">
	
**Call the plugin without arguments to fetch the modules required for the current page**
	
	curl(['router!']).then(function(routes) {
		
		// routes is an array of module references
		// public properties and methods can be accessed
		var i = 0;
		for(; i < routes.length; i++) {
			if(routes[i].hello) {
				routes[i].hello();
			}
		}
		
	});
	
**Call the plugin from within a module, passing the module name, to access the arguments specified in the body tag attribute** 
	
	// bar module
	define(['router!bar'], function(params) {
		
		console.log("Bar module loaded...");
	
		var name = params.name ? params.name : false;
		
		// return public methods
		return {
			hello: function() {
				console.log("Bar says hello "+name);
			}
		};
	});