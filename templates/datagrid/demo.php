<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "Getting Started With datagrid with Backbone"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>
	<link rel="stylesheet" href="/bower_components/datagrid/backgrid.min.css">
	<script src="/bower_components/datagrid/backgrid.min.js"></script>

</head>
<body>



<div class="container-fluid">
	<div class="container">
		<h1 class="text-center">Quick Example of Datagrid</h1>
		<div id="example-1-result">
			
		</div>
		<div id="example-2-result">
			
		</div>
	</div>
</div>









<script>
var Territory = Backbone.Model.extend({});
 
var Territories = Backbone.Collection.extend({
  model: Territory,
  url: "/templates/datagrid/data.json"
});
 
var territories = new Territories();

var columns = [{
    name: "id", // The key of the model attribute
    label: "ID", // The name to display in the header
    editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
    // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
    cell: Backgrid.IntegerCell.extend({
      orderSeparator: ''
    })
  }, {
    name: "name",
    label: "Name",
    // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
    cell: "string" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
  }, {
    name: "pop",
    label: "Population",
    cell: "integer" // An integer cell is a number cell that displays humanized integers
  }, {
    name: "percentage",
    label: "% of World Population",
    cell: "number" // A cell type for floating point value, defaults to have a precision 2 decimal numbers
  }, {
    name: "date",
    label: "Date",
    cell: "date"
  }, {
    name: "url",
    label: "URL",
    cell: "uri" // Renders the value in an HTML anchor element
}];

// Initialize a new Grid instance
var grid = new Backgrid.Grid({
  columns: columns,
  collection: territories
});
 
// Render the grid and attach the root to your HTML document
$("#example-1-result").append(grid.render().el);
 
// Fetch some countries from the url
territories.fetch({reset: true});

</script>




</body>
</html>