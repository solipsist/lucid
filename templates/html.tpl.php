<?php print $doctype; ?>
<html <?php print $html_attributes . $rdf_namespaces; ?>>
<head<?php print $rdf->profile; ?>>
  <?php print $head; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]>
  <script src="<?php print $base_path . $path_to_theme; ?>/js/html5.js"></script>
  <script src="<?php print $base_path . $path_to_theme; ?>/js/respond.js"></script>
  <![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>