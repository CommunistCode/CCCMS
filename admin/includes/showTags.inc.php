<?php 

	$background="style='background-color: #E8E8E8;'";

?>
<p>
	Hover over the question mark links for more information on the tags.
</p>
<p>
<table class='tagsTable' >
	<tr <?php if ($switch==0) { echo($background); $switch=1;} else {$switch=0;} ?> >
		<td><strong>Bold</strong></td>
		<td>[b] - [/b]</td>
		<td><a href='#' title='Enter the text you want in bold between the two tags.'>?</a></td>
	</tr>
	<tr>
		<td><em>Italics</em></td>
		<td>[i] - [/i]</td>
		<td><a href='#' title='Enter the text you want in italic between the two tags.'>?</a></td>
	</tr>
	<tr <?php if ($switch==0) { echo($background); $switch=1;} else {$switch=0;} ?>>
		<td>Insert Image</td>
		<td>[img_{left/right/center} size={size in pixels}] <?php echo($_adminTools->renderImageList()); ?> [/img]</td>
		<td><a href='#' title='Choose for your image to be positioned either left/right or centered and the size you wish it to be in pixels. Full page width is 948. The dropdown box is to remind you of the filenames of images you have uploaded and where the filename should be. Note this IS case sensitive.'>?</a></td>
	</tr>
	<tr <?php if ($switch==0) { echo($background); $switch=1;} else {$switch=0;} ?>>
		<td>URL</td>
		<td>[url=http://www.somewhere.com] somewhere.com [/url]</td>
		<td><a href='#' title='Enter the URL of the website that you want to link to instead of http://www.somewhere.com and instead of somewhere.com enter the text you wish the user to see as the link name.'>?</a></td>
	</tr>
	<tr <?php if ($switch==0) { echo($background); $switch=1;} else {$switch=0;} ?> >
		<td>Heading</td>
		<td>[header] - [/header]</td>
		<td><a href='#' title='Enter the text you want as a heading inbetween the two tags.'>?</a></td>
	</tr>
</table>
