<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaturesCottage</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Remove default padding/margin */
        body, html {
            margin: 0;
            padding: 0;
        }

        /* Add some styling for the sign-in/signup box */
        #authForm {
            display: none;
            position: absolute;
            top: 60px; /* Ensure it stays just below the Sign In button */
            right: 10px;
            background-color: #f4f4f4;
            padding: 20px;
            width: 250px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1000; /* Ensure it's above the other content */
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .input-group i {
            margin-right: 10px;
        }

        .btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn.primary {
            background-color: #28a745;
        }

        .or {
            text-align: center;
            margin: 10px 0;
        }

        .icons i {
            margin: 5px;
            font-size: 20px;
        }

        .links {
            text-align: center;
        }

        /* Prevent any unwanted white space */
        body {
            padding-top: 0;
        }

        header {
            margin-bottom: 0;
        }

        .auth-buttons {
            position: relative;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Natures<span>Cottage</span></div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="listings.html">Browse properties</a></li>
                <li><a href="details.html">List your property</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <button class="btn" id="signInButton">Sign In</button>
                <button class="btn primary" id="signUpButton">Sign Up</button>
            </div>
        </nav>
    </header>

    <!-- The Sign In / Sign Up Form (hidden by default) -->
    <div id="authForm">
        <div id="signInForm">
            <h2>Sign In</h2>
            <form method="post" action="register.php">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <p class="recover">
                    <a href="#">Recover Password</a>
                </p>
                <input type="submit" class="btn" value="Sign In" name="signIn">
            </form>
            <p class="or">----------or--------</p>
            <div class="icons">
                <i class="fab fa-google"></i>
                <i class="fab fa-facebook"></i>
            </div>
            <p>Don't have an account yet?</p>
            <button id="signUpToggle">Sign Up</button>
        </div>

        <div id="signUpForm" style="display:none;">
            <h2>Sign Up</h2>
            <form method="post" action="register.php">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="fName" id="fName" placeholder="First Name" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <input type="submit" class="btn" value="Sign Up" name="signUp">
            </form>
            <p class="or">----------or--------</p>
            <div class="icons">
                <i class="fab fa-google"></i>
                <i class="fab fa-facebook"></i>
            </div>
            <p>Already have an account?</p>
            <button id="signInToggle">Sign In</button>
        </div>
    </div>

    <main>
        <section class="hero">
            <video class="background-video" autoplay muted loop>
                <source src="2 meginajums.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <div class="hero-content">
                <h1>Discover Your Dream Vacation</h1>
                <p>Explore unique properties and create unforgettable memories.</p>
                <form class="search-filters">
                    <input type="text" placeholder="Where are you going" required />
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

        signInButton.addEventListener("click", () => {
            authForm.style.display = "block";
            document.getElementById("signInForm").style.display = "block";
            document.getElementById("signUpForm").style.display = "none";
        });

        signUpButton.addEventListener("click", () => {
            authForm.style.display = "block";
            document.getElementById("signInForm").style.display = "none";
            document.getElementById("signUpForm").style.display = "block";
        });

        document.getElementById("signInToggle").addEventListener("click", () => {
            document.getElementById("signInForm").style.display = "block";
            document.getElementById("signUpForm").style.display = "none";
        });

        document.getElementById("signUpToggle").addEventListener("click", () => {
            document.getElementById("signInForm").style.display = "none";
            document.getElementById("signUpForm").style.display = "block";
        });
    </script>
</body>
</html>
