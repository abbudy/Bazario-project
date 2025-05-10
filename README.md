# Bazario E-commerce Platform

A modern e-commerce platform built with HTML, CSS, JavaScript for the frontend and PHP for the backend.

## Project Structure

```
Bazario-project/
├── backend/
│   ├── cart.php
│   ├── checkout.php
│   ├── db.php
│   ├── get-products.php
│   ├── index.php 
│   ├── login.php
│   ├── logout.php
│   ├── order.php
│   ├── order_success.php
│   ├── place_orde.php
│   ├── register.php
│   └── user.php
├── includes/
│   ├── index.html
│   ├── login.html
│   ├── register.html
│   ├── script.js
│   └── style.css 
└── README.md
```

## Technologies Used

### Frontend
- HTML5
- CSS3
- JavaScript (ES6+)
- Font Awesome for icons
- Responsive design principles

### Backend
- PHP 8.0+
- MySQL Database
- Composer for dependency management

## Features

- User Authentication (Login/Register)
- Product Browsing and Search
- Shopping Cart Management
- Secure Checkout Process
- Order Management
- Responsive Design
- Payment Integration

## Setup Instructions

1. **Prerequisites**
   - PHP 8.0 or higher
   - MySQL 5.7 or higher
   - Web server (Apache/Nginx)
   - Composer

2. **Installation**
   ```bash
   # Clone the repository
   git clone https://github.com/abbudy/Bazario-project.git

   # Navigate to project directory
   cd Bazario-project

   # Install dependencies
   composer install

   # Create database
   mysql -u root -p < setup.sql

   # Configure database connection
   # Edit includes/config.php with your database credentials
   ```

3. **Configuration**
   - Copy `includes/config.example.php` to `includes/config.php`
   - Update database credentials in `config.php`
   - Configure your web server to point to the project directory

4. **Running the Application**
   - Start your web server
   - Access the application through your web browser
   - Default URL: `http://localhost/Bazario-project`


## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

