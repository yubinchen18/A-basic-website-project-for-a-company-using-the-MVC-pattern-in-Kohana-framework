{{? sizes !== null && sizes.admin !== null && sizes.admin.src !== null }}
	<img src="{{ sizes.admin.src}}" />
{{??}}
	{{file}}
{{/?}}