<?php
$current_directory = getcwd(); // 获取当前所在目录
$parent_directory = dirname($current_directory); // 获取父目录

// 获取当前目录中的文件和文件夹
$current_contents = scandir($current_directory);

// 获取父目录中的文件和文件夹
$parent_contents = scandir($parent_directory);

// 获取所有下级目录中的文件和文件夹
$subdirectories = glob($current_directory . '/*', GLOB_ONLYDIR);
$sub_contents = [];

foreach ($subdirectories as $subdirectory) {
    $sub_contents[$subdirectory] = scandir($subdirectory);
}

// 显示当前目录信息
echo "当前目录: " . $current_directory . "\n";
echo "文件和文件夹列表:\n";
foreach ($current_contents as $item) {
    echo $item . " - " . fileperms($current_directory . '/' . $item) . "\n";
}

// 显示父目录信息
echo "\n父目录: " . $parent_directory . "\n";
echo "文件和文件夹列表:\n";
foreach ($parent_contents as $item) {
    echo $item . " - " . fileperms($parent_directory . '/' . $item) . "\n";
}

// 显示所有下级目录信息
foreach ($sub_contents as $subdirectory => $contents) {
    echo "\n下级目录: " . $subdirectory . "\n";
    echo "文件和文件夹列表:\n";
    foreach ($contents as $item) {
        echo $item . " - " . fileperms($subdirectory . '/' . $item) . "\n";
    }
}
?>
