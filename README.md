# 📱 PhoneHub — Premium Mobile & Electronics Store

[![Laravel Version](https://img.shields.io/badge/Laravel-v10.x-red.svg?style=flat-square&logo=laravel)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind--CSS-v3.x-38bdf8.svg?style=flat-square&logo=tailwind-css)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-v3.x-77c1d2.svg?style=flat-square&logo=alpine.js)](https://alpinejs.dev)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://opensource.org/licenses/MIT)

PhoneHub is a high-performance, mobile-first responsive e-commerce web application inspired by Flipkart's shopping experience combined with the premium design aesthetics of Apple and Stripe. It features a curated Navy and Gold theme (`#14213D` and `#FCA311`), clean grid structures, and live dynamic interfaces.

---

## ✨ Key Product Features

### 🛒 Customer Storefront
* **Dynamic Auto-sliding Banners**: Automatic carousel cycle showcasing active discounts and promotion campaigns.
* **Smart Live Autocomplete Search**: Direct dropdown suggestions matching database models and brands with a high z-index overlay.
* **Premium Navigation**: App-style floating bottom navigation bar tailored for handheld mobile devices.
* **Persistent Wishlist**: Quick add-to-favorites with optimized database joins preventing product clashes.
* **Single-Click "Buy Now" flow**: Directly add items to the cart and redirect to checkout instantly for optimal conversion.
* **Stripe-style Checkout**: Beautiful glassmorphic dark billing page with live price calculators.

### 💼 Administrative Management Dashboard
* **Sales & Metrics Overview**: Quick indicators tracking users, orders, and total revenue.
* **Product Catalog Controls**: Complete database CRUD actions for adding, editing, and deleting inventory items.
* **Category Filters**: Set category structures that filter storefront displays dynamically.
* **PDF Sales Reporting**: Export order receipts and list directory reports directly using high-performance PDF rendering.

---

## 🛠️ Technology Stack
* **Backend**: Laravel Framework (PHP)
* **Frontend**: Tailwind CSS (v3.x), Alpine.js, Blade Templates
* **Real-time**: WebSockets integration (Socket.io & Node.js)
* **Database**: MySQL/MariaDB (configured via XAMPP)

---

## ⚙️ Installation & Setup Guide

Follow these steps to deploy and run PhoneHub locally:

### 1. Clone the Repository
```bash
git clone https://github.com/krushil-khunt/E-com.git
cd E-com
```

### 2. Install Dependencies
Install composer dependencies for PHP and npm dependencies for assets compiling:
```bash
composer install
npm install
```

### 3. Environment Configuration
Duplicate the example environment file and configure your database parameters:
```bash
cp .env.example .env
php artisan key:generate
```

Open `.env` and set your database connection details (default XAMPP configuration):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=loginpage
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Migrations & Seeding
Migrate the schemas and seed the dummy users and premium product catalogs (including iPhone 15 Pro, Samsung S24, OnePlus 12, etc.):
```bash
php artisan migrate:fresh --seed
```

### 5. Run the Servers
Compile asset files, launch the local artisan server, and start the broadcast server:
```bash
# Compile development assets
npm run dev

# Start Laravel Dev Server (runs at http://127.0.0.1:8000)
php artisan serve
```

---

## 📸 Design Standards
* **Primary (Navy)**: `#14213D` (Premium structure)
* **Accent (Gold)**: `#FCA311` (High-conversion actions, notifications, highlights)
* **Body Font**: Inter (Clean reading)
* **Header Font**: Outfit (Premium, strong startup brand)
