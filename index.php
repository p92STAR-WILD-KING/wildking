<?php
$config = json_decode(file_get_contents('config.json'), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>92 Pak Wingo Hack</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background-color: #0b192c; color: #ffffff; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding-bottom: 70px; }
        .container { width: 100%; max-width: 450px; padding: 15px; }
        .header { background: linear-gradient(135deg, #1abc9c, #16a085); text-align: center; padding: 12px; font-size: 18px; font-weight: bold; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); }
        .card { background-color: #1e293b; border-radius: 12px; padding: 15px; margin-bottom: 15px; border: 1px solid #334155; text-align: center; }
        .card-title { font-size: 13px; color: #94a3b8; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px; }
        .main-heading { font-size: 18px; font-weight: bold; margin-bottom: 15px; }
        .btn { display: block; width: 100%; padding: 12px; margin: 10px 0; border: none; border-radius: 8px; font-size: 15px; font-weight: bold; cursor: pointer; text-align: center; text-decoration: none; }
        .btn-green { background-color: #1abc9c; color: #ffffff; }
        .btn-yellow { background-color: #f1c40f; color: #000000; }
        .sub-text { font-size: 11px; color: #94a3b8; margin-top: 5px; }
        .notice-box { background-color: #1e293b; border-radius: 12px; padding: 15px; border: 1px solid #334155; text-align: left; font-size: 13px; line-height: 1.6; }
        .notice-title { color: #f1c40f; font-size: 16px; margin-bottom: 8px; font-weight: bold; }
        
        /* Bottom Navigation */
        .bottom-nav { position: fixed; bottom: 0; left: 0; width: 100%; background-color: #132238; display: flex; justify-content: space-around; padding: 10px 0; border-top: 1px solid #1e293b; z-index: 100; }
        .nav-item { display: flex; flex-direction: column; align-items: center; color: #94a3b8; font-size: 10px; text-decoration: none; background: none; border: none; cursor: pointer; }
        .nav-item.active { color: #f1c40f; }
        .nav-icon { font-size: 18px; margin-bottom: 3px; }
        .predict-icon-bg { background-color: #f1c40f; color: #000; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-top: -20px; box-shadow: 0 0 10px rgba(241, 196, 15, 0.5); }

        /* Modal & Game Frame */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.8); justify-content: center; align-items: center; z-index: 1000; padding: 20px; }
        .modal-content { background-color: #1e293b; padding: 20px; border-radius: 12px; width: 100%; max-width: 380px; text-align: center; border: 1px solid #334155; }
        .modal-input { width: 100%; padding: 12px; margin: 15px 0; background-color: #0f172a; border: 1px solid #334155; border-radius: 8px; color: #fff; font-size: 14px; text-align: center; }
        .close-btn { background: none; border: none; color: #94a3b8; margin-top: 10px; cursor: pointer; font-size: 13px; }
        
        #gameModal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #000; z-index: 2000; }
        #gameModal iframe { width: 100%; height: 100%; border: none; }
        .close-game { position: absolute; top: 10px; right: 15px; background: #e74c3c; color: #fff; border: none; padding: 8px 15px; border-radius: 5px; font-weight: bold; z-index: 2001; cursor: pointer; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">92 Pak Wingo Hack</div>

        <div class="card">
            <div class="card-title">92 Pak Official Hack</div>
            <div class="main-heading">92 Pak Wingo Hack</div>
            <button class="btn btn-green" onclick="openModal('wingo')">START WINGO PREDICTION</button>
            <button class="btn btn-yellow" onclick="openModal('number')">START NUMBER PREDICTION</button>
            <div class="sub-text">WINGO HACK & NUMBER HACK</div>
        </div>

        <div class="notice-box">
            <div class="notice-title">🎁 السلام علیکم</div>
            <p>Jisko hack chahie is number par rafta Karen Contact WhatsApp: <b><?php echo htmlspecialchars($config['whatsapp_number']); ?></b></p><br>
            <p>🔑 <b>پاس ورڈ حاصل کرنے کا طریقہ:</b></p>
            <p>👉 ہماری لنک سے نیا اکاونٹ بنائیں: <a href="<?php echo htmlspecialchars($config['whatsapp_link']); ?>" target="_blank" style="color: #1abc9c;">Join Here</a></p>
            <p>👉 اکاونٹ میں ڈیپازٹ کریں اور اسکرین شاٹ بھیجیں</p><br>
            <p>📌 کم از کم ڈیپازٹ 300 یا اس سے زیادہ ہونا لازمی ہے</p>
        </div>
    </div>

    <!-- Password Modal -->
    <div class="modal" id="passwordModal">
        <div class="modal-content">
            <h3 style="margin-bottom: 5px;">Security Required</h3>
            <p style="font-size: 14px; color: #94a3b8; margin-bottom: 15px;">Enter Password</p>
            <input type="password" class="modal-input" placeholder="Type Here..." id="passInput">
            <button class="btn btn-green" onclick="checkPassword()">UNLOCK NOW</button>
            <button class="close-btn" onclick="closeModal()">Close</button>
        </div>
    </div>

    <!-- iframe Game Container -->
    <div id="gameModal">
        <button class="close-game" onclick="closeGame()">Exit Game</button>
        <iframe id="gameFrame" src=""></iframe>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="tel:<?php echo htmlspecialchars($config['whatsapp_number']); ?>" class="nav-item">
            <span class="nav-icon">📞</span>
            Contact
        </a>
        <a href="<?php echo htmlspecialchars($config['whatsapp_link']); ?>" target="_blank" class="nav-item">
            <span class="nav-icon">💬</span>
            WhatsApp
        </a>
        <div class="nav-item active">
            <div class="predict-icon-bg">!</div>
            Predict
        </div>
        <a href="admin.php" class="nav-item">
            <span class="nav-icon">⚙️</span>
            Admin
        </a>
    </div>

    <script>
        let currentGame = '';
        function openModal(type) {
            currentGame = type;
            document.getElementById('passwordModal').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('passwordModal').style.display = 'none';
        }
        function checkPassword() {
            let userPass = document.getElementById('passInput').value;
            // PHP se real password secure check hoga ya simple js match
            let correctPass = "<?php echo $config['password']; ?>";
            
            if(userPass === correctPass) {
                closeModal();
                document.getElementById('passInput').value = '';
                // Open iframe game
                let frameUrl = currentGame === 'wingo' ? 'https://example.com/wingo-game' : 'https://example.com/number-game';
                document.getElementById('gameFrame').src = frameUrl;
                document.getElementById('gameModal').style.display = 'block';
            } else {
                alert("Access Denied. Please check your password and try again.");
            }
        }
        function closeGame() {
            document.getElementById('gameModal').style.display = 'none';
            document.getElementById('gameFrame').src = '';
        }
    </script>
</body>
</html>
