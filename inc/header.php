<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/seo.php');?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $seo[$page_id]["title"]; ?></title>
	<meta name="keywords" content="<?php echo $seo[$page_id]["keywords"]; ?>">
	<meta name="description" content="<?php echo $seo[$page_id]["description"]; ?>">
	<meta name="author" content="Inquirehire">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="/css/style.css">

	<script src="/js/libs/modernizr.h5bp.custom.js"></script>
	<script type="text/javascript" src="http://use.typekit.com/noc1gww.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body id="<?php echo $seo[$page_id]["section"] ?>" class="<?php echo $page_id . " " . $seo[$page_id]["type"]; ?>">
<header id="template-header" class="container">
	<h1 class="logo"><a href="/">Inquirehire</a></h1>
	<?php include($_SERVER['DOCUMENT_ROOT'].'/inc/nav.php');?>
</header>
<div role="main" class="container">	