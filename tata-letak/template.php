<?php
$path = $_SERVER['SCRIPT_FILENAME'];
$folder_name = '/' . explode('/', $path)[3];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'E-Ticketing'; ?></title>
    <link href="<?= $folder_name ?>/css/tailwindcss.css" rel="stylesheet">
    <link href="<?= $folder_name ?>/node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet" />
    <?php if (!empty($additionalStyles)) : ?>
        <?php foreach ($additionalStyles as $style) : ?>
            <link href="<?php echo $style; ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php echo $content ?? ''; ?>
    <script src="<?= $folder_name ?>/node_modules/flowbite/dist/flowbite.min.js"></script>
    <?php if (!empty($additionalScripts)) : ?>
        <?php foreach ($additionalScripts as $script) : ?>
            <script src="<?= $folder_name ?><?php echo $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (!empty($additionalScript)) : ?>
        <?php echo $additionalScript; ?>
    <?php endif; ?>
</body>
</html>
