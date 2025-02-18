<?php
// データベース接続情報
$host = "dpg-cuookv9opnds738u2cp0-a.singapore-postgres.render.com"; // Renderのホスト名
$port = "5432"; // ポート番号
$dbname = "boards_4ygy"; // データベース名
$user = "test"; // ユーザー名
$password = "G5AprTcABU6ewcb4TzDpMgTskxhuK5V8"; // パスワード（実運用では.envに保存推奨）

// PDOを使用してデータベースに接続
try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("データベース接続に失敗しました: " . $e->getMessage());
}

// users テーブルのデータを取得
try {
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("データ取得に失敗しました: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">ユーザー一覧</h2>

<table>
    <tr>
        <th>ID</th>
        <th>名前</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>