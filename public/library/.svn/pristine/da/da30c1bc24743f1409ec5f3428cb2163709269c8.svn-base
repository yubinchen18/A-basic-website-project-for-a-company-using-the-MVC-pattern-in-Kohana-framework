tinymce.PluginManager.add('yfimage', function(editor, url) {
    var image = function()
	{
		editor.yf_tinymce.image(editor);
	}

	// Add a button that opens a window
    editor.addButton('yfimage', {
        text: false,
        icon: 'image',
		stateSelector: 'img',
        onclick: image
    });

    // Adds a menu item to the tools menu
    editor.addMenuItem('yfimage', {
		icon: 'image',
        text: 'Afbeelding invoegen',
		stateSelector: 'img',
        context: 'insert',
        onclick: image
    });
});

