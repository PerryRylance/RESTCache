<div id="rest-cache-admin">
	
	<h1>
		<i class="fas fa-bolt"></i>
		REST Cache
	</h1>
	
	<div id="rest-cache-tabs">
		<ul>
			<li>
				<a href="#records">
					<i class="fas fa-th-list"></i>
					Records
				</a>
			</li>
			<li>
				<a href="#rules">
					<i class="far fa-check-square"></i>
					Rules
				</a>
			</li>
			<li>
				<a href="#settings">
					<i class="fas fa-cogs"></i>
					Settings
				</a>
			</li>
		</ul>
		
		<div id="records">
			<p id="record-controls">
				<button id="refresh-table" class="button button-primary">
					<i class="fas fa-sync"></i>
					Refresh Table
				</button>
				<button id="clear-cache" class="button button-primary">
					<i class="fas fa-trash-alt"></i>
					Clear Cache
				</button>
			</p>
		</div>
		
		<div id="rules">
			<div class="notice notice-info">
				<p>
					<i class="fas fa-info-circle"></i>
					<strong>Please note</strong> that this plugin will only cache GET requests. The plugin will not cache <em>any</em> requests which have a permission callback, for security reasons.
				</p>
			</div>
		
			<p id="rule-controls">
				<button id="add-rule" class="button button-primary">
					<i class="fas fa-plus"></i>
					Add Rule
				</button>
			</p>
		</div>
		
		
	</div>
	
</div>