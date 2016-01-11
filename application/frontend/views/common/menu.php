<?php
$menuItems = array(
	'Home' => URL::to('page@view:home'),
	'Programma CALCelit' => URL::to('page@view:programma-calcelit'),
	'Programma *CADELIT*' => URL::to('page@view:programma-cadelit'),
	'Programma *CADELAT*' => URL::to('page@view:programma-cadelat'),
	'Nieuws' => URL::to('news@view:nieuws'),
	'Uneto-VNI' => URL::to('page@view:uneto-vni'),
	'Opgaven' => URL::to('page@view:opgaven'),
	'Downloads' => URL::to('page@view:download'),
	'Contact' => URL::to('page@view:contact')
);

$currentUrl = URL::current();
?>

<ul>
	<?php foreach ($menuItems as $label => $url): ?>
	<li class ="<?php echo $url==$currentUrl ? 'activeMenuItem' : ''; ?>">		
		<a href ="<?php echo $url?>"><?php echo $label?> <?php echo $url==$currentUrl ? '  <== active' : ''; ?></a>
	</li>
	<?php endforeach; ?>
</ul>
<!--
<div onmousemove="myFunction(event)" style="width: 200px; height: 100px;border: 1px solid black"></div>

<p>Mouse over the rectangle above, and get the coordinates of your mouse pointer.</p>

<p>When the mouse is moved over the div, the p element will display the horizontal and vertical coordinates of your mouse pointer, whose values are returned from the clientX and clientY properties on the 
MouseEvent object.</p>

<p id="demo"></p>

<script>
function myFunction(e) {
    var x = e.clientX;
    var y = e.clientY;
    var coor = "Coordinates: (" + x + "," + y + ")";
    document.getElementById("demo").innerHTML = coor;
}
</script>
-->