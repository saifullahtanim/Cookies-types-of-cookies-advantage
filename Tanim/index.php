<?php
$showBanner = !isset($_COOKIE['cookie_consent']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['consent'])) {
        setcookie('cookie_consent', $_POST['consent'], time() + (86400 * 30), "/");
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['reset_cookie'])) {
        setcookie('cookie_consent', '', time() - 3600, "/"); // delete cookie
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies in PHP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f7fa;
            color: #333;
        }
        .container {
            max-width: 960px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        h2 {
            color: #34495e;
        }
        ul {
            padding-left: 20px;
        }

        .cookie-banner {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 999;
            flex-wrap: wrap;
        }

        .cookie-text {
            font-size: 14px;
            margin-bottom: 10px;
            flex: 1;
        }

        .cookie-buttons {
            display: flex;
            gap: 10px;
        }

        .cookie-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .accept { background: #2ecc71; color: white; }
        .decline { background: #e74c3c; color: white; }

        .reset-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .reset-container form button {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Reset Button -->
<div class="reset-container">
    <form method="POST">
        <button name="reset_cookie" type="submit">Reset Cookie</button>
    </form>
</div>

<div class="container">
    <h1>Cookies in PHP</h1>

    <h2>What are Cookies?</h2>
    <p>Cookies are small pieces of data stored on the user's computer by the web browser while browsing a website. They help track user activity, store preferences, and maintain login sessions.</p>

    <h2>Types of Cookies</h2>
    <ul>
        <li><strong>Session Cookies:</strong> Temporary and deleted when the browser closes.</li>
        <li><strong>Persistent Cookies:</strong> Stay on the user's device for a set period.</li>
        <li><strong>Secure Cookies:</strong> Sent only over HTTPS connections.</li>
        <li><strong>HttpOnly Cookies:</strong> Cannot be accessed by JavaScript (for security).</li>
        <li><strong>Third-Party Cookies:</strong> Created by domains other than the site being visited (often for ads).</li>
    </ul>

    <h2>Advantages of Cookies</h2>
    <ul>
        <li>Maintain user sessions (like login).</li>
        <li>Store user preferences and settings.</li>
        <li>Enable personalized user experiences.</li>
        <li>Track analytics and user behavior.</li>
        <li>Improve website performance through caching.</li>
    </ul>
</div>

<?php if ($showBanner): ?>
<div class="cookie-banner">
    <div class="cookie-text">
        We use cookies to improve your experience. Read our 
        <a href="#" style="color:#1abc9c;">Privacy Policy</a>.
    </div>
    <form method="POST" class="cookie-buttons">
        <button type="submit" name="consent" value="accepted" class="accept">Accept</button>
        <button type="submit" name="consent" value="declined" class="decline">Decline</button>
    </form>
</div>
<?php endif; ?>

</body>
</html>
