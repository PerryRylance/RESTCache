require('./Table');

class RulesTable extends RESTCache.Table
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
					<option value=''></option>\
					<option value=''></option>\
				</select>");
			
				break;
			
			case "priority":	
				
				break;
		}
		
		return super.getControlFromField(field);
	}
}

jQuery(function($) {
	
	RESTCache.rulesTable = new RulesTable($("#rules table"));
	
});

export {RulesTable};