/**
* AMD Router Plugin
* -----------------
* Load AMD modules specified in body[data-route]
* Pass arguments to modules using syntax ?key:val,kay:val
*
* Free to use under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
*/

define(function() {

	function Router() {

		// fetch routes from body attr
		this.routes = this._parseRouteAttr();
		this.args = [];
		this.modules = [];

		// no routes so exit
		if(!this.routes) {
			return false;
		}

		// parse each route
		var rLength = this.routes.length,
			i = 0;

		for(; i < rLength; i++) {
			this._parseRoute(this.routes[i]);
		}
	}

	// return modules array
	Router.prototype.getMods = function() {
		return this.modules;
	};

	// return args array
	Router.prototype.getArgs = function() {
		return this.args;
	};

	// parse a route for module name and key/value arguments
	Router.prototype._parseRoute = function(route) {
		var routeParts = route.split('?'),
			params = {},
			j = 0;

		// store module reference
		this.modules.push(routeParts[0]);

		// parse arguments
		if(routeParts.length > 1) {
			this._parseArgs(routeParts);
		}
	};

	// parse route key/value arguments (key:value,key:value)
	Router.prototype._parseArgs = function(route) {
		var params = {}, j = 0;
		route = route[1].split(',');

		// loop round each key/value pair
		for(; j < route.length; j++) {
			var d = route[j].split(':');
			// params[key] = value
			params[d[0]] = d[1];
		}

		// store arguments against module reference
		this.args[route[0]] = params;
	};

	// fetch required modules from body[data-route]
	Router.prototype._parseRouteAttr = function() {
		var routes = document.body.getAttribute('data-route');
		return routes ? routes.split(' ') : false;
	};


	// return required AMD plugin load method
	return {
		load: function(name, req, load, config) {

			var router = new Router(),
				modules,
				args;

			// requesting module arguments
			if(name) {
				args = router.getArgs();
				// return arguments for specified module
				load(args[name] ? args[name] : false);
				return;
			}

			modules = router.getMods();

			// no modules to load
			if(!modules) {
				load();
				return false;
			}

			// load modules and return references
			req(modules, function() {
				load(arguments);
			});
		}
	};
});
