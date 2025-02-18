<?php
$secret_path = "/etc/secrets/.env"; // Render にアップロードした .env のパス

if (file_exists($secret_path)) {
    $lines = file($secret_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // コメント行を無視
        putenv($line);
    }
} elseif (!getenv('RENDER') && file_exists(__DIR__ . '/.env')) {
    // ローカル環境では .env を読み込む
    $lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // コメント行を無視
        putenv($line);
    }
} else {
    error_log("Warning: No .env file found in Render Secret Files or local directory.");
}

// デバッグ用（環境変数の取得状況をログ出力）
error_log("DB_HOST: " . getenv('DB_HOST'));
error_log("DB_PORT: " . getenv('DB_PORT'));
error_log("DB_NAME: " . getenv('DB_NAME'));
error_log("DB_USER: " . getenv('DB_USER'));
error_log("DB_PASSWORD: " . getenv('DB_PASSWORD'));
?>