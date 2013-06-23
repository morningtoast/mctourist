App.Add = (function($, Modernizr, App) {
	
	// Module variables. Use for local tracking
	var data = {
		templates: {}
	}
	
	
	// Module init; This will run during onready if module is defined in the <body> data attribute
	var init = function() {
		_debug("add.init()");
		
		data.templates.success = $("#tmpl-success").html();
		
		bind.init();

	}
	
	
	// Local methods
	var local = {
		
	}
	
	
	
	// Module bindings
	var bind = {
		init: function() {
			this.submitNew();
		},
		
		submitNew: function() {
			$("#submit-new").on("click", function(e) {
				e.preventDefault();
				var formData = $("#add-form").serialize()+"&savenew=1";
				$.ajax({
					url:"/process.php",
					data: formData,
					dataType: "json",
					success: function(response) {
						$("body").addClass("response");
						$("#layout-add").html(Mustache.render(data.templates.success, response));
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