<?php use Cake\Routing\Router; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
	<meta name="Description" content="<?php if(isset($meta_description) && $meta_description !=''){ echo $meta_description; }else{ echo 'List Offer'; } ?>" />
	<meta name="Keywords" content="<?php if(isset($meta_keywords) && $meta_keywords !=''){ echo $meta_keywords; }else{ echo 'List Offer'; } ?>" />
	<title><?php if(isset($title)){ echo $title.' | '; } ?>List Offer</title>
	<!--[if IE 7]> <html class="ie7"> <![endif]-->
	<!--[if IE 8]> <html class="ie8"> <![endif]-->
	<!--[if IE 9]> <html class="ie9"> <![endif]-->
	<?php echo $this->Html->meta('icon') ?>
	<!--boot-strap -->
	<?php echo $this->Html->css(array(
									'plugins',
									'style',
									'responsive'
									)
								);?>
	<script type="text/javascript">
		document.createElement("header");
		document.createElement("nav");
		document.createElement("hgroup");
		document.createElement("section");
		document.createElement("article");
		document.createElement("aside");
		document.createElement("footer");
		document.createElement("blockquote");
		document.createElement("figure");
		document.createElement("details");
	</script>

	<!-- custom -->
	<?php echo $this->Html->css('development'); ?>

	<!-- js -->
	<?php echo $this->Html->script(array(
									'lib/jquery-1.12.2.min',
									'lib/plugins',
									'custom',
									'ajax_page',
									'validate.min'
									)
								);?>
</head>
<body>
	<a class="scrollup" href="javascript:void(0);"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
	<?php
	if($this->request->params['controller']=='Sites' && $this->request->params['action']=='homePage'){
		echo $this->element('header');
	}else{
		echo $this->element('header-other');
	}
	?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('footer'); ?>
</body>
</html>