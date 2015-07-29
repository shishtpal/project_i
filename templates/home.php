<!DOCTYPE html>
<html>
<head>
	
	<?php $title = "List of all Notes"; ?>
	<?php include "/bs_comp/bs_assets.comp.php"; ?>
	<?php include '/bs_comp/bb_assets.comp.php'; ?>

</head>
<body>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<h1>List of all Notes</h1>
				<hr>
				<!-- display list of notes here -->
				<div class="page">
					
				</div>
			</div>
		</div>
	</div>


<script type="text/template" id="note-list-template">
	<!-- This HTML Template is about, How you want to display list of notes -->
	<a href="#/new" style="max-width:200px; margin:0px auto;" class="btn btn-info btn-link btn-block">New Note</a>
	<hr>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Note ID</th>
					<th>Note Title</th>
					<th>Note Content</th>
					<th>Tags</th>
					<th>Score</th>
					<th>isComp</th>
					<th>isPub</th>
					<th>First Cre.</th>
					<th>Last Mod.</th>
				</tr>
			</thead>
			<tbody>
				<% _.each(data, function(note) { %>
					<tr>
						<td><%= note.get('noteid') %></td>
						<td><%= note.get('noteTitle') %></td>
						<td><%= note.get('noteContent') %></td>
						<td><%= note.get('tags') %></td>
						<td><%= note.get('score') %></td>
						<td><%= note.get('isCompleted') %></td>
						<td><%= note.get('isPublic') %></td>
						<td><%= note.get('createdAt') %></td>
						<td><%= note.get('modifiedAt') %></td>
						<td>
							<a href="#/edit<%= note.noteid %>" class="btn btn success">Edit</a>
						</td>
					</tr>
				<% }); %>
			</tbody>
		</table>
	</div>
</script>

<script id="edit-note-template" type="text/template">
	<!-- How you want to present data while editing a Note -->
	<h5>Hello edit This Note</h5>
</script>


<script type="text/javascript">

	$.fn.serializeObject = function(){
		var o = {};
		var a = this.serializeArray();
		$.each(a, function(){
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	};

	var Notes = Backbone.Collection.extend({
		url: "/notes"
	});

	var Note = Backbone.Model.extend({
		urlRoot: "/notes"
	});

	var NoteList = Backbone.View.extend({
		el: '.page',
		render: function(){
			var that = this;
			var notes = new Notes();
			notes.fetch({
				success: function(notes){
					var template = _.template($("#note-list-template").html());
					that.$el.html(template({data: notes.models }));
				}
			})
		}
	});

	var EditNote = Backbone.View.extend({
		el: '.page',
		render: function(options){
			var that = this;
			if (options.id) {
				var note = new Note({id: options.id});
				note.fetch({
					success: function(user, response) {
						var template = _.template($("#edit-note-template").html());
						that.$el.html(template({note: note}));
					}
				});
			} else {
				var template = _.template($("#edit-note-template").html());
				this.$el.html(template({user: null}));
			}
		},
		events: {

		},
		saveNote: function(ev){
			var noteDetails = $(ev.currentTarget).serializeObject();
			var note = new Note();
			note.save(noteDetails, {
				success: function(user, response){
					router.navigate("", {trigger: true});
					console.log(note.toJSON());
				}
			});
			return false;
		}
	});

	var DelNote = Backbone.View.extend({

	});

	var Router = Backbone.Router.extend({
		routes: {
			'': 'home',
			'new': 'editNote',
			'edit/:id': 'editNote',
			'delete/:id': 'delNote'
		}
	});

	var noteList = new NoteList();
	var editNote = new EditNote();
	var delNote = new DelNote();

	var router = new Router();
	router.on('route:home', function(){
		noteList.render();
	});
	router.on('route:editNote', function(id){
		editNote.render({id: id});
	});
	router.on('route:delNote', function(id){
		delNote.render({id: id});
	});

	Backbone.history.start();



</script>

</body>