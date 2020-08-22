// requires: Table.js

jQuery(function($) {
	
	RESTCache.RecordsTable = function(element)
	{
		RESTCache.Table.call(this, element);
	}
	
	RESTCache.extend(RESTCache.RecordsTable, RESTCache.Table);
	
	$(window).on("load", function(event) {
		
		RESTCache.recordsTable = new RESTCache.RecordsTable($("#records table[data-route]"));
		
	});
	
});