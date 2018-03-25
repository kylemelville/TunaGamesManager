<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
	function createNewQuillEditor(editorName) {
		var toolbarOptions = [
			['bold', 'italic', 'underline'],
	  		[{ 'list': 'ordered'}, { 'list': 'bullet' }]
		];
		var editor = new Quill('#' + editorName, {
			modules: { toolbar: toolbarOptions },
			theme: 'snow'
		});
		return editor;
	}
</script>