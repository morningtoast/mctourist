var App = {};

App.Global = (function($, Modernizr, App) {
	
	// Module variables. Use for local tracking
	var data = {
		uid: false,
		distPerDay: 5172
	}
	
	// Runs inline
	var instant = function() {
		_debug("global.instant()");
	
	}
	
	// Runs on doc ready
	var onready = function() {
		_debug("global.onready()");

		// Global mdule
		this.init();

		// Set the controller and action names
		var modules = $("body").data("module").split(".");
		modules.forEach(function(module) { 
			if (typeof App[module] !== 'undefined') {
				if (typeof App[module].init !== 'undefined') {
					App[module].init();
				}
			}
		});		

		
	};	
	
/* REGULAR METHODS */
	
	// Module init; This will run during onready if module is defined in the <body> data attribute
	var init = function() {
		_debug("global.init()");
		
		data.uid    = $("body").data("uid");
		data.saveto = "/data/"+data.uid;
	}
	
	
	// Local methods
	var local = {

	}
	
	
	
	// Module bindings
	var bind = {
	
	
	}
	
	
    return {
		init: init,
        instant: instant,
		onready: onready,
        data: data
    };

}(jQuery, Modernizr, App));

// END module

App.Global.instant();

$(document).ready(function() {
    App.Global.onready();
});