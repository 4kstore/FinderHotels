<?php
$config = core\SimpleConfig::getInstance();
$urlToPublic = $config->get('url');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= $urlToPublic ?>/css/main.css" rel="stylesheet">
</head>
<body>