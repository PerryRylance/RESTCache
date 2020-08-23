export default class Table
{
	constructor(element)
	{
		var self = this;
		
		this.$element = $(element);
		
		this.url = this.$element.attr("data-route");
		
		this.$element.on("click", "[data-action='edit']", event => this.onEdit(event));
		this.$element.on("click", "[data-action='update']", event => this.onUpdate(event));
		this.$element.on("click", "[data-action='delete']", event => this.onDelete(event));
	}
	
	getIDFromEvent(event)
	{
		let $tr = $(event.currentTarget).closest("tr");
		let id = $tr.attr("data-id");
		
		return id;
	}
	
	getControlFromField(field)
	{
		let $input = $("<input/>");
		$input.attr("name", field);
		return $input;
	}
	
	setItemEditable(id)
	{
		let self = this;
		let $tr = this.$element.find("tr[data-id='" + id + "']");
		
		$tr.children("td").each(function(index, td) {
			
			let field = $(td).attr("data-field");
			
			switch(field)
			{
				case "id":
				case "actions":
					return true;
					break;
			}

			let $input = self.getControlFromField(field);
			
			$input.val($(td).text());
			
			$(td).empty();
			$(td).append($input);
			
		});
		
		$tr.addClass("rest-cache-editing");
	}
	
	onEdit(event)
	{
		let id = this.getIDFromEvent(event);
		this.setItemEditable(id);
	}
	
	onUpdate(event)
	{
		let self	= this;
		let id		= this.getIDFromEvent(event);
		let data	= {};
		let $tr		= $(event.currentTarget).closest("tr");
		
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
	
	onDelete(event)
	{
		let self	= this;
		let id		= this.getIDFromEvent(event);
		
		$.ajax(this.url + "/" + id, {
			method: "DELETE",
			success: function(response, status, xhr) {
				self.onActionComplete(response);
			}
		});
	}
	
	onActionComplete(event)
	{
		this.$element.DataTable().ajax.reload();
	}
}
