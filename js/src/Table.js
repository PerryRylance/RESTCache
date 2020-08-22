// requires: core.js

jQuery(function($) {
	
	RESTCache.Table = function(element)
	{
		var self = this;
		
		this.$element = $(element);
		
		this.url = this.$element.attr("data-route");
		
		this.$element.on("click", "[data-action='edit']", function(event) {
			self.onEdit(event);
		});
		
		this.$element.on("click", "[data-action='update']", function(event) {
			self.onUpdate(event);
		});
		
		this.$element.on("click", "[data-action='delete']", function(event) {
			self.onDelete(event);
		});
	}
	
	RESTCache.Table.prototype.getIDFromEvent = function(event)
	{
		var $tr = $(event.currentTarget).closest("tr");
		var id = $tr.attr("data-id");
		
		return id;
	}
	
	RESTCache.Table.prototype.getControlFromField = function(field)
	{
		var $input = $("<input/>");
		$input.attr("name", field);
		return $input;
	}
	
	RESTCache.Table.prototype.setItemEditable = function(id)
	{
		var self = this;
		var $tr = this.$element.find("tr[data-id='" + id + "']");
		
		$tr.children("td").each(function(index, td) {
			
			var field = $(td).attr("data-field");
			
			switch(field)
			{
				case "id":
				case "actions":
					return true;
					break;
			}

			var $input = self.getControlFromField(field);
			
			$input.val($(td).text());
			
			$(td).empty();
			$(td).append($input);
			
		});
		
		$tr.addClass("rest-cache-editing");
	}
	
	RESTCache.Table.prototype.onEdit = function(event)
	{
		var id = this.getIDFromEvent(event);
		this.setItemEditable(id);
	}
	
	RESTCache.Table.prototype.onUpdate = function(event)
	{
		var self	= this;
		var id		= this.getIDFromEvent(event);
		var data	= {};
		var $tr		= $(event.currentTarget).closest("tr");
		
		$tr.find(":input").each(function(index, el) {
			
			if(!$(el).attr("name"))
				return;
			
			data[$(el).attr("name")] = $(el).val();
			
		});
		
		$.ajax(this.url + "/" + id, {
			method: "PUT",
			data: data,
			success: function(response, status, xhr) {
				self.onActionComplete(response);
			}
		});
	}
	
	RESTCache.Table.prototype.onDelete = function(event)
	{
		var self	= this;
		var id		= this.getIDFromEvent(event);
		
		$.ajax(this.url + "/" + id, {
			method: "DELETE",
			success: function(response, status, xhr) {
				self.onActionComplete(response);
			}
		});
	}
	
	RESTCache.Table.prototype.onActionComplete = function(event)
	{
		this.$element.DataTable().ajax.reload();
	}
	
});