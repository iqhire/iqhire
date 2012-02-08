<?php $page_id = "fcra-forms"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/header.php');?>
<h1><?php echo $page_id ?></h1>

<dl>
	<dt>Section:</dt>
	<dd><?php echo $seo[$page_id]["section"] ?></dd>
	
	<dt>Type:</dt>
	<dd><?php echo $seo[$page_id]["type"] ?></dd>
	
	<dt>Title:</dt>
	<dd><?php echo $seo[$page_id]["title"] ?></dd>
	
	<dt>Keywords:</dt>
	<dd><?php echo $seo[$page_id]["keywords"] ?></dd>
	
	<dt>Description:</dt>
	<dd><?php echo $seo[$page_id]["description"] ?></dd>
</dl>


<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/footer.php');?>