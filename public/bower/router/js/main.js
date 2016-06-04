
curl({
	baseUrl: '/js',
	pluginPath: 'plugins',
	paths: {
		m: 'modules'
	}
}, ['router.min!']).then(function(routes) {

	var i = 0;
	for(; i < routes.length; i++) {
		if(routes[i].hello) {
			console.log("\r\nCalling public route method");
			routes[i].hello();
		}
	}

});
