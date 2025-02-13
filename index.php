<?php session_start(); ?>

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
    <?php include 'Header.php'; ?>
    
    <?php include 'login_form.php'; ?>

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

        
    </script>
</body>
</html>
