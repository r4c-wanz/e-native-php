<?php
$file_path = __FILE__;

$folder_name = basename(dirname(dirname($file_path)));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'E-Ticketing'; ?></title>
    <link href="/<?= $folder_name ?>/css/tailwindcss.css" rel="stylesheet">
    <link href="/<?= $folder_name ?>/node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet" />
    <?php if (!empty($additionalStyles)) : ?>
        <?php foreach ($additionalStyles as $style) : ?>
            <link href="<?php echo $style; ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php echo $content ?? ''; ?>
    <script src="/<?= $folder_name ?>/node_modules/flowbite/dist/flowbite.min.js"></script>
    <?php if (!empty($additionalScripts)) : ?>
        <?php foreach ($additionalScripts as $script) : ?>
            <script src="<?php echo $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
