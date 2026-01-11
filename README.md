<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20Logo%20Vertical/1%20Logo%20Vertical%20Black.svg" width="120" alt="B-Thrift Logo">
</p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel Version"></a>
<a href="#"><img src="https://img.shields.io/badge/Course-INFO%202305-blue?style=for-the-badge" alt="Course"></a>
<a href="#"><img src="https://img.shields.io/badge/Mahallah-Bilal-A27B5E?style=for-the-badge" alt="Location"></a>
</p>

## About B-Thrift

B-Thrift is a web-based thrift store application developed for the students of **International Islamic University Malaysia (IIUM)**, specifically focusing on **Mahallah Bilal** residents. The platform provides a dedicated marketplace where students can buy and sell pre-loved items such as clothing, books, and daily necessities.

Following the philosophy that *"One man's garbage is another man's treasure,"* B-Thrift promotes a circular economy, sustainability, and affordability within the campus community.

## Project Objectives

- **Primary Goal**: Create a functional and secure thrift platform for Mahallah Bilal residents.
- **Sustainability**: Encourage the reuse of items to reduce environmental waste.
- **Community Support**: Help students save money by providing affordable second-hand alternatives.
- **Technical Growth**: Implement a robust Web Application using Laravel's MVC architecture and CRUD operations.

## Features and Functionalities

### 👤 Student Features
- **Secure Authentication**: Registration and Login restricted to the student community.
- **Item Browsing**: View available thrift items with high-quality images and descriptions.
- **Seller Dashboard**: Full CRUD capabilities—users can create, edit, and delete their own listings.
- **Contact Integration**: Direct WhatsApp/Contact links to facilitate easy meet-ups at Mahallah Bilal.

### ⚙️ System Features
- **MVC Architecture**: Clean separation of logic using Models, Views, and Controllers.
- **Image Uploads**: Integration with local storage for product photography.
- **Form Validation**: Secure data entry to prevent errors and invalid listings.

## Group Information (Section 3)

We are a team of four students dedicated to building a better thrifting experience for our Mahallah:

| Name | Matric No | Role |
| :--- | :--- | :--- |
| **ARSHAD SULAIMAN BIN AZLI** | 2313957 | Project Lead / Backend |
| **ANANG PUTERA BIN SELAMAT** | 2310711 | Database / Logic |
| **AMIR AZFAR BIN MUSTAFA KAMAL** | 2315719 | UI/UX Designer |
| **ASHRAF FAQIHI BIN AHMAD FAKHRUDIN** | 2314689 | Documentation / QA |

## Technical Implementation

### Database Design (ERD)
The system is built on a relational database managed via MySQL, ensuring data integrity between users and their listings.



**Key Tables:**
- `users`: Manages student accounts and authentication.
- `products`: Stores item details (name, price, category, image).
- `sessions`: Handles secure user login states.

### Core Laravel Components
- **Routes**: Clean, SEO-friendly URLs using `web.php`.
- **Controllers**: Logic handling via `ProductController`, `AuthController`, and `ContactController`.
- **Blade Templates**: Responsive UI built with Bootstrap and Laravel Blade.

## Installation and Setup

1. **Clone the project**
   ```bash
   git clone [https://github.com/your-username/B-Thrift.git](https://github.com/your-username/B-Thrift.git)
