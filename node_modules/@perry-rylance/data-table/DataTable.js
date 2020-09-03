export default class DataTable
{
	constructor(element)
	{
		if($.fn.dataTable.ext)
			$.fn.dataTable.ext.errMode = "throw";
		
		this.$element = $(element);
		
		var options = this.getDataTableOptions();
		this.$element.DataTable(options);
	}
	
	getDataTableOptions()
	{
		var fields	= this.getColumnFields();
		var columns	= [];
		
		fields.forEach(function(field) {
			columns.push({
				"data": field
			});
		});
		
		return {
			"ajax":			this.$element.attr("data-route"),
			"processing":	true,
			"serverSide":	true,
			"columns":		columns,
			"createdRow":	function(row, data, index) {
				
				if(!("id" in data))
					console.warn("No ID in row data");
				else
					$(row).attr("data-id", data.id);
				
				var index = 0;
				$(row).children("td").each(function(index, td) {
					$(td).attr("data-field", fields[index])
					index++;
				});
				
			}
		};
	}
	
	getColumnFields()
	{
		var results = [];
		
		this.$element.find("th[data-column-field]").each(function() {
			results.push( $(this).attr("data-column-field") );
		});
		
		return results;
	}
}

DataTable.createInstance = function(element)
{
	return new DataTable(element);
}

$(window).on("load", function(event) {
	
	$("table.perry-rylance-datatable").each(function(index, el) {
		
		if($(el).attr("data-auto-initialize") == "false")
			return;
		
		el.dataTable = DataTable.createInstance(el);
		
	});
	
});