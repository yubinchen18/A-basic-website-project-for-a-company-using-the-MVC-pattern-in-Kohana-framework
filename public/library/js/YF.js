var yf = (function($,_)
{
	//public object w/ jq & underscore
	var _yf = {$:$,_:_};
	
	// error types
	var _ERROR_NOTICE = 'NOTICE';
	var _ERROR_WARNING = 'WARNING';
	var _ERROR_FATAL = 'FATAL';
	
	// load types
	var _LOAD_NONE = 'none';
	var _LOAD_BUNDLE = 'bundle';
	var _LOAD_FILES = 'files';

	// options
	var _options = {	
		main: false,
		name: 'yf',
		yf_class: 'yf',
		load: _LOAD_NONE,
		url_scripts: '',
		url_bundles: '',
		messages: false,
		errors: true,
		console: true
	};
	
	// elements found in the html by name. filled in _find
	var _elements = {};
	
	// templates found in the html by name. filled in _find
	var _templates = {};
	
	// definitions to build. is filled by _yf.define
	// resets on every call to _yf.live();
	var _build = [];
	
	// state that can be seet or read
	var _state = {};
	
	
	/*-------------------
	* public
	*-------------------*/
	
   /**
	* init
	* @param {object} options
	* @returns {void}
	*/
	_yf.init = function(options)
	{
		// overwrite default options
		for(var key in options){
			_options[key] = options[key];
		}
		
		// different name for yf
		if(_options.name !== 'yf'){
			// different name: set var under a different name in global scope
			window[_options.name] = yf;
			// unset yf
			window.yf = null;
		}
		
		// start up functionality 
		_yf.live($(document),_options.main);
	};
	
	
	/**
	 * Set or get global state
	 * @param Mixed varOrValues
	 * @param Mixed val
	 * @returns Mixed
	 */
	_yf.state = function(varOrValues, val)
	{
		if(_yf.is_string(varOrValues) && _yf.is_set(val)){
			_state[varOrValues] = val;
		} else if(_yf.is_string(varOrValues)){
			if(_yf.is_set(_state[varOrValues])){
				return _state[varOrValues];
			} else {
				return null;
			}
		} else if(_yf.is_object(varOrValues)) {
			for(var index in varOrValues){
				_state[index] = varOrValues[index]
			}
		}
	}
	
	
	/**
	 * start adding functionality
	 * @param element scope
	 * @param array dependencies
	 * @returns void
	 */
	_yf.live = function(scope, main)
	{
		// get instances, elements and templates from scope
		var instances = _find(scope);
		
		// add main script if one is given
		if(_yf.is_string(main) ){
			instances[main] = '___main___';
		} 
		
		// dependencies to load
		var dependencies = [];
		
		// get dependencies from found elements (the keys are the names)
		for(var i in instances){
			dependencies.push(i);
		}

		// Start a load mechanism depending on the settings
		if(_options.load === _LOAD_NONE){
			// start immediatly without loading (everything was hard-loaded in html <script>s)
			_start(instances);
		} else if(_options.load === _LOAD_BUNDLE){
			// reset the build array
			_build = [];
			// set bundle load path
			_Bundle.url_bundles = _options.url_bundles;
			// create a bundle
			var bundle = new _Bundle(dependencies);
			// set callback to _start
			bundle.loaded(function(){
				_start(instances);
			});
			// load bundle
			bundle.load();
		} else if(_options.load === _LOAD_FILES){
			// reset the build array
			_build = [];
			// set dependency load path
			_Dependency.url_scripts = _options.url_scripts;
			// set dependency resolved callback
			_Dependency.resolved = function(){
				_start(instances);
			};
			// array with dependency objects
			var deps = [];
			// create dependency objects
			for(var i=0;i<dependencies.length;i++){
				deps.push(new _Dependency(dependencies[i]));
			}
			// call resolve on all of them
			for(var i=0;i<deps.length;i++){
				deps[i].resolve();
			}
		} else {
			// undefined load type: also start immediately
			_error('Undefined load type: '+_options.load+'. Starting without loading',_ERROR_NOTICE);
			_start(instances);
		}
	}
	
	
	/**
	 * Define a class
	 * @param {string} nameFull
	 * @returns {Creator}
	 */
	_yf.define = function(nameFull)
	{
		// check if name is ok
		if(!_yf.is_string(nameFull) || ! /^[a-zA-Z0-9\-_\.]+$/.test(nameFull)){
			_error('Trying to define without a valid name: '+nameFull,_ERROR_WARNING);
			return;
		}
		// store the full name
		// wehen all is loaded, build() will be called on the definitions
		_build.push(nameFull);
		// split the name
		var nameParts = nameFull.split('.');
		// get the real namepart
		var name = nameParts.pop();
		// ucfirst
		name = name.charAt(0).toUpperCase() + name.slice(1);
		// start with namespace _yf
		var nameSpace = _yf;
		// go through the nameparts to build namespace
		if(nameParts.length>0){
			for(var i=0; i<nameParts.length; i++){
				// get the namespacepart
				var namePart = nameParts[i].toLowerCase();
				// check if we should create it
				if(!_yf.is_set(nameSpace[namePart])){
					nameSpace[namePart] = {};
				}
				// next iteration on the new namespace
				nameSpace = nameSpace[namePart];
			}
		}
		
		// check if it allready exists
		if(_yf.is_set(nameSpace[name])){
			_error('Redefining previously defined '+name+' in namespace '+nameParts.join('.'),_ERROR_WARNING);
		}
	
		// create definition creator. definition will register itself as nameSpace[name] when done
		var creator = new _Definition(nameSpace,name);
		
		// return definition creator to chain additional commands
		return creator;
	};
	
	
	/**
	 * Clone a variable. used by extend to copy over to new prototype
	 * @param {mixed} mixed
	 * @param {boolean} deep
	 * @returns {mixed}
	 */
	_yf.clone = function(mixed,deep)
	{
		var cloned = null;
		if (typeof mixed !== 'object' ){
			cloned =  mixed;
		} else {
			// only copy over plain objects and arrays
			if(_yf.is_plain_object(mixed) || _yf.is_array(mixed)){
				for( var i in mixed){
					if(deep){
						// recursive for deep clones
						cloned = _yf.clone(mixed[i]);
					} else {
						// just copy over the var
						cloned[i] = mixed[i];
					}
				}
			} else {
				// just copy over other stuff, like jQuery objects and dom stuff
				cloned =  mixed;
			}
		}
		return cloned;
	};
	
	
	/**
	 * When using iFrames or js launched windows, get the outermost yf instance
	 * @returns {YF}
	 */
	_yf.outer = function()
	{
		var currentWindow = window;
		// walk through parents with yf active
		while(currentWindow.parent.location !== currentWindow.location && currentWindow.parent[_options.name] !== null){
			currentWindow = currentWindow.parent;
		}
		
		// return the outermost yf instance
		return(currentWindow[_options.name]);	
	};
	
	/*
	 * Get element on the page by name
	 * @param {string} name
	 * @returns {html element}
	 */
	_yf.element = function(name)
	{
		if(_yf.is_set(_elements[name])){
			return _elements[name];
		} else {
			return false;
		}
	};
	
	/*
	 * Get template on the page by name
	 * @param {string} name
	 * @returns {string}
	 */
	_yf.template = function(name)
	{
		if(_yf.is_set(_templates[name])){
			return _templates[name];
		} else {
			return false;
		}
	};
	
	
	
	/**
	 * Helper: log a variable to console
	 * @param {mixed} variable
	 * @returns {void}
	 */
	_yf.log = function(variable,show_line_nr)
	{
		if(_options.console == true && window.console && console.log){
			console.log(variable);
			if(show_line_nr !== false){
				var error = new Error();
				if(error.stack){
					console.log(error.stack.split("\n")[2]);
				}
			}
		}
	};

	
	/**
	* Testers for value type
	*/
	_yf.is_string = function(mixed)
	{
		return _is_type(mixed,'[object String]');
	};
	_yf.is_array = function(mixed)
	{
		return _is_type(mixed,'[object Array]');
	};
	_yf.is_plain_object = function(mixed)
	{
		return $.isPlainObject(mixed);
	};
	_yf.is_object = function(mixed)
	{
		if(_yf.is_set(mixed) === false){
			return false
		} else {
			return _is_type(mixed,'[object Object]');
		}
	};
	_yf.is_function = function(mixed)
	{
		return _is_type(mixed,'[object Function]');
	};
	_yf.is_numeric = function(mixed)
	{
		return !isNaN(mixed);
	};
	_yf.is_number = function(mixed)
	{
		return _is_type(mixed,'[object Number]');
	};
	_yf.is_int = function(mixed)
	{
		return !isNaN(parseInt(mixed,10)) && (parseFloat(mixed,10) === parseInt(mixed,10));
	};
	_yf.is_float = function(mixed)
	{
		return _yf.is_number(mixed) === true && _yf.is_int(mixed) === false;
	};
	_yf.is_set = function(mixed)
	{
		return !(typeof mixed === 'undefined' || mixed === null);
	};
	_yf.is_null = function(mixed)
	{
		return mixed === null;
	};
	

	/**
	* View module.
	* Example below
	* 
	* Set the templates in the html
<script type="text/html" class="yf" name="viewname1">
	<div>
		{{! This is a comment }}

		{{* 
		console.log('this is literal javascript'); 
		var subtitle = 'Subtitle';
		}}

		{{title}}<br />
		{{subtitle}}<br />

		{{? typeof(content.summary) != 'undefined' }}
			{{content.summary}}<br />
		{{?? typeof(content.body) != 'undefined'}}
			{{content.body}}<br />
		{{??}}
			No content<br />
		{{/?}}


		{{#images}}
			{{.}}<br />
		{{/images}}

		{{#files :file}}
			{{file}}<br />
		{{/files}}

		{{#users :name :id}}
			{{id}}: {{name}}<br />
		{{/users}}

		{{#cases :case}}
			{{> partialname case}}
		{{/cases}}
	
		{{> partialname product}}
	</div>
</script>
	
<script type="text/html" class="yf" name="viewname2">
	<div>
		{{title}}
	</div>
</script>
	
	* Include the templates in the definitions
<div class="yf" data-use="Something" data-template="viewname1,viewname2"></div>



	* Render template with data
var data = {
	title : 'Title',
	content : {
		summary : 'Summary',
		body : 'Body'
	}, 
	images : ['img1','img2'],
	files : {
		1 : 'file1',
		2 : 'file2'
	},
	users : {
		12 : 'Username',
		17 : 'Username'
	},
	cases : {
		{title: 'Case title'},
		{title: 'Case title2'},
	},
	product : {title: 'Product title'}
}

yf.View.make(
	template.viewname1,
	{partialname : template.viewname2}
).render(data);
	
	*/
   
   
	_yf.View = {
		
		/**
		* factory
		*/
		make : function()
		{			
			// create instance
			var def = this.definition();
			var instance = new def(_yf);
				
			// call init with arguments
			instance.init.apply(instance,arguments);
				
			// return it
			return instance;
		},
		
		
		/**
		* the view definition
		*/
		definition : function()
		{
			return function(yf){
				// the provided template
				var _template = '';
				// the provided partials
				var _partials = {};
				// id for nested sections
				var _section = 0;
				// regexes for different markups
				var _test = null;
				// compiled
				var _compiled = false;

				/**
				* init
				*/
				this.init = function(template,partials)
				{
					if(!_yf.is_string(template)){
						_error('Template is not a string',_ERROR_WARNING);
					}
					// escape \ and ", store template
					_template = template.replace(/(\"|\\)/g,function(m,character){
						return "\\"+character;
					});
					
					//  escape \ and ", store partials
					for(var name in partials){
						_partials[name] = partials[name].replace(/(\"|\\)/g,function(m,character){
							return "\\"+character;
						});
					}

					
					// define tests
					_test = {
						// {{ whitespace (at least one word char, then wordchar and/or .()[]) whitespace }}
						output: 	/\{\{\s*([\w]+[^\s\}]+)\s*\}\}/g,
						// {{* all chars }}
						literal: 	/\{\{\*([\s\S]+?)\}\}/g,
						// {{! all chars }}
						comment: 	/\{\{\!([\s\S]+?)\}\}/g,
						// {{ (one or no /) then ? then (one or no extra ?)  whitespace (all chars)  whitespace }}
						condition: 	/\{\{(\/)?\?(\?)?\s*([\s\S]*?)\s*\}\}/g,
						// {{ one or none of these: /,#,^  whitespace (one dot or wordschars) whitespace (:word) whitespace (:word) whitespace }}
						section:	/\{\{(\/)?(\#)?(\^)?\s*(\.|\w+?)\s*(\:(\w+))?\s*(\:(\w+))?\s*\}\}/g,
						// {{>  (word chars) }}
						partial: 	/\{\{\>\s*([\w]+)\s*(\s+([\s\S]+))*\s*\}\}/g
					};
				};
				
				/**
				* observe model
				*/
				this.observe = function(model)
				{
					// add callback function to model to rerender it immediatley
					model.updated(this.render);
				};
			

				/**
				* render
				*/
				this.render = function(data,as_string)
				{
					// compile if not yet done
					if(_compiled === false){
						_compiled = _compile(_template);
					}

					// make sure data is an object
					if(_yf.is_object(data) == false){
						data = {};
					}

					// run compiled with data
					var result = _compiled(data);
					if(as_string){
						// return as raw string
						return result;
					} else {
						// return as jquery element
						return $(result).first();
					}
				};
				
				
				/**
				* create compiled function
				*/
				var _compile = function(template)
				{
					// create function string
					var compiler = _compiler(template,'__data__');
					
					// create function
					return new Function('__data__',compiler);
				};
					
				/**
				* compiler
				*/
				var _compiler = function(template,dataName)
				{
					// strip newlines from template
					template = template.replace(/(\r\n|\n|\r|\t)/gm,"");
					
					// create compiler function
					// Start with emprty string
					var compiler = 'var compiled = "";\n'
					
					
					/*
					 * // localize the vars in dataName (avoid with(), instead use eval)
					+'for (var i in '+dataName+'){\n'
					+'eval("var "+i+"='+dataName+'[i]");\n'
					+'}\n'
					*/
				   
				   // Firefox can not cope with 'eval' in 'new Function', use with()}{} instead;
					+'with(__data__){\n'
					
					// start receiving strings
					+'compiled +="'
					
					// replace {{ variable }}
					+template.replace(_test.output,function(match,variable){
						return '";\n compiled+=typeof('+variable+')!=="undefined"?'+variable+':"";\n compiled+="';
					})
					
					// replace {{* literal }}
					.replace(_test.literal,function(match,literal){
						return '";\n '+literal+'\n; compiled+="';
					})
					
					// replace {{! comment }}
					.replace(_test.comment,function(match,variable){
						return '';
					})
					
					// replace{{/?}} {{??}} {{? condition }} 
					.replace(_test.condition,function(match,endif,elsecase,condition){
						// replace{{/?}}
						if(endif === '/'){
							return '";\n }\n compiled+="';
						}
						if(elsecase === '?'){
							if(typeof(condition) === 'undefined' || condition === null || condition === ''){
								// replace {{??}}
								return '";\n } else {\n compiled+="';
							} else {
								// replace {{??[condition]}}
								return '";\n } else if ( '+condition+' ){\n compiled+="';
							}
						}
						// still here? replace {{? condition }} 
						return '";\n if ( '+ condition +' ){\n compiled+="';
					})
					
					// replace {{/[variable]}} {{^variable}} {{#variable}} {{.}}
					.replace(_test.section,function(match,endsection,startsection,notsection,variable,vNameRes,vName,kNameRes,kName){
						// replace {{/[variable]}}
						if(endsection === '/'){
							_section--;
							// close with(){} close loop(){}
							return '";\n}\n}\n compiled+="';
						}
						// replace {{^variable}}
						if(notsection === '^'){
							return '";\n if(typeof('+variable+') == "undefined" || '+variable+'==null  || '+variable+'.length == 0) {\n compiled+="';
						}
						// replace {{#variable}}
						if(startsection === '#'){
							_section++;
							var index = 'index'+_section;
							var arr = 'array'+_section;
							//var localizer = 'localizer'+_section;
 
							var fragment = '";\n if(Object.prototype.toString.call('+variable+') !== "[object Object]" && Object.prototype.toString.call('+variable+') !== "[object Array]"){\n'
							// convert non array or non object to array
							+'var '+arr+'=[].concat('+variable+');\n'
							+'} else {\n'
							// just use the array/object
							+'var '+arr+'='+variable+';\n'
							+'}\n'
					
							// loop through array or object
							+'for(var '+index+' in '+arr+'){\n'
							
							// if it is an object: scope the keys to local vars
							// avoid with() use eval instead
							//+'if(Object.prototype.toString.call('+arr+'['+index+']) == "[object Object]"){\n'
							
							//+'for (var '+localizer+' in '+arr+'['+index+']){\n'
							//+'eval("var "+'+localizer+'+"='+arr+'['+index+']['+localizer+']");\n'
							//+'}\n'
							// close if
							//+'}\n';
							
							// Firefox can not cope with 'eval' in 'new Function', use with()}{} instead
							// to localize vars
							+'with('+arr+'['+index+']){\n';
							
							// add named element
							if(typeof(vName)==='string' && vName!==''){
								fragment+='var '+vName+'='+arr+'['+index+'];\n';
							}
							// add named key
							if(typeof(kName)==='string' && kName!==''){
								fragment+='var '+kName+'='+index+';\n';
							}
	
							fragment += 'compiled+="';
				
							return fragment;
						}
						// replace {{.}}
						if(variable === '.'){
							var index = 'index'+_section;
							var arr = 'array'+_section;
							return '";\n compiled+='+arr+'['+index+'];\n compiled+="';
						}
					})
					
					// replace {{> }}
					.replace(_test.partial,function(match, variable, vars){
						// get partial by variablename
						// put it in the template with empty input as it will only need to use variables from the scope above it
						var partial = '(function(__data__){\n'+_compiler(_partials[variable],'{}')+'\n})';
						
						if(typeof(vars)==='string' && vars!==''){
							partial+='('+vars+')';
						} else {
							partial+='()';
						}
						return '";\n compiled+='+partial+';\n compiled+="';
					})

					// close the string
					+'";\n'
					// close with
					+'}\n' 
					// return result
					+'return compiled;';
					
					// return the completed compiler string
					return compiler;
				};
			};
		}
	};
	
	
	
	/**
	* Model module
	*/
	_yf.Model = {
		/**
		* factory
		*/
		make : function()
		{			
			// create instance
			var def = this.definition();
			var instance = new def(_yf);
				
			// call init with arguments
			instance.init.call(instance,arguments);
				
			// return it
			return instance;
		},
		
		
		/**
		* the Model definition
		*/
		definition : function()
		{
			return function(yf)
			{
				this.init = function()
				{
				};
				
				
				this.updated = function()
				{
				};
			};
		}
	};
	
	
	
	
	/*-------------------------------------
	* protected
	*-------------------------------------*/
	
	/**
	* find html elements that have a class definition
	* find html script elements that act as template
	*/
	var _find = function(scope)
	{
		var instances = {};
		
		// get elements from scope
		scope.find('.'+_options.yf_class).each(function(){
			
			// the element
			var $element = $(this);
			
			// elements that use components
			if(_yf.is_set($element.data('use'))){
				// get components: commaseparated names
				var paths = $element.data('use').split(',');
				for(var i=0; i< paths.length; i++){
					var path = paths[i];
					// if it doesnt exist, create an array for it
					if(!_yf.is_set(instances[path])){
						instances[path] = [];
					}
					// add to the instances dict
					instances[path].push($element);
				}	
			}
			
			// elements with a set name
			if(_yf.is_set($element.attr('name'))){
				// get name
				var name = $element.attr('name');
				if($element.prop('tagName') === 'SCRIPT'){

					// get template
					var template = $element.html();

					// store it
					if(_yf.is_set(_templates[name])){
						_error('Storing template under: '+name+' but namespace was already occupied by template',_ERROR_WARNING);
					}
					_templates[name] = template;
				} else {
					// store it
					if(_yf.is_set(_elements[name])){
						_error('Storing element under: '+name+' but namespace was already occupied by element',_ERROR_WARNING);
					}
					_elements[name] = $element;
				}
			}
		});
		return instances;
	};
	

	/**
	* Start
	* call build() on all the definitions in build
	* 
	*/
	var _start = function(instances)
	{
		// call build on all definitions in the build array in reverse order, 
		// so dependencies are always built first
		for(var i = _build.length -1; i>=0; i--){
			_get_path(_yf,_build[i]).build();
		}

		// start up all elements
		for(var path in instances){
			// get the definition
			var definition = _get_path(_yf,path);
			
			if(definition === false){
				_error('Unable to find definition for html: '+path);
			} else {
				if(instances[path] === '___main___'){
					// it is the main script. 
					// it has no elements, it just needs to be created once
					definition.make();
				} else {
					// make an instance for all the elements with this name
					for(var i=0;i<instances[path].length; i++){
						// get element
						var $element = instances[path][i];
						// template(s)
						var template = '';
						// check if there should be templates added
						if(_yf.is_set($element.data('template'))){
							// get template names
							var names = $element.data('template').split(',');

							// create a hash with name-> template combo's
							template = {};
							for(var j=0;j<names.length;j++){
								if(_yf.is_set(_templates[names[j]])){
									// template exists
									template[names[j]] = _templates[names[j]];
								} else {
									// empty template
									template[names[j]] = '';
								}
							}
						}
						// create instance with element and template as arguments
						// set that instance in the element data
						$element.data(path, definition.make($element,template) );
					}
				}
			}		 
		}
	};
	
	
	/**
	* Dependency class
	* Used to define and resolve dependencies
	* Create a new dependency, add names and call resolve(with a callback)
	*/
	var _Dependency = function(name)
	{
		// public object
		var _public = {};
		// name of this dependency
		var _name = name;

		/**
		* Start resolving the dependencies
		* Call callback when done
		*/
		_public.resolve = function()
		{
			// dependency already loaded. resolve immediately
			if(_Dependency.loaded[_name] == true){
				_resolved();
				return;
			}
			// dependency already loading. Do nothing.
			if(_Dependency.loading[_name] == true){
				return;
			}
			// Add this dependency to the loading queue
			_Dependency.loading[_name] = true;
			
			//create url
			var url = _Dependency.url_scripts+_name.split('.').join('/')+'.js';
			// start ajax call
			// overrride converters to prevent eval. 
			// We'd rather eval in our own time.
			$.ajax(url,{
				dataType : 'script',
				cache: true,
				crossDomain : true,
			}).done(function(script, status){
				// goto resolved
				_resolved();
			}).fail(function(request,settings,error){
				// goto loaded
				_error('Error loading dependency from '+url+'. Error: '+error,_ERROR_FATAL);
			}).always(function(){
				
			});
		};
		

		/** 
		* Dependency was resolved
		* check if there are still dependencies loading
		* if not: call callback
		*/
		var _resolved = function(name)
		{
			// remove from loading
			delete _Dependency.loading[_name];

			// add to loaded
			_Dependency.loaded[_name] = true;
			
			// check if there are still dependencies loading
			var loading = false;
			for(var i in _Dependency.loading){
				if(_Dependency.loading.hasOwnProperty(i)){
					loading = true;
				}
			}
			// if not: call callback
			if(loading === false){
				// call registered callback
				if(_Dependency.resolved != false){
					_Dependency.resolved();
				}
			}
		};
		
		
		/**
		* Return accessible object
		*/
		return _public;
	};

	// script url
	_Dependency.url_scripts = '';
	
	// resolved callback
	_Dependency.resolved = false;
	
	// succesfully loaded dependencies {name:boolean} non-existent or false is not loaded, true is loaded
	// yf Dependencies are loaded by default
	_Dependency.loaded = {
		'yf.View': true,
		'yf.Model': true
	};
	
	// object with loading dependencies
	_Dependency.loading = {
		
	};
	

	
	
	
	/*-------------------------------
	* Definition class
	*-------------------------------*/
	var _Definition = function(nameSpace,name)
	{
		// defined constructor by as()
		var _constructor = function(){};
		// static / shared properties through set()
		var _set = {};
		// array with dependencies to load
		var _use = [];
		// name of the parent definition to extend through extend()
		var _parent = false;
		// mixins
		var _mixin = {};
		// the creator object
		var _creator = {};
		// the actual created definition in _build
		var _definition = function(){};
		
		// store the static vars under the its assigned namespace
		var _public = {name:name};
		nameSpace[name] = _public;
		

		/**
		* set dependencies
		*/
		_creator.use = function()
		{
			// get args array
			var args = [].slice.call(arguments);
			// add it to the use array
			_use = _use.concat(args);
			// chainable
			return this;
		};
		
		
		/**
		* set static vars & methods
		*/
		_creator.set = function(object)
		{
			if(!_yf.is_object(object)){
				// check if static data is valid
				_error('Trying to set invalid data: '+object,_ERROR_WARNING);
				return;
			}
			// object is static
			_set = object;
			// add yf to definition
			_set.yf = _yf;
			// chainable
			return this;
		};
		
		
		/**
		* Extend other definition
		*/
		_creator.extend = function(parent)
		{
			// store name
			_parent = parent;
			// chainable
			return this;
		};
		
		/**
		* Mixin on definition
		*/
		_creator.mixin = function(name,mixin)
		{
			// store name
			_mixin[name] = mixin;
			// chainable
			return this;
		};
		

		/**
		* set constructor
		* This also serves as the closing call for a definition.
		* no extra calls, so not chainable
		*/
		_creator.as = function(constructor)
		{
			if(_yf.is_object(constructor)){
				// object given: static class definition
				for(var i in constructor){
					_set[i] = constructor[i];
				}
				// add yf to definition
				_set.yf = _yf;
			} else if(_yf.is_function(constructor)){
				// store the constructor function
				_constructor = constructor;
			} else {
				// error
				_error('Trying to define without a valid constructor or static definition',_ERROR_WARNING);
			}
			
			// load dependencies when loading files
			if(_options.load === _LOAD_FILES){
				// for parent
				if(_yf.is_string(_parent)){
					new _Dependency(_parent).resolve();
				}
				// for 'use'
				for(var i=0; i<_use.length;i++){
					new _Dependency(_use[i]).resolve();
				}
			}
		};
		
		/**
		* Build the definition with all the extension, static, etc
		* is called by _start when everything has loaded
		* build function is then removed
		*/
		_public.build = function()
		{
			// if the definition is an extension of another definition
			if(_yf.is_string(_parent)){
				// get parentDef
				var objParent = _get_path(_yf,_parent);
				// check if parent exists
				if(!_yf.is_object(objParent) || !_yf.is_function(objParent.definition())){
					_error('Trying to extend undefined definition: '+_parent,_ERROR_WARNING);
					return;
				}
				// get the definition
				var defParent = objParent.definition();
				// get an instance for reading super functions
				var insParent = new defParent(_yf);
				// an empty object that will be filled with prototype vars
				var prototype = new defParent(_yf);
				// new extender to copy properties from
				var insExtend = new _constructor(_yf);
				
				// copy over new properties to prototype & add parent() where needed
				_inherit(prototype,insExtend,insParent);
				
				// add prototype to the still empty definition
				_definition.prototype = prototype;
				// set the correct constructor
				_definition.prototype.constructor = _constructor;
				
				// copy over statics from parent (skip make and definition functions)
				for(var i in objParent){
					if(i !== 'make' && i !== 'definition'){
						_public[i] = objParent[i];
					}
				}
				// copy over new statics & add parent() where needed 
				_inherit(_public,_set,objParent);
				
			} else {
				// if it's not an extend, just use the given constructor
				_definition = _constructor;
				
				// copy over static properies to public
				for(var i in _set){
					_public[i] = _set[i];
				}
			}
			

			/** 
			* the 'make' function to instantiate object
			* any arguments will be passed along to init();
			*/
			_public.make = function()
			{				
				// create instance
				var instance = new _definition(_yf);
				
				// add mixins
				for(var i in _mixin){
					instance[i] = _mixin[i];
				}

				// call init if available
				if(_yf.is_function(instance.init)){
					instance.init.apply(instance,arguments);
				}
				
				// return it
				return instance;
			};

			/**
			* make function to return definition
			* only really usefull when extending
			*/
			_public.definition = function()
			{
				return _definition;
			};
			
			// chainable
			return _public;
		};
		
			
		/**
		* return the creator
		*/
		return _creator;
	};
	
	
	
	
	/**
	* A bundle of files to load
	*/
	var _Bundle = function(dependencies)
	{
		// the public object
		var _public = {};
		
		// callbacks when successfully loaded
		var _callback = false;

		
		/**
		* set  loaded callback
		*/
		_public.loaded = function(callback)
		{
			// set it
			_callback = callback;
			//chainable
			return _public;
		};
		
		
		/**
		* load the bundle
		*/
		_public.load = function()
		{
			// create bundle url
			var url_bundle = _Bundle.url_bundles+_file_bundle(dependencies);
			
			// load the bundle
			$.ajax(url_bundle,{
				data :{files: dependencies.join(',')},
				dataType : 'script',
				crossDomain : true,
				cache : true
			}).done(function(script, status){
				_loaded();
			});
		};
		
		
		/**
		* loaded: call callback
		*/
		var _loaded = function()
		{
			if(_callback != false){
				_callback()
			}
		};
		
		
		/**
		* combine dependencies to a js filename
		*/
		var _file_bundle = function(dependencies)
		{
			var str = dependencies.join(',');
			var hash = 0;
			var multi = 1;
			if (str !== null && str.length > 0) {
			    for (i = 0; i < str.length; i++) {
					multi = 100*i;
					hash = hash + (multi * str.charCodeAt(i));
			    }
			    hash = Math.abs(hash & hash);
		    }
		    return 'bundle_'+hash+'.js';
		};
		
		
		/**
		* public
		*/
		return _public;
	};
	
	// path for bundles
	_Bundle.url_bundles = '';
	
	
	
	
	/*-------------------------------
	* Private helpers
	*-------------------------------*/
	
	/**
	* get a nested object by dotted string notation
	*/
	var _get_path = function(object,path)
	{
		// get path parts
		var parts = path.split('.');
		
		// strip internal (yf.) from path
		if(parts[0]==='yf'){
			parts.shift();
		}
		// start with the object as starting point for the lookup
		var nameSpace = object;
		// lookup path
		for(var i=0; i<parts.length; i++){
			if(_yf.is_set(nameSpace[parts[i]])){
				nameSpace = nameSpace[parts[i]];
			} else {
				return false;
			}
		}
		return nameSpace;
	};
	
	
	/**
	* Helper to copy over properties to a new object, adding a 'parent' function in the process
	* After John Resig's simple inheritance
	*/
	var _inherit = function(object, objectExtend, objectParent)
	{
		for(var property in objectExtend){
			if(typeof objectExtend[property] === 'function' && typeof object[property] === 'function'){
				// if we're copying over a function of the same name
				object[property] = (function(prop,fn){
					return function(){
						// store ori _super in temp (maybe there is one, maybe not)
						var temp = this.parent;
						// create a new parent() that points to the parents method of the same name
						this.parent = objectParent[prop];
						// run the function that uses parent. use apply to set the scope to the current this.
						// pass in any arguments that were passed to the function
						var result = fn.apply(this, arguments);
						// restore the original _super
						this.parent = temp;
						// return the result
						return result;
					};
				})(property,objectExtend[property]);
			} else {
				// just copy over the property
				object[property] = objectExtend[property];
			}
		}
	};
	
	
	/**
	* Check if type
	*/
	var _is_type = function(mixed,type)
	{
		return  Object.prototype.toString.call( mixed ) === type;
	};
	
	
	/**
	* Show a message
	*/
	var _message = function(message,omit_line_nr)
	{
		if(_options.messages){
			_yf.log(message);
			if(omit_line_nr !== false){
				var error = new Error;
				if(error.stack){
					_yf.log(error.stack.split("\n")[2]);
				}
			}
		}
	};
	
	
	/**
	* Show an error
	*/
	var _error = function(message,type,show_line_nr)
	{
		if(_options.errors){
			_yf.log('ERROR '+type+': '+message,false);
			if(show_line_nr !== false){
				var error = new Error;
				if(error.stack){
					_yf.log(error.stack.split("\n")[2]);
				}
			}
		}
	};


	/**
	* Return public
	*/
	return _yf;
	
})(jQuery,_);