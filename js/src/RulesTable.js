import Table from "./Table";
 
export default class RulesTable extends Table
{
	constructor(element)
	{
		super(element);
	}
	
	getControlFromField(field)
	{
		switch(field)
		{
			case "regex":
			
				var $input = super.getControlFromField(field);
				
				$input.attr("type", "checkbox");
				$input.attr("checked", $input.val() == 1);
				$input.val("on");
				
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
}