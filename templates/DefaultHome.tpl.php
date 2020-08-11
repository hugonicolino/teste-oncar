<?php
	$this->assign('title','ONCAR | Estoques');
	$this->assign('nav','estoques');
	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/estoques.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Estoque
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="estoqueCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Veiculo">Veiculo<% if (page.orderBy == 'Veiculo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Marca">Marca<% if (page.orderBy == 'Marca') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ano">Ano<% if (page.orderBy == 'Ano') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricao">Descricao<% if (page.orderBy == 'Descricao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Vendido">Situação<% if (page.orderBy == 'Vendido') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Created">Created<% if (page.orderBy == 'Created') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Updated">Updated<% if (page.orderBy == 'Updated') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('veiculo')) %>">
				<td><%= _.escape(item.get('veiculo') || '') %></td>
				<td><%= _.escape(item.get('marca') || '') %></td>
				<td><%= _.escape(item.get('ano') || '') %></td>
				<td><%= _.escape(item.get('descricao') || '') %></td>
				<td><%= _.escape(item.get('vendido') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%if (item.get('created')) { %><%= _date(app.parseDate(item.get('created'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%if (item.get('updated')) { %><%= _date(app.parseDate(item.get('updated'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="estoqueModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="veiculoInputContainer" class="control-group">
					<label class="control-label" for="veiculo">Veiculo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="veiculo" placeholder="Veiculo" value="<%= _.escape(item.get('veiculo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="marcaInputContainer" class="control-group">
					<label class="control-label" for="marca">Marca</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="marca" placeholder="Marca" value="<%= _.escape(item.get('marca') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="anoInputContainer" class="control-group">
					<label class="control-label" for="ano">Ano</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ano" placeholder="Ano" value="<%= _.escape(item.get('ano') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoInputContainer" class="control-group">
					<label class="control-label" for="descricao">Descricao</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="descricao" rows="3"><%= _.escape(item.get('descricao') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="vendidoInputContainer" class="control-group">
					<label class="control-label" for="vendido">Vendido</label>
					<div class="controls inline-inputs">
						<select id="vendido" name="vendido">
							<option value=""></option>
							<option value="vendido"<% if (item.get('vendido')=='vendido') { %> selected="selected"<% } %>>vendido</option>
							<option value="estoque"<% if (item.get('vendido')=='estoque') { %> selected="selected"<% } %>>estoque</option>
						</select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="createdInputContainer" class="control-group">
					<label class="control-label" for="created">Created</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="created" type="text" value="<%= _date(app.parseDate(item.get('created'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="created-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('created'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="updatedInputContainer" class="control-group">
					<label class="control-label" for="updated">Updated</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="updated" type="text" value="<%= _date(app.parseDate(item.get('updated'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="updated-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('updated'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteEstoqueButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteEstoqueButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Estoque</button>
						<span id="confirmDeleteEstoqueContainer" class="hide">
							<button id="cancelDeleteEstoqueButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteEstoqueButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="estoqueDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Estoque
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="estoqueModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveEstoqueButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="estoqueCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newEstoqueButton" class="btn btn-primary">Add Estoque</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
