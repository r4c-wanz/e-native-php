<?php
$file_path = __FILE__;

$folder_name = basename(dirname($file_path));

if (isset($_SESSION['alert']) && (time() - $_SESSION['alert']['timestamp'] < 5)):
    $title = $_SESSION['alert']['title'];
    $message = $_SESSION['alert']['message'];
    $type = $_SESSION['alert']['type'];
    ?>
    <div id="alert" <?php if ($type === 'info'): ?>
            class="fixed left-0 top-4 right-0 -translate-y-[calc(100%+5rem)] z-50 w-full max-w-[78rem] mx-auto flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 duration-700 shadow ease-in-out"
        <?php elseif ($type === 'danger'): ?>
            class="fixed left-0 top-4 right-0 -translate-y-[calc(100%+5rem)] z-50 w-full max-w-[78rem] mx-auto flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 duration-700 shadow ease-in-out"
        <?php elseif ($type === 'success'): ?>
            class="fixed left-0 top-4 right-0 -translate-y-[calc(100%+5rem)] z-50 w-full max-w-[78rem] mx-auto flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 shadow duration-700 ease-in-out"
        <?php elseif ($type === 'warning'): ?>
            class="fixed left-0 top-4 right-0 -translate-y-[calc(100%+5rem)] z-50 w-full max-w-[78rem] mx-auto flex items-center p-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 shadow duration-700 ease-in-out"
        <?php else: ?>
            class="fixed left-0 top-4 right-0 -translate-y-[calc(100%+5rem)] z-50 w-full max-w-[78rem] mx-auto flex items-center p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 shadow duration-700 ease-in-out"
        <?php endif ?> role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">
                <?= $title ?>
            </span>
            <?= $message ?>
        </div>
    </div>
    <script>
        setTimeout(function () {
            var alert = document.getElementById('alert');
            alert.classList.remove('-translate-y-[calc(100%+5rem)]');
            setTimeout(function () {
                alert.classList.add('-translate-y-[calc(100%+5rem)]');
            }, 5000);
        }, 100);

        var elementToDelete = document.getElementById('alert');
        var scriptToDelete = document.currentScript;

        setTimeout(function () {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/<?= $folder_name ?>/komponen/delete-session.php", true);
            xhr.send();
            elementToDelete.parentNode.removeChild(elementToDelete);
            scriptToDelete.parentNode.removeChild(scriptToDelete);
        }, 6000);
    </script>
<?php endif; ?>