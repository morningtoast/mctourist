App.Home = (function($, Modernizr, App) {
	
	// Module variables. Use for local tracking
	var data = {
		templates: {}
	}
	
	
	// Module init; This will run during onready if module is defined in the <body> data attribute
	var init = function() {
		_debug("home.init()");
		
		//data.templates.success = $("#tmpl-success").html();
		bind.init();
	}
	
	
	// Local methods
	var local = {
		
	}
	
	
	
	// Module bindings
	var bind = {
		init: function() {
			this.createNew();
			this.loadExisting();
		},
		
		createNew: function() {
			$("#createnew").on("click", function(e) {
				e.preventDefault();
				var d = new Date();
				var timestamp = d.getTime();
				$.ajax({
					url:"/api.php",
					data: "new="+timestamp,
					dataType: "json",
					success: function(response) {
						_cookie.create("mtourist", response.data.uid, 30);
						window.location = "/map/"+response.data.uid;
					}
				});
			});
		},

		loadExisting: function() {
			$("#load-existing").on("click", function(e) {
				e.preventDefault();

				var code = $("#existing-id").val();
				
				$.ajax({
					url:"/process.php",
					data: "load="+code,
					dataType: "json",
					success: function(response) {
						if (response.success == true) {
							window.location = "/map/"+response.code;
						} else {
							alert("Invalid code");
						}
					}
				});
			});
		}		
	
		
	
	}
	
	
    return {
        init: init
    };

}(jQuery, Modernizr, App));

// END module