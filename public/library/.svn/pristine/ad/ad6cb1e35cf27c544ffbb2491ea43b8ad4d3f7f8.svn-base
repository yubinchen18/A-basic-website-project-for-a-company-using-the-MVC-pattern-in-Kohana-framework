tinymce.PluginManager.add('yflink', function(editor, url) {
    var link = function()
	{
		editor.yf_tinymce.link(editor);
	}

	// Add a button that opens a window
    editor.addButton('yflink', {
        text: false,
        icon: 'link',
		stateSelector: 'a[href]',
        onclick: link
    });

    // Adds a menu item to the tools menu
    editor.addMenuItem('yflink', {
		icon: 'link',
        text: 'Link invoegen',
		stateSelector: 'a[href]',
        context: 'insert',
        onclick: link
    });
});

