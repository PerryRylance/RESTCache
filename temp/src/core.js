window.RESTCache = {
	extend: function(child, parent) {
		
		var constructor = child;
		
		child.prototype = Object.create(parent.prototype);
		child.prototype.constructor = constructor;
		
	}
};

jQuery(function($) {
	
	$("#rest-cache-tabs").tabs();
	
});