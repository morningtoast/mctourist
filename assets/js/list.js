App.List = (function($, Modernizr, App) {
	
	// Module variables. Use for local tracking
	var data = {
		templates: {}
	}
	
	
	// Module init; This will run during onready if module is defined in the <body> data attribute
	var init = function() {
		_debug("list.init()");
		
		data.templates.deleted = $("#tmpl-deleted").html();
		
		bind.init();

	}
	
	
	// Local methods
	var local = {
		
	}
	
	
	
	// Module bindings
	var bind = {
		init: function() {
			this.deleteRecord();
		},
		
		deleteRecord: function() {
			$("#layout-list .action").on("click", function(e) {
				e.preventDefault();
				var id = $(this).data("id");
				$.ajax({
					url:"/process.php",
					data: "uid="+App.Main.data.uid+"&delete="+id,
					dataType: "json",
					success: function(response) {
						$("body").addClass("response");
						$("#layout-list").html(Mustache.render(data.templates.deleted, response));
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