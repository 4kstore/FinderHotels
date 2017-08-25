<?php
$config = core\SimpleConfig::getInstance();
$urlToPublic = $config->get('url');
?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?= $urlToPublic ?>/js/main.js"></script>
	</body>
</html>