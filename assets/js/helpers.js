// Global debug
function _debug(s) {
	if (typeof console === "undefined") {
		console = { log: function(s){ alert(s); } }
	} else {
		console.log(s);
	}
}


// Returns query string variables as key/value object, or returns value of key specified by 'single'
function _getvars(single) {
	var query = {};
    var pairs = location.search.slice(1).split('&');
    
    pairs.forEach(function(pair) { pair = pair.split('='); query[pair[0]] = pair[1] || ''; });

    if (single) {
    	query = query[single];
    }


    return(query);
}


function _loadTemplates() {

}

var _templates = {
	store: {},
	render: function(templateId, viewData) {
		var html   = this.load(templateId);
		var render = Mustache.render(html, viewData);
		
		return(render);
	},
	
	load: function(elId) {
		var name = elId.replace("#","");
		var template;

		if (!this.store[name]) {
			var html     = $(elId).html();
			template = this.store[name] = html;
		} else {
			template = this.store[name];
		}
			
		return(template);
	}
}


// Cookie helpers
var _cookie = {
    create: function (name,value,days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            expires = "; expires="+date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = name+"="+value+expires+"; path=/";
    },

    read: function (name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)===' ') {
                c = c.substring(1,c.length);
            }
            if (c.indexOf(nameEQ) === 0) {
                return c.substring(nameEQ.length,c.length);
            }
        }
        return null;
    },

    erase: function (name) {
        _cookie.create(name,"",-1);
    }
}        
