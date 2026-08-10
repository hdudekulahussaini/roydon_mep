<?php
$dir = new RecursiveDirectoryIterator('app/Http/Controllers');
$iter = new RecursiveIteratorIterator($dir);
$regex = '/return redirect\(\)\s*->(route|to|back)\((.*?)\)\s*->with\(\'(success|error|warning)\',\s*(.*?)\);/s';

foreach ($iter as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        $content = file_get_contents($file);
        $newContent = preg_replace_callback($regex, function($m) {
            $type = $m[3]; // success, error, warning
            $msg = $m[4];
            $routeType = $m[1];
            $routeArg = $m[2];
            return 'flash()->' . $type . '(' . $msg . ');' . "\n        " . 'return redirect()->' . $routeType . '(' . $routeArg . ');';
        }, $content);
        
        if ($content !== $newContent) {
            file_put_contents($file, $newContent);
            echo 'Updated: ' . $file . PHP_EOL;
        }
    }
}
