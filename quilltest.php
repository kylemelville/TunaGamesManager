<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
<!-- Create the toolbar container -->
<div id="toolbar">
	<span class="ql-formats">
		<button class="ql-bold">Bold</button>
		<button class="ql-italic">Italic</button>
		<button class="ql-underline">Underline</button>
	</span>
	<span class="ql-formats">
		<button class="ql-list" value="ordered"></button>
		<button class="ql-list" value="bullet"></button>
	</span>
	<span class="ql-formats">
		<button class="ql-link"></button>
	</span>
</div>
<!-- Create the editor container -->
<div id="editor">
	<p>Well that turned out to be easy :|</p>
</div>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
	var editor = new Quill('#editor', {
		modules: { toolbar: '#toolbar' },
		theme: 'snow'
	});
</script>