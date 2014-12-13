<html>

<head>

<style>
div.hidden {visibility:hidden}
</style>

	<script type="text/javascript">
		
		function createImages() {
		
	var repeat_container = document.getElementById("repeat");
    var image_container = document.getElementById("imageBox");
    var div_element;
    var value = document.getElementById("selectBox").value;

    // Remove previously added divs
    while (image_container.firstChild) {
      image_container.removeChild(image_container.firstChild);
    }

    // Add new divs
    for (var i = 0; i < value; i++) {
        div_element = document.createElement("div");
        div_element.innerHTML = repeat_container.innerHTML;
        div_element.style.visbility = "visible";
        image_container.appendChild(div_element);
    }

	

}	
	</script>

</head>

<body>

<div id="repeat" class="hidden"><p>Apple</p></div>

<p>Creates a '5 x Quantity' image gallery!</p>
Quantity (between 1 and 10): 

<select id="selectBox">
	<option value="1"> 1 </option>
    <option value="2"> 2 </option>
    <option value="3"> 3 </option>
    <option value="4"> 4 </option>
    <option value="5"> 5 </option>
    <option value="6"> 6 </option>
    <option value="7"> 7 </option>
    <option value="8"> 8 </option>
</select>
<button type="Button" onclick="createImages()">Create!</button>

<div id="imageBox"></div>

</body>

</html>

<?php



?>