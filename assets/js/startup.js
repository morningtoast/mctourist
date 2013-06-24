App.Startup = (function($, Modernizr, App) {
	
	// Module variables. Use for local tracking
	var data = {
	}
	
	
	// Module init; This will run during onready if module is defined in the <body> data attribute
	var init = function() {
		_debug("startup.init()");
		
		var preload = _cookie.read("mtourist");
		if (preload) {
			window.location = "/map/"+preload;
		} else {
			window.location = "/home";
		}
	}
	
	
	// Local methods
	var local = {
		
	}
	
	
	
	// Module bindings
	var bind = {
	}
	
	
    return {
        init: init
    };

}(jQuery, Modernizr, App));

// END module