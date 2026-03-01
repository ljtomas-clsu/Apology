<?php
// Relationship Status Logic
$relationshipStatus = "Galit Pa 😤";
$statusClass = "status-cold";
$showConfetti = false;

if (isset($_POST['peace_treaty'])) {
    $relationshipStatus = "Nagtatampo 🥺";
    $statusClass = "status-healing";
}

if (isset($_POST['full_peace'])) {
    $relationshipStatus = "Okay Na 💖";
    $statusClass = "status-good";
    $showConfetti = true;
}
?>
<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Para Sa'yo 🤍</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Sacramento&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(160deg, #fce4ec 0%, #fff0f5 40%, #fff3e0 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 1rem 3rem;
            color: #5d4037;
            overflow-x: hidden;
        }

        /* Floating hearts background */
        .floating-hearts {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .heart {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0.12;
            animation: floatUp 10s ease-in infinite;
        }

        @keyframes floatUp {
            0%   { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10%  { opacity: 0.12; }
            90%  { opacity: 0.12; }
            100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
        }

        /* Floating sorry.jpg */
        .floating-sorry {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .sorry-float {
            position: absolute;
            opacity: 0;
            border-radius: 18px;
            animation: sorryFloat linear infinite;
            filter: blur(0.5px);
        }

        @keyframes sorryFloat {
            0%   { transform: translateY(105vh) rotate(-6deg) scale(1);   opacity: 0; }
            8%   { opacity: 0.13; }
            50%  { transform: translateY(48vh)  rotate(6deg)  scale(1.04); opacity: 0.13; }
            92%  { opacity: 0.10; }
            100% { transform: translateY(-10vh) rotate(-4deg) scale(0.96); opacity: 0; }
        }

        .container {
            max-width: 640px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        /* ── Header ── */
        .site-header {
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeInDown 0.9s ease;
        }

        .flag-icon {
            font-size: 3.2rem;
            display: inline-block;
            animation: wave 2.2s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% { transform: rotate(-12deg); }
            50%       { transform: rotate(12deg); }
        }

        .site-header h1 {
            font-family: 'Sacramento', cursive;
            font-size: 3.4rem;
            color: #e91e63;
            margin-top: 0.4rem;
            text-shadow: 0 2px 12px rgba(233,30,99,0.15);
        }

        .site-header .tagline {
            font-size: 0.95rem;
            color: #a1887f;
            margin-top: 0.3rem;
            font-style: italic;
        }

        /* ── Cards ── */
        .card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 24px;
            padding: 2rem;
            margin-bottom: 1.6rem;
            box-shadow: 0 8px 40px rgba(233, 30, 99, 0.09);
            border: 1px solid rgba(255, 255, 255, 0.7);
            animation: fadeInUp 0.8s ease both;
        }

        .card:nth-child(2) { animation-delay: 0.05s; }
        .card:nth-child(3) { animation-delay: 0.10s; }
        .card:nth-child(4) { animation-delay: 0.15s; }
        .card:nth-child(5) { animation-delay: 0.20s; }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Hero Sorry Image ── */
        .hero-image-wrap {
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 1.6rem;
            box-shadow: 0 12px 40px rgba(233,30,99,0.18);
            animation: fadeInUp 0.9s ease both;
            position: relative;
        }

        .hero-image-wrap img {
            width: 100%;
            display: block;
            object-fit: cover;
            max-height: 320px;
        }

        .hero-image-wrap .hero-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: linear-gradient(transparent, rgba(233,30,99,0.55));
            padding: 1.5rem 1.5rem 1.2rem;
        }

        .hero-overlay p {
            font-family: 'Sacramento', cursive;
            font-size: 2rem;
            color: #fff;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        /* ── Envelope ── */
        .envelope-wrap {
            position: relative;
            margin-bottom: 1.6rem;
            animation: fadeInUp 0.8s ease both;
            animation-delay: 0.05s;
        }

        /* Open flap (folded back) — inside of flap shown as downward triangle */
        .env-flap {
            height: 68px;
            background: linear-gradient(160deg, #e91e63, #f06292);
            clip-path: polygon(0 0, 100% 0, 50% 100%);
            border-radius: 18px 18px 0 0;
            position: relative;
            z-index: 0;
            filter: drop-shadow(0 4px 6px rgba(233,30,99,0.25));
        }

        /* Envelope pocket body */
        .env-pocket {
            background: linear-gradient(160deg, #f8bbd0, #fce4ec);
            border-radius: 0 0 22px 22px;
            padding: 0 1.5rem 1.8rem;
            position: relative;
            z-index: 1;
            border: 1.5px solid #f48fb1;
            border-top: none;
            box-shadow: 0 10px 36px rgba(233,30,99,0.15);
        }

        /* Diagonal fold lines at top of pocket */
        .env-pocket::before,
        .env-pocket::after {
            content: '';
            position: absolute;
            top: 0;
            height: 55px;
            width: 50%;
            background: rgba(255,255,255,0.22);
        }
        .env-pocket::before {
            left: 0;
            clip-path: polygon(0 0, 100% 0, 0 100%);
        }
        .env-pocket::after {
            right: 0;
            clip-path: polygon(0 0, 100% 0, 100% 100%);
        }

        /* Letter paper — sticks up out of the pocket */
        .env-letter {
            background: linear-gradient(180deg, #fff 0%, #fff9fb 100%);
            border-radius: 14px;
            padding: 1.6rem 1.5rem 1.8rem;
            margin-top: -28px;
            position: relative;
            z-index: 2;
            box-shadow: 0 -2px 12px rgba(233,30,99,0.08), 0 6px 20px rgba(0,0,0,0.07);
            border: 1px solid #fce4ec;
            text-align: center;
        }

        .env-seal {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.6rem;
        }

        .emoji-divider {
            font-size: 1.2rem;
            letter-spacing: 0.4rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }

        /* ── Photo Gallery ── */
        .gallery-section h2 {
            text-align: center;
            font-size: 1.2rem;
            color: #e91e63;
            margin-bottom: 1.2rem;
            font-weight: 700;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        .gallery-grid .photo-item {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(233,30,99,0.12);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            cursor: pointer;
            position: relative;
        }

        .gallery-grid .photo-item:first-child {
            grid-column: 1 / -1;
        }

        .gallery-grid .photo-item img {
            width: 100%;
            display: block;
            object-fit: cover;
            height: 200px;
        }

        .gallery-grid .photo-item:first-child img {
            height: 250px;
        }

        .gallery-grid .photo-item:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 30px rgba(233,30,99,0.22);
        }

        /* ── Lightbox ── */
        .lightbox {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 999;
            background: rgba(0,0,0,0.88);
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .lightbox.active { display: flex; }

        .lightbox img {
            max-width: 90vw;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        }

        .lightbox-close {
            position: fixed;
            top: 1rem; right: 1.2rem;
            font-size: 2.2rem;
            color: #fff;
            cursor: pointer;
            line-height: 1;
            opacity: 0.85;
            transition: opacity 0.2s;
        }

        .lightbox-close:hover { opacity: 1; }

        .apology-text {
            font-size: 1.05rem;
            line-height: 1.9;
            color: #6d4c41;
            font-weight: 600;
            padding: 0 0.25rem;
        }

        /* ── Status Section ── */
        .status-section { text-align: center; }

        .status-section h2 {
            font-size: 0.95rem;
            color: #a1887f;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 700;
        }

        .status-badge {
            display: inline-block;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            transition: all 0.5s ease;
        }

        .status-cold .status-badge {
            background: linear-gradient(135deg, #ffebee, #ffcdd2);
            color: #c62828;
            border: 2px solid #ef9a9a;
        }

        .status-healing .status-badge {
            background: linear-gradient(135deg, #f3e5f5, #e1bee7);
            color: #6a1b9a;
            border: 2px solid #ce93d8;
            animation: pulse 1.5s ease infinite;
        }

        .status-good .status-badge {
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            color: #c2185b;
            border: 2px solid #f48fb1;
            animation: pulse 1.5s ease infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Progress Bar */
        .progress-container {
            width: 100%;
            background: #f0e4e8;
            border-radius: 50px;
            height: 13px;
            margin-bottom: 1.4rem;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            border-radius: 50px;
            transition: width 1.2s cubic-bezier(.4,0,.2,1), background 1.2s ease;
        }

        .status-cold    .progress-bar { width: 15%;  background: linear-gradient(90deg, #ef9a9a, #e53935); }
        .status-healing .progress-bar { width: 58%;  background: linear-gradient(90deg, #ce93d8, #ab47bc); }
        .status-good    .progress-bar { width: 100%; background: linear-gradient(90deg, #f48fb1, #e91e63); }

        .progress-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            color: #a1887f;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        /* Buttons */
        .btn-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            padding: 0.9rem 2rem;
            border: none;
            border-radius: 50px;
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-peace {
            background: linear-gradient(135deg, #ffcc80, #ffab40);
            color: #bf360c;
            box-shadow: 0 4px 16px rgba(255,171,64,0.35);
        }

        .btn-peace:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(255,171,64,0.5);
        }

        .btn-full-peace {
            background: linear-gradient(135deg, #f48fb1, #e91e63);
            color: white;
            box-shadow: 0 4px 16px rgba(233,30,99,0.35);
        }

        .btn-full-peace:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(233,30,99,0.5);
        }

        .btn:active { transform: translateY(0); }

        /* ── Peace Offering ── */
        .offerings-section h2 {
            text-align: center;
            font-size: 1.25rem;
            color: #e91e63;
            margin-bottom: 0.4rem;
            font-weight: 700;
        }

        .offerings-section .subtitle {
            text-align: center;
            font-size: 0.9rem;
            color: #a1887f;
            margin-bottom: 1.5rem;
        }

        .offering-list {
            list-style: none;
            display: grid;
            gap: 0.75rem;
        }

        .offering-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            background: linear-gradient(135deg, #fce4ec, #fff3e0);
            border-radius: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .offering-item:hover {
            transform: translateX(6px);
            box-shadow: 0 4px 18px rgba(233,30,99,0.1);
        }

        .offering-icon {
            font-size: 2rem;
            flex-shrink: 0;
        }

        .offering-details h3 {
            font-size: 1rem;
            color: #c2185b;
            margin-bottom: 0.2rem;
        }

        .offering-details p {
            font-size: 0.85rem;
            color: #8d6e63;
        }

        .patch-badge {
            margin-left: auto;
            background: #e91e63;
            color: white;
            font-size: 0.68rem;
            padding: 0.25rem 0.65rem;
            border-radius: 50px;
            font-weight: 700;
            flex-shrink: 0;
            letter-spacing: 0.5px;
        }

        /* ── Strategy Section ── */
        .strategy-section h2 {
            text-align: center;
            font-size: 1.1rem;
            color: #e91e63;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .strategy-flow {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .strategy-step {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.85rem 1.1rem;
            background: linear-gradient(135deg, #fff8e1, #fce4ec22);
            border-radius: 14px;
            font-size: 0.92rem;
            border-left: 3px solid #f48fb1;
        }

        .strategy-step .step-icon { font-size: 1.4rem; }

        .step-arrow {
            text-align: center;
            color: #f48fb1;
            font-size: 1.1rem;
        }

        /* ── Closing Section ── */
        .closing-section { text-align: center; }

        .closing-section .closing-emoji {
            font-size: 2.8rem;
            margin-bottom: 1rem;
        }

        .closing-text {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #c2185b;
            font-weight: 700;
        }

        .closing-sub {
            margin-top: 1rem;
            font-size: 0.95rem;
            color: #8d6e63;
            font-style: italic;
        }

        .signature {
            margin-top: 1.5rem;
            font-family: 'Sacramento', cursive;
            font-size: 2.2rem;
            color: #e91e63;
        }

        /* ── Confetti ── */
        .confetti-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 100;
            overflow: hidden;
        }

        .confetti-piece {
            position: absolute;
            top: -10px;
            font-size: 1.5rem;
            animation: confettiFall 4.5s ease-in forwards;
        }

        @keyframes confettiFall {
            0%   { transform: translateY(-10vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
        }

        /* ── Responsive ── */
        @media (max-width: 480px) {
            .site-header h1   { font-size: 2.6rem; }
            .apology-text     { font-size: 1rem; }
            .card             { padding: 1.5rem; }
            .btn              { padding: 0.78rem 1.4rem; font-size: 0.92rem; }
            .gallery-grid .photo-item img        { height: 160px; }
            .gallery-grid .photo-item:first-child img { height: 210px; }
            .hero-image-wrap img                 { max-height: 240px; }
        }
    </style>
</head>
<body>

<!-- Floating Hearts Background -->
<div class="floating-hearts">
    <?php
    $heartEmojis = ['💕', '💗', '💖', '🩷', '🤍', '🌸'];
    for ($i = 0; $i < 18; $i++) {
        $left     = rand(0, 100);
        $delay    = rand(0, 80) / 10;
        $duration = rand(70, 120) / 10;
        $emoji = $heartEmojis[array_rand($heartEmojis)];
        echo "<span class='heart' style='left:{$left}%; animation-delay:{$delay}s; animation-duration:{$duration}s;'>{$emoji}</span>";
    }
    ?>
</div>

<!-- Floating sorry.jpg -->
<div class="floating-sorry">
    <?php
    $sorryInstances = [
        ['left' => 5,  'width' => 110, 'delay' => 0,   'duration' => 22],
        ['left' => 25, 'width' => 90,  'delay' => 7,   'duration' => 28],
        ['left' => 55, 'width' => 120, 'delay' => 3,   'duration' => 25],
        ['left' => 75, 'width' => 85,  'delay' => 14,  'duration' => 30],
        ['left' => 88, 'width' => 100, 'delay' => 9,   'duration' => 20],
    ];
    foreach ($sorryInstances as $s) {
        echo "<img class='sorry-float' src='sorry.jpg' alt=''
            style='left:{$s['left']}%; width:{$s['width']}px;
                   animation-delay:{$s['delay']}s;
                   animation-duration:{$s['duration']}s;'>";
    }
    ?>
</div>

<?php if ($showConfetti): ?>
<div class="confetti-container" id="confetti">
    <?php
    $confettiEmojis = ['💖', '🎉', '✨', '💕', '🩷', '🌸', '💐', '🎀', '💗'];
    for ($i = 0; $i < 40; $i++) {
        $left  = rand(0, 100);
        $delay = rand(0, 40) / 10;
        $emoji = $confettiEmojis[array_rand($confettiEmojis)];
        echo "<span class='confetti-piece' style='left:{$left}%; animation-delay:{$delay}s;'>{$emoji}</span>";
    }
    ?>
</div>
<?php endif; ?>

<!-- Lightbox -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <span class="lightbox-close" onclick="closeLightbox()">✕</span>
    <img id="lightbox-img" src="" alt="">
</div>

<div class="container">

    <!-- Header -->
    <header class="site-header">
        <div class="flag-icon">🏳️</div>
        <h1>Peace Offering</h1>
        <p class="tagline">Sorry po sa lahat - hindi na po mauulit.</p>
    </header>

    <!-- Hero Sorry Image -->
    <div class="hero-image-wrap">
        <img src="forgive-me.jpg" alt="I'm sorry">
        <div class="hero-overlay">
            <p>Sorry po. 🤍</p>
        </div>
    </div>

    <!-- Apology Envelope -->
    <div class="envelope-wrap">
        <div class="env-flap"></div>
        <div class="env-pocket">
            <div class="env-letter">
                <span class="env-seal">💌</span>
                <div class="emoji-divider"> ───────── ✿ ───────── </div>
                <p class="apology-text">
                    Sorry po wabwab ko kung nahayaan ko na maging cold tayo sa isa't isa.
                    Ayoko pong ganito tayo namimiss ko na yung normal na tayong dalawa,
                    yung palagi tayong may kwento sa isa't isa, parehong masaya,
                    at iniisip lang kung paano pabilisin ang oras para magkasama na agad tayo.
                </p>
            </div>
        </div>
    </div>

    <!-- Photo Gallery -->
    <div class="card gallery-section">
        <h2>📸 Para Sa 'yo</h2>
        <div class="gallery-grid">
            <?php
            $photos = [
                ['src' => 'afdacd49-b7b8-42cc-922f-2d93390191d0.jpg',    'alt' => 'Photo 1'],
                ['src' => '649d5a9b-2c6e-4311-acae-3ba50373f12e.jpg',    'alt' => 'Photo 2'],
                ['src' => '19773755-e6a0-4121-b8c6-ec4ea851fbc4.jpg',    'alt' => 'Photo 3'],
            ];
            foreach ($photos as $photo): ?>
                <div class="photo-item" onclick="openLightbox('<?php echo htmlspecialchars($photo['src']); ?>')">
                    <img src="<?php echo htmlspecialchars($photo['src']); ?>"
                         alt="<?php echo htmlspecialchars($photo['alt']); ?>"
                         loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Status Card -->
    <div class="card status-section <?php echo $statusClass; ?>">
        <h2>📊 Relationship Status</h2>

        <div class="status-badge">
            <?php echo $relationshipStatus; ?>
        </div>

        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
        <div class="progress-labels">
            <span>Galit Pa 😤</span>
            <span>Nagtatampo 🥺</span>
            <span>Okay Na 💖</span>
        </div>

        <div class="btn-group">
            <?php if ($statusClass === 'status-cold'): ?>
                <form method="POST">
                    <button type="submit" name="peace_treaty" class="btn btn-peace">
                        🥺 Okay na, nagtatampo lang
                    </button>
                </form>
            <?php elseif ($statusClass === 'status-healing'): ?>
                <form method="POST">
                    <button type="submit" name="full_peace" class="btn btn-full-peace">
                        💖 Okay na talaga
                    </button>
                </form>
            <?php else: ?>
                <p style="font-size: 1.1rem; color: #c2185b; font-weight: 700;">
                    ✨ Okay na tayo. Salamat sa pagbibigay ng chance. ✨
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Peace Offering List -->
    <div class="card offerings-section">
        <h2>🎁 Peace Offering</h2>
        <p class="subtitle">Mga "patches" para ayusin ang relationship bug 🛠️</p>

        <?php
        $offerings = [
            ['icon' => '💬', 'name' => 'Quality Time',   'desc' => 'Focused attention, walang phone or kahit ano usap lang po tayo.',         'patch' => 'PATCH #1'],
            ['icon' => '🤗', 'name' => 'Yakap',          'desc' => 'Mainit na yakap.',   'patch' => 'PATCH #2'],
            ['icon' => '📝', 'name' => 'Proper Usap',    'desc' => 'No more cold shoulder — please ayusing po natin ito at pag-usapan.', 'patch' => 'PATCH #3'],
            ['icon' => '🌸', 'name' => 'Presence',       'desc' => 'Nandito po ako lagi hindi magsasawang maghintay sayo.',                        'patch' => 'PATCH #4'],
            ['icon' => '💌', 'name' => 'Sweet Messages', 'desc' => 'Sobrang humihingi po ako ng pasensya/sorry po sa mga nagawa ko(unang-una sa po sa pagiging manhid ko).',    'patch' => 'PATCH #5'],
        ];
        ?>

        <ul class="offering-list">
            <?php foreach ($offerings as $item): ?>
                <li class="offering-item">
                    <span class="offering-icon"><?php echo $item['icon']; ?></span>
                    <div class="offering-details">
                        <h3><?php echo $item['name']; ?></h3>
                        <p><?php echo $item['desc']; ?></p>
                    </div>
                    <span class="patch-badge"><?php echo $item['patch']; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Strategy Summary Card -->


    <!-- Closing Statement -->
    <div class="card closing-section">
        <div class="closing-emoji">🤍</div>
        <p class="closing-text">
            Hindi ko na po ulit hahayaan na maging ganito po ulit tayo
            matututo na din po akong makiramdam sa paligid ko ayaw ko na po ulit
            dumating tayo sa point na ganito na maging cold tayo sa isa't-isa
            Hindi ko po kaya na ganito tayo na natutulog na magka galit o magkatampuhan
            Sorry po wabwab ko, promise po magbabago na po ako.
            Mahal na mahal po kita.<br>
            Hindi na po mauulit, Sorry po.
        </p>
        <p class="closing-sub">
            "I LOVE YOU SO MUCH WABWAB KO."
        </p>
        <div class="signature">— From wabwab mo, para sa'yo 💌</div>
    </div>

</div>

<script>
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
    });
</script>

</body>
</html>
