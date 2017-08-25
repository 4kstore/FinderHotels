<?php
$config = core\SimpleConfig::getInstance();
$urlToPublic = $config->get('url');
?>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script src="<?= $urlToPublic ?>/js/main.js"></script>
	</body>
</html>