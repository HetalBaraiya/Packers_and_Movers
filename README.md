# 🚚 Packers & Movers – Hassle-Free Relocation Platform

A clean and responsive web application that connects users with professional moving service providers. Users can browse available services, book a preferred packer and mover, and input detailed move requirements. Built using **HTML, CSS, JavaScript, PHP**, and **MySQL**.

---

## 🔍 Features

🗺️ Browse and select from multiple packers & movers  
📅 Book relocation services with move details  
📤 Submit pickup & destination addresses  
📦 Add info about goods to be moved  
📊 Admin panel for managing service bookings  
📱 Fully responsive design  
❌ Error handling for invalid or incomplete submissions  

---
## 💻 Tech Stack

- HTML5  
- CSS3  
- JavaScript (ES6+)  
- PHP  
- MySQL  

---

### 🚀 Getting Started
Follow these steps to run the app locally:

### 1. Clone the repository
git clone https://github.com/HetalBaraiya/Packers_and_Movers.git  
cd Packers_and_Movers

### 2. Set up the database
Open phpMyAdmin
Import the provided SQL file (packers.sql) to create the necessary tables

### 3. Configure the connection
Open connection.php
Add your local MySQL database username and password

$conn = mysqli_connect("localhost", "your_username", "your_password", "packers_db");

### 4. Run the App
Start Apache and MySQL using XAMPP or a similar

Open your browser and go to:
http://localhost/Packers_and_Movers/index.php


📁 Project Structure

Packers_and_Movers/  
├── admin/                # Admin panel files  
├── booking.php          # Booking form for users  
├── connection.php       # Database connection  
├── index.php            # Homepage  
├── style.css            # Styling file  
├── packers.sql          # SQL file to create DB schema  
└── README.md            # Project info

🙋‍♀️ Author: Hetal Baraiya
📧 Email: hetaldbaraiya@gmail.com

