<?php
$config = core\SimpleConfig::getInstance();
$urlToPublic = $config->get('url');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <link href="<?= $urlToPublic ?>/css/main.css" rel="stylesheet">
</head>
<body>