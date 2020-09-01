import Table from "./Table";
 
export default class RulesTable extends Table
{
	constructor(element)
	{
		super(element);
		
		this.$element.on("click", "[data-action='cancel']", event => this.onCancel(event));
	}
	
	getControlFromField(field)
	{
		switch(field)
		{
			case "regex":
			
				var $input = super.getControlFromField(field);
				$input.attr("type", "checkbox");
				return $input;
				
				break;
			
			case "behaviour":
			
				var $select = $("<select name='behaviour'>\
					<option value='exclude'>Exclude</option>\
					<option value='include'>Include</option>\
				</select>");
				
				return $select;
			
				break;
			
			case "priority":
				
				var $input = super.getControlFromField(field);
				
				$input.attr("type", "number");
				
				return $input;
				
				break;
		}
		
		return super.getControlFromField(field);
	}
	
	onCancel(event)
	{
		this.$element.DataTable().ajax.reload();
	}
}