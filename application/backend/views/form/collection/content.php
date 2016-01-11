<span class="clearfix">
{{?type=='text'}}
	{{body}}
{{??type=='images'}}
	<h6></h6>
{{??type=='image'}}
	{{image.file}}<br />
	<i>{{caption}}</i>
{{??type=='person'}}
	<h6>{{title}}</h6>
{{??type=='button'}}
	<h6>{{cta}}</h6>
{{??type=='map'}}
	<h6>Map: {{title}}</h6>
{{??type=='project'}}
	<h6>{{title}}</h6>
	{{body}}
{{??type=='quote'}}
	<h6>{{title}}</h6>
	"{{text}}"
{{??}}
	{{title}}
{{/?}}
</span>