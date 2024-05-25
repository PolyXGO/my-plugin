<?php
if ($argc > 1) {
    $class_name = $argv[1];
    create_template_class_blank($class_name);
} else {
    echo "Usage: php run-poly.php <ClassName>\n";
}

function create_template_class_blank($class_name) {
    $dir = dirname(__DIR__) . '/model/';
    $file_name = 'class-mp-' . strtolower($class_name) . '.php';
    $file_path = $dir . $file_name;

    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $template_path = __DIR__ . '/template/class-template.php';
    $class_template = file_get_contents($template_path);
    $class_template = str_replace('Mp_MyClassName', 'Mp_' . $class_name, $class_template);

    file_put_contents($file_path, $class_template);
    echo "Create template class $class_name at $file_path\n";
}
?>
