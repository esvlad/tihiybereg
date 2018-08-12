
<!DOCTYPE html>
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="viewport" content="width=device-width">
  <?php print $styles; ?>
  <meta http-equiv="Cache-Control" content="no-cache">
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php print $scripts; ?>
  <script src="../sites/all/themes/tihiy/js/myscript.js"></script>
  <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
  <script src="../sites/all/themes/tihiy/js/yaMap.js"></script>
</body>
</html>
