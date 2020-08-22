require('./Table');

class RecordsTable extends RESTCache.Table
{
	
}

jQuery(function($) {
	
	RESTCache.recordsTable = new RecordsTable($("#records table"));
	
});

export {RecordsTable};