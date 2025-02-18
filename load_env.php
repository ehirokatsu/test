<?php
// ローカル環境では .env を読み込む
$env_path = __DIR__ . '/.env';

if (file_exists($env_path)) {
    $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // コメント行を無視
        putenv($line);
    }
} else {
    error_log("Warning: No .env file found in the local directory.");
}

?>