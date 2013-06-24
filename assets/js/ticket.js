App.Ticket = (function($, Modernizr, App) {
	
	// Module variables. Use for local tracking
	var data = {
		templates: {},
		player: false,
		destination: false,
		coords: {}
	}
	
	
	// Module init; This will run during onready if module is defined in the <body> data attribute
	var init = function() {
		_debug("ticket.init()");
		bind.init();
		
		local.load(); // Loads book location list into slider
		
		//document.ontouchmove = function(e){ e.preventDefault(); }
		//console.log(data.foo);
	}
	
	
	// Local methods
	var local = {
		
		load: function() {
			$.ajax({
				url:App.Global.data.saveto,
				dataType: "json",
				success: function(response) {
					$.each(response.locations, function(k,v) {
						//$("#locations").append(_templates.render("#tmpl-list-row",v));	
						//data.coords[v.id] = v;
					});
					
					var fromPointId = response.recent.from;
					var destPointId = response.recent.to;
					
					var fromData = response.locations[fromPointId];
					var destData = response.locations[destPointId];

				
					var bearing   = local.getBearing(fromData.x, fromData.z, destData.x, destData.z);
					var direction = local.getDirection(bearing);
					var distance  = local.getDistance(fromData.x, fromData.z, destData.x, destData.z);
					var daytime   = local.getDayTime(distance);
					
					var viewdata = {
						"fromport": fromData.port,
						"fromlandmark": fromData.landmark,
						"fromx": fromData.x,
						"fromz": fromData.z,
						"toport": destData.port,
						"tolandmark": destData.landmark,
						"tox": destData.x,
						"toz": destData.z,
						"direction": direction,
						"days": daytime,
						"distance":distance
					}
					
					$("#layout-content").html(_templates.render("#tmpl-ticket",viewdata));
					
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
		
		getDegrees: function (ox, oz, dx, dz) {
			oz   = (0 - oz);
			dz   = (0 - dz);
			
			var rad = Math.atan2((dx - ox), (dz - oz));
			var deg = rad * (180/Math.PI);
			
			if (deg < 0) { deg = (360 + deg); }	
		
			return(deg);
		},
		
		getBearing: function (ox, oz, dx, dz) {
			return(local.getDegrees(ox, oz, dx, dz));
		},
		
		getOrigin: function(x, z) {
			return(local.getDegrees(x, 0, z, 0));
		},
		
		getDistance: function (ox, oz, dx, dz) {
			oz   = (0 - oz);
			dz   = (0 - dz);
			
			var pow  = Math.pow((dx - ox),2) + Math.pow((dz - oz),2);
			var dist = Math.floor(Math.sqrt(pow));
			return(dist);
		},
		
		getDayTime: function(dist) {
			var days    = 1;
			var halfDay = Math.floor(data.distPerDay / 2);
		
			if (dist >= App.Global.data.distPerDay) {
				days = Math.floor(dist / App.Global.data.distPerDay);
			} else {
				if (dist < halfDay) {
					days = "< 1";
				}
			}		
			
			return(days);
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
		},
		
		toggleScroll: function() {
			window.scrollTo(0, 0);
			$("body").toggleClass("canscroll");
	 
			if ($("body").hasClass("canscroll")) {
				//document.ontouchmove = function(e){ return true; } // Allow scroll when on a content page
			} else {
				
				//document.ontouchmove = function(e){ e.preventDefault(); } // Disable scroll when going back to ticket
			}
		}
	}
	
	
	
	// Module bindings
	var bind = {
		init: function() {
			console.log("bind.init");
			this.logout();
			this.changeWaypoint();
			this.submitLocate();
			this.viewDestination();
			

			
			
		},
		
		logout: function() {
			$("#layout-ticket .menu .home").on("click", function(e) {
				e.preventDefault();
				_cookie.erase("mtourist");
				window.location = "/";
			});
		},
		
		
		changeWaypoint: function() {
			$("#flipper .station").on("click", function() {
				$("#layout").toggleClass("view-switcher");
				//local.toggleScroll();
			});		
			
			$("#layout-switcher .close").on("click", function(e) {
				e.preventDefault();
				
				$("#layout").toggleClass("view-switcher");
				//local.toggleScroll();
			});
		},
		
		submitLocate: function() {
			$("#submit_locateplayer").on("click", function(e) {
				e.preventDefault();
				
				
				local.locatePlayer();
				
			});
		},

		viewDestination: function() {
			$("#locations").on("click", "td .view", function(e) {
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
					window.scrollTo(0,0);
				} else {
					alert("TBD");
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