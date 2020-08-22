// requires: Table.js

jQuery(function($) {
	
	RESTCache.RulesTable = function(element)
	{
		var self = this;
		
		RESTCache.Table.call(this, element);
		
		$("button#add-rule").on("click", function(event) {
			self.onAddRule(event);
		});
	}
	
	RESTCache.extend(RESTCache.RulesTable, RESTCache.Table);
	
	RESTCache.RulesTable.prototype.onAddRule = function(event)
	{
		var self = this;
		
		$.ajax(this.url, {
			method: "POST",
			success: function(response, status, xhr) {
				self.$element.DataTable().ajax.reload();
			}
		});
	}
	
	$(window).on("load", function(event) {
		
		RESTCache.rulesTable = new RESTCache.RulesTable($("#rules table[data-route]"));
		
	});
	
});