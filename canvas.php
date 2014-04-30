<?php
echo '
			<div>
				<a href="index.php"><img src="images/logo.png" alt="Logo" style="opacity:1.0;float:left" width="276px" height="115px"/></a>
			</div>
			<canvas id="myCanvas" width="625px" height="120px" style="position:absolute;">
				Your browser does not support the HTML5 canvas tag.
			</canvas>
			<script type="text/javascript">
			<!--
				var c=document.getElementById("myCanvas");
				var ctx=c.getContext("2d");
				var grd=ctx.createLinearGradient(624,0,0,0);
				grd.addColorStop(0,"#99cc00");
				grd.addColorStop(1,"white");
				ctx.fillStyle=grd;
				ctx.fillRect(0,0,624,120);
			//-->
			</script>
	';
?>