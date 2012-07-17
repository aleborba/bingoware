

      <p><img border="0" src="images/mh.gif" width="120" height="60"></p>
      <p>
	<applet code="fphover.class" codebase="./" width="120" height="20">
		<param name="image" valuetype="ref" value="images/b1u.gif">
		<param name="url" valuetype="ref" value="index.php?action=generate<? echo (isset($_GET["numberinplay"]))?'&numberinplay='.$_GET["numberinplay"]:''; ?>">
		<param name="hoverimage" valuetype="ref" value="images/b1d.gif">
		<param name="color" value="#ffffff">
	</applet><br><br>
	<applet code="fphover.class" codebase="./" width="120" height="20">
		<param name="image" valuetype="ref" value="images/b3u.gif">
		<param name="url" valuetype="ref" value="index.php?action=view<? echo (isset($_GET["numberinplay"]))?'&numberinplay='.$_GET["numberinplay"]:''; ?>">
		<param name="hoverimage" valuetype="ref" value="images/b3d.gif">
	</applet><br><br>
	<applet code="fphover.class" codebase="./" width="120" height="20">
		<param name="image" valuetype="ref" value="images/b2u.gif">
		<param name="url" valuetype="ref" value="index.php?action=play<? echo (isset($_GET["numberinplay"]))?'&numberinplay='.$_GET["numberinplay"]:''; ?>">
		<param name="hoverimage" valuetype="ref" value="images/b2d.gif">
	</applet><br><br>
	<applet code="fphover.class" codebase="./" width="120" height="20">
		<param name="image" valuetype="ref" value="images/b4u.gif">
		<param name="url" valuetype="ref" value="index.php?action=config<? echo (isset($_GET["numberinplay"]))?'&numberinplay='.$_GET["numberinplay"]:''; ?>">
		<param name="hoverimage" valuetype="ref" value="images/b4d.gif">
	</applet>
