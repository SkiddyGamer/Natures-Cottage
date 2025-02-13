<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Your Property - Luxury Getaways</title>
    <link rel="stylesheet" href="styles.css" />
	 <?php include 'Header.php'; ?>
	 <?php include 'login_form.php'; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        main {
            width: 40%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        textarea {
            resize: none;
            overflow-y: hidden;
            min-height: 100px;
            max-height: 300px;
            width: calc(100% - 16px);
            box-sizing: border-box;
        }
        .form-group {
            display: flex;
            gap: 10px;
        }
        .form-group input {
            flex: 1;
        }
        form input, form textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
   
    <main>
        <h1>Tell us about yourself!</h1>
        <form action="submit_listing.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>
            
            <div class="form-group">
                <input type="tel" id="phone" name="phone" placeholder="Phone" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            
            <input type="text" id="street_address" name="street_address" placeholder="Property Street Address" required>
            
            <div class="form-group">
                <input type="text" id="city" name="city" placeholder="City" required>
                <input type="text" id="postal_code" name="postal_code" placeholder="Postal Code" required>
            </div>
            <h2>Tell us about your property</h2>
            <input type="text" id="property_name" name="property_name" placeholder="Property Name" required>
            <input type="text" id="location" name="location" placeholder="Location" required>
            <input type="number" id="price" name="price" placeholder="Price per Night ($)" required>
            
            <textarea id="description" name="Short description" rows="4" placeholder="Short description" required oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'"></textarea>
            
            <label for="image">Upload Images:</label>
            <input type="file" id="image" name="image[]" accept="image/*" multiple required>
            
            <button type="submit">Submit Listing</button>
        </form>
    </main>
</body>
</html>
