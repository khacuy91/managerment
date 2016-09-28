<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
	<meta charset="UTF-8" />
	<title><?= $this->fetch('title') ?></title>
	<meta name="robots" content="noindex,nofollow" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/admin/import.css" />
</head>

<body>
	<section class="container clearfix">
		<?= $this->fetch('content') ?>
	</section>	
</body>
</html>
