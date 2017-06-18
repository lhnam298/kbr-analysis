<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeVersion = __d ( 'cake_dev', 'CakePHP %s', Configure::version () )?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	    echo $this->Html->meta ( 'icon' );
	    echo $this->fetch ( 'meta' );
	    echo $this->fetch ( 'css' );
	    echo $this->fetch ( 'script' );
	?>

	<base href="/">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="content">
			<div id="wrapper">
				<div id="page-wrapper">
					<?php echo $this->fetch('content'); ?>
				</div>
				<!-- /#page-wrapper -->
			</div>
			<!-- /#wrapper -->
		</div>
		<div id="footer">
			<p><?php echo $cakeVersion; ?></p>
		</div>
	</div>

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
