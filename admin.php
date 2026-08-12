<?php
$configFile = 'config.json';
$config = json_decode(file_get_contents($configFile), true);
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $config['password'] = $_POST['password'];
    $config['whatsapp_link'] = $_POST['whatsapp_link'];
    $config['whatsapp_number'] = $_POST['whatsapp_number'];
    
    file_put_contents($configFile, json_encode($config, JSON_PRETTY_PRINT));
    $message = "Settings updated successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body { background-color: #0b192c; color: #fff; font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .admin-card { background: #1e293b; padding: 25px; border-radius: 12px; width: 100%; max-width: 400px; border: 1px solid #334155; }
        h2 { text-align: center; margin-bottom: 20px; color: #f1c40f; }
        label { font-size: 13px; color: #94a3b8; display: block; margin-top: 10px; }
        input { width: 100%; padding: 10px; margin-top: 5px; background: #0f172a; border: 1px solid #334155; border-radius: 6px; color: #fff; }
        button { width: 100%; margin-top: 20px; padding: 12px; background: #1abc9c; border: none; border-radius: 6px; font-weight: bold; color: #fff; cursor: pointer; }
        .msg { color: #2ecc71; text-align: center; margin-bottom: 15px; font-size: 14px; }
        .back { display: block; text-align: center; margin-top: 15px; color: #94a3b8; text-decoration: none; font-size: 12px; }
    </style>
</head>
<body>
    <div class="admin-card">
        <h2>Admin Settings</h2>
        <?php if($message): ?><div class="msg"><?php echo $message; ?></div><?php endif; ?>
        <form method="POST">
            <label>Prediction Password:</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($config['password']); ?>" required>
            
            <label>WhatsApp Channel / Link:</label>
            <input type="text" name="whatsapp_link" value="<?php echo htmlspecialchars($config['whatsapp_link']); ?>" required>
            
            <label>Contact WhatsApp Number:</label>
            <input type="text" name="whatsapp_number" value="<?php echo htmlspecialchars($config['whatsapp_number']); ?>" required>
            
            <button type="submit">Save Changes</button>
        </form>
        <a href="index.php" class="back">← Back to Website</a>
    </div>
</body>
</html>
