<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaturesCottage</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
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
                <button class="btn" id="signInButton">Sign In</button>
                <button class="btn primary" id="signUpButton">Sign Up</button>
            </div>
        </nav>
    </header>

    <div id="overlay"></div>

    <div id="authForm">
        <span class="close-btn" onclick="closeModal()">&times;</span>

        <div id="signInForm">
            <h2>Sign In</h2>
            <!-- Form action changed to login.php -->
            <form method="post" action="login.php">
                <div class="input-group">
                    <p>Email</p>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <p>Password</p>
                    <input type="password" name="password" required>
                </div>
                <input type="submit" class="btn" value="Sign In">
            </form>
            <p>Don't have an account yet?</p>
            <button id="signUpToggle">Sign Up</button>
        </div>

        <div id="signUpForm" style="display:none;">
            <h2>Sign Up</h2>
            <!-- Form action kept as register.php -->
            <form method="post" action="register.php">
                <div class="input-group">
                    <p>First Name</p>
                    <input type="text" name="fName" required>
                </div>
                <div class="input-group">
                    <p>Last Name</p>
                    <input type="text" name="lName" required>
                </div>
                <div class="input-group">
                    <p>Email</p>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <p>Password</p>
                    <input type="password" name="password" required>
                </div>
                <div class="input-group">
                    <p>Phone Number</p>
                    <input type="text" name="pNumber" required>
                </div>
                <input type="submit" class="btn" value="Sign Up" name="signUp">
            </form>
            <p>Already have an account?</p>
            <button id="signInToggle">Sign In</button>
        </div>
    </div>

    <main>
        <section class="hero">
            <video class="background-video" autoplay muted loop>
                <source src="2 meginajums.mp4" type="video/mp4" />
            </video>
            <div class="hero-content">
                <h1>Discover Your Dream Vacation</h1>
                <p>Explore unique properties and create unforgettable memories.</p>
                <form class="search-filters">
                    <input type="text" placeholder="Where are you going?" required />
                    <input type="text" id="date-range" placeholder="Select dates" required />
                    <input type="number" placeholder="Guests" min="1" required />
                    <button type="submit" class="btn primary">Search</button>
                </form>
            </div>
        </section>

        <section class="properties">
            <h2>Featured Properties</h2>
            <p class="section-subtitle">
                Handpicked places to stay for your next adventure.
            </p>
            <div class="property-grid">
                <div class="property-card">
                    <img src="https://via.placeholder.com/300x200" alt="Property Image" />
                    <h3>Cozy Cottage</h3>
                    <p>$150/night</p>
                    <button class="btn view-details">View Details</button>
                </div>
                <div class="property-card">
                    <img src="https://via.placeholder.com/300x200" alt="Property Image" />
                    <h3>Modern Villa</h3>
                    <p>$250/night</p>
                    <button class="btn view-details">View Details</button>
                </div>
                <div class="property-card">
                    <img src="https://via.placeholder.com/300x200" alt="Property Image" />
                    <h3>Seaside Escape</h3>
                    <p>$180/night</p>
                    <button class="btn view-details">View Details</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 NaturesCottage. Crafted with ❤️ for your perfect vacation.</p>
        <div class="social-links">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date-range", {
            mode: "range",
            dateFormat: "Y-m-d",
            minDate: "today"
        });

        const signInButton = document.getElementById("signInButton");
        const signUpButton = document.getElementById("signUpButton");
        const authForm = document.getElementById("authForm");
        const overlay = document.getElementById("overlay");

        // Open Sign In Form
        signInButton.addEventListener("click", () => {
            openModal();
            document.getElementById("signInForm").style.display = "block";
            document.getElementById("signUpForm").style.display = "none";
        });

        // Open Sign Up Form
        signUpButton.addEventListener("click", () => {
            openModal();
            document.getElementById("signInForm").style.display = "none";
            document.getElementById("signUpForm").style.display = "block";
        });

        // Toggle Sign In / Sign Up Forms
        document.getElementById("signInToggle").addEventListener("click", () => {
            document.getElementById("signInForm").style.display = "block";
            document.getElementById("signUpForm").style.display = "none";
        });

        document.getElementById("signUpToggle").addEventListener("click", () => {
            document.getElementById("signInForm").style.display = "none";
            document.getElementById("signUpForm").style.display = "block";
        });

        // Function to Open Modal
        function openModal() {
            authForm.style.display = "block";
            overlay.style.display = "block";
            document.body.classList.add("modal-open"); // Lock scrolling
        }

        // Function to Close Modal
        function closeModal() {
            authForm.style.display = "none";
            overlay.style.display = "none";
            document.body.classList.remove("modal-open"); // Enable scrolling
        }

        // Close Modal When Clicking Outside
        overlay.addEventListener("click", closeModal);
    </script>
</body>
</html>
