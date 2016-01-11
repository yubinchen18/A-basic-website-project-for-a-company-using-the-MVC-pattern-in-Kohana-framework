yf.define('backend.Callback')
.as({
	// the callbakcs
	callbacks: {},

	// create a new callback
	register: function(fn)
	{
		// create unique id
		var id = '__'+new Date().getTime()+'__';
		// store function
		this.callbacks[id] = fn;
		// return it
		return id;
	},
	
	
	// invoke a callback
	call:function(id,data)
	{
		if(this.yf.is_set(this.callbacks[id])){
			var callback = this.callbacks[id];
			callback(data);
		}
	}
});