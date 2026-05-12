<p align="center">
  <h1 align="center">Health Meals 🍽️</h1>
  <p align="center">A modern Laravel web application for healthy meal ordering and restaurant management.</p>
</p>

## ✨ Project Overview

**Health Meals** is a full-featured web platform that connects customers with healthy meal options from multiple restaurants. It includes a clean customer interface and a powerful dashboard for restaurant owners and admins.

This project was built as part of my **Laravel Portfolio** to demonstrate clean code, modern development practices, and full-stack capabilities.

## 🚀 Features

### Customer Side
- Browse healthy meals and restaurants
- View detailed meal information (calories, ingredients, nutrition)
- Responsive and modern design
- Restaurant filtering and search

### Restaurant / Admin Dashboard
- Manage products/meals
- View orders and statistics
- Dashboard analytics
- Multi-role system (Customer, Restaurant, Admin)

## 🛠 Tech Stack

- **Backend**: Laravel 11 + PHP 8.2
- **Frontend**: Tailwind CSS + Blade Templates
- **Database**: MySQL
- **Asset Build**: Vite
- **Authentication**: Laravel Auth

## 📸 Screenshots

*(You will add screenshots here later)*

## 🚀 How to Run Locally

```bash
# 1. Clone the repository
git clone https://github.com/Ameer-Hamza-prog/health-meals.git
cd health-meals

# 2. Install PHP dependencies
composer install

# 3. Install Node.js dependencies
npm install

# 4. Setup environment file
copy .env.example .env
php artisan key:generate

# 5. Run database migrations
php artisan migrate --seed

# 6. Build assets
npm run dev

# 7. Start the server
php artisan serve
