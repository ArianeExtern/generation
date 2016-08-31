<!DOCTYPE html>
<html>
    <head>
        <title>
		<?php echo $__env->yieldContent('title'); ?>
	</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
	   <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>
