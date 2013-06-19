App.Main = (function($, Modernizr, App) {
	
	// Module variables. Use for local tracking
	var data = {
		uid: false,
		templates: {},
		player: false,
		destination: false,
		distPerDay: 5172,
		coords: {}
	}
	
	
	// Module init; This will run during onready if module is defined in the <body> data attribute
	var init = function() {
		_debug("main.init()");
		bind.init();
		data.uid = $("body").data("uid");
		data.db  = "./"+data.uid+".txt";
		
		local.storeTemplates();
		local.load();
		
		console.log(data.foo);
	}
	
	
	// Local methods
	var local = {
		storeTemplates: function() {
			data.templates = {
				location: $("#tmpl-list-row").html(),
				readout: $("#tmpl-readout").html()
			}
		},
		
		load: function() {
			$.ajax({
				url:data.db,
				dataType: "json",
				success: function(response) {
					$.each(response, function(k,v) {
						$("#locations").append(Mustache.render(data.templates.location, v));	
						data.coords[v.id] = v;
					});
				}
			});		
		
		},
		
		getDirection: function(deg) {
			var dir  = "North";
			//var cone = 15; // Degrees to offset for NESW
			
			if (deg > 0 && deg <= 15) { dir = "North"; }
			if (deg > 15 && deg <= 75) { dir = "Northeast"; }
			if (deg > 75 && deg <= 105) { dir = "East"; }
			if (deg > 105 && deg <= 165) { dir = "Southeast"; }
			if (deg > 165 && deg <= 195) { dir = "South"; }
			if (deg > 195 && deg <= 255) { dir = "Southwest"; }
			if (deg > 255 && deg <= 285) { dir = "West"; }
			if (deg > 285 && deg <= 345) { dir = "Northwest"; }
			if (deg > 345 && deg <= 360) { dir = "North"; }
		
			return(dir);
		},
		
		getDegrees: function (ox, oy, dx, dy) {
			var rad = Math.atan2((dx - ox), (dy - oy));
			var deg = rad * (180/Math.PI);
			
			if (deg < 0) { deg = (360 + deg); }	
		
			return(deg);
		},
		
		getBearing: function (ox, oy, dx, dy) {
			return(local.getDegrees(ox, oy, dx, dy));
		},
		
		getOrigin: function(x, y) {
			return(local.getDegrees(x, 0, y, 0));
		},
		
		locatePlayer: function() {
			data.destination = false;
		
			var zpos = $("#locatez").val();
			data.player = {
				x: $("#locatex").val(),
				z: zpos,
				rz: (0 - zpos)
			}
			
			console.log(data.player);
			
			// =degrees(atan2(C7-$A$1,D7-$B$1))
			if (!data.destination) {
				var deg = local.getOrigin(data.player.x, data.player.rz);
				var dir = local.getDirection(deg);
				
				
				//$("#readout").html(" "+dir); 
				local.displayReadout("You are in the", dir);
			}
		},
		
		displayReadout: function(prefix, direction, suffix) {
			var o = {"prefix": prefix, "direction":direction, "suffix":suffix}
			$("#readout").html(Mustache.render(data.templates.readout, o));
			return(o);
		}
	}
	
	
	
	// Module bindings
	var bind = {
		init: function() {
			console.log("bind.init");
			this.submitNew();
			this.submitLocate();
			this.viewDestination();
		},
		
		submitNew: function() {
			$("#savenew").on("click", function(e) {
				e.preventDefault();
				var formData = $("#newlocation").serialize()+"&savenew=1";
				$.ajax({
					url:"process.php",
					data: formData,
					dataType: "json",
					success: function(response) {
						$("#newlocation input[type=text]").val("");
						$("#locations").append(Mustache.render(data.template, response));
						
						
						data.coords[response.id] = response;
					}
				});
			});
		},
		
		submitLocate: function() {
			$("#submit_locateplayer").on("click", function(e) {
				e.preventDefault();
				
				
				local.locatePlayer();
				
			});
		},

		viewDestination: function() {
			$("#locations").on("click", "li span", function(e) {
				var dest = $(this).parent().parent().data();
				dest.rz = (0 - dest.z);
				data.destination = dest;
				
				// =degrees(atan2(C15-$A$1,D15-$B$1))
				// =MIN(SQRT((C7-$A$1)^2+(D7-$B$1)^2))
				if (data.player) {
					var bearing = local.getBearing(data.player.x, data.player.rz, data.destination.x, data.destination.rz);
					var pow     = Math.pow((data.destination.x - data.player.x),2) + Math.pow((data.destination.rz - data.player.rz),2);
					
					var dist = Math.floor(Math.sqrt(pow));
					var dir  = local.getDirection(bearing);
	
					console.log("units away "+dist);
					console.log("head "+bearing);
					console.log("need to head "+dir);
					
					if (dist >= data.distPerDay) {
						var days = Math.floor(dist / data.distPerDay);
						var timeToWalk = "about "+days+" days";
					} else {
						var timeToWalk = "about 1 day";
						
						var halfDay = Math.floor(data.distPerDay / 2);
						if (dist < halfDay) {
							var timeToWalk = "less than half a day";
						}
						
					}
					
					//$("#readout").html(" "+dir+" for "+dist+" blocks. );
					
					local.displayReadout("To get to "+data.destination.name+" head ", dir, "It will take you "+timeToWalk+" walking.");
					
				} else {
					alert("need player");
				}
				
			});
		}
	
	}
	
	
    return {
        init: init,
        data: data
    };

}(jQuery, Modernizr, App));

// END module