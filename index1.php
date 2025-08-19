<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CosmicBeats - Free Music Streaming. Discover, browse, and play songs from a variety of genres.">
    <title>CosmicBeats - Free Music</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #0a0a0a;
            color: white;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: white;
        }

        /* Navbar */
        .navbar {
            background: rgba(26, 26, 46, 0.9);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            transition: 0.3s;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            margin: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 28px;
            font-weight: bold;
        }

        .logo img {
            width: 40px;
            margin-right: 10px;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            font-weight: bold;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #00aaff;
        }

        .auth-buttons a {
            padding: 8px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .login-btn {
            border: 1px solid white;
        }

        .signup-btn {
            background: #00aaff;
            border: none;
        }

        .signup-btn:hover {
            background: #0088cc;
        }

        .logout-btn {
            padding: 8px 15px;
            border-radius: 5px;
            background: red;
            color: white;
            transition: 0.3s;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: darkred;
        }

        /* Hero Section */
        .hero {
            padding: 120px 20px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), #0a0a0a), url('img/back.webp') center/cover no-repeat;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        .hero h1 {
            font-size: 3rem;
            animation: fadeIn 1.5s ease-in-out;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
            animation: fadeIn 1.8s ease-in-out;
        }

        .explore-btn {
            margin-top: 20px;
            padding: 12px 25px;
            background: #00aaff;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        .explore-btn:hover {
            background: #0088cc;
            transform: scale(1.05);
        }

        /* Featured Playlists */
        .featured-playlists {
            margin: 50px auto;
            text-align: center;
        }

        .featured-playlists h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .playlist-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 0 20px;
        }

        .playlist {
            background: #1a1a2e;
            padding: 15px;
            border-radius: 10px;
            transition: 0.3s;
            text-align: center;
            width: 200px;
        }

        .playlist img {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
        }

        .playlist h3 {
            margin-top: 10px;
            font-size: 1.2rem;
        }

        .playlist:hover {
            transform: scale(1.05);
        }

        /* Footer */
        .footer {
            background: #1a1a2e;
            padding: 20px;
            margin-top: 30px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="img/logo.webp" alt="CosmicBeats Logo">
                <span>CosmicBeats</span>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="index1.php" class="active">Home</a></li>
                    <li><a href="browse.html">All Songs</a></li>
                    <li><a href="about us.html">About Us</a></li>
                    <li><a href="contact us.php">Contact Us</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <?php if (isset($_SESSION["username"])) { ?>
                    <span style="margin-right: 10px; color: white;">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                <?php } else { ?>
                    <a href="login.html" class="btn login-btn">Login</a>
                    <a href="signup.html" class="btn signup-btn">Sign Up</a>
                <?php } ?>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Discover, Stream & Enjoy Music</h1>
        <p>Explore a world of music with CosmicBeats. Listen to trending songs, create playlists, and enjoy seamless streaming.</p>
        <a href="browse.html" class="explore-btn">Start Listening</a>
    </section>

    <!-- Featured Playlists -->
    <section class="featured-playlists">
        <h2>Trending Playlists</h2>
        <div class="playlist-container">
            <div class="playlist">
                <a href="chill.php">
                    <img src="img/chill.jpg" alt="Chill Vibes">
                    <h3>Chill Vibes</h3>
                </a>
            </div>
            <div class="playlist">
                <a href="arjit.php">
                    <img src="img/arjit.jpg" alt="Top Hits">
                    <h3>Top Hits</h3>
                </a>
            </div>
            <div class="playlist">
                <a href="qawwali.php">
                    <img src="img/mast.jpg" alt="Qawwali">
                    <h3>Qawwali</h3>
                </a>
            </div>
            <div class="playlist">
                <a href="melody.php">
                    <img src="img/melody.jpg" alt="Melodic Legends">
                    <h3>Melodic Legends</h3>
                </a>
            </div>
            <div class="playlist">
                <a href="sm.php">
                    <img src="img/sm.jpeg" alt="Rap">
                    <h3>Seedhe Maut</h3>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 CosmicBeats. All rights reserved.</p>
    </footer>

</body>
</html>
