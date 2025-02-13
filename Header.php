<header>
    <div class="logo">Nature's<span> Cottage</span></div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="listings.php">Browse properties</a></li>
            <li><a href="details.php">List your property</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

        <div class="auth-buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                
                <a href="account.php"><i class="fas fa-user"></i></a>


            <?php else: ?>
                
                <button class="btn" id="signInButton">Sign In</button>
                <button class="btn primary" id="signUpButton">Sign Up</button>
            <?php endif; ?>
        </div>
    </nav>
</header>
