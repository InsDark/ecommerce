<?php 
$title;
if(!isset($_GET['action'])) {
    $title = 'SmartPhones Store';
} else {
    $title = $_GET['action'] . '-' . $_GET['subAction'];
}
require 'config/parameters.php'
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASE_URL?>src/styles/normalize.css">
    <?php if(isset($_GET['subAction'])) : ?>
        <link rel="stylesheet" href="<?=BASE_URL?>src/styles/<?= $_GET["action"]?>/<?= $_GET["subAction"].'.css'?>">
    <?php endif; ?>
    <?php if(!isset($_GET['subAction'])) : ?>
        <link rel="stylesheet" href="<?=BASE_URL?>src/styles/index.css">
    <?php endif; ?>
    <title><?php echo $title; ?> </title>
</head>