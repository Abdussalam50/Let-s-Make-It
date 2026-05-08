# Let's Make It - Weightlifting & Fitness App

A web-based weightlifting management application designed to help users manage their training programs based on their skill levels and personal goals. This project focuses on personalizing the user experience through a quiz system and progress tracking.

## 🚀 Key Features

- **Quiz-Based Personalization**: A dynamic quiz system to determine the user's fitness level (Beginner, Intermediate, Advanced).
- **Training Program Management**: Workout programs tailored to location (Gym or Home) and training split (Fullbody, Push/Pull/Leg, etc.).
- **Progress Tracking (Workout History)**: A dashboard to view statistics and history of completed workout sessions.
- **Education & Tips**: An article module providing education on training techniques and nutrition.
- **Admin Panel**: Centralized management for workout data, users, quizzes, and articles.
- **Video Tutorials**: Integration of video links to help users understand correct exercise forms.

## 🛠️ Tech Stack

- **Backend**: Native PHP
- **Database**: MySQL (Relational Database Management System)
- **Frontend**: 
  - HTML5 & Semantic Tags
  - CSS3 (Bootstrap Framework for Responsive Layouting)
  - JavaScript (Vanilla JS & SweetAlert2 for UI Interaction)
- **Tools**: NPM (for frontend library management)

## 📋 Admin Modules

The administration system is designed modularly for easy data management:
- **User Management**: Full control over user profiles and accounts.
- **Content Management**: Managing articles, tips, and tutorial video links.
- **Workout Configurator**: Settings for exercise types, categories, and movement details.
- **Quiz System**: Management of question banks and quiz scoring weights.
- **Monitoring**: Real-time tracking of user workout history and quiz results.

## ⚙️ Installation & Usage

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Abdussalam50/Let-s-Make-It.git
   ```
2. **Database Setup**:
   - Import the `databases_2025_alfathra_olahraga_beban.sql` file into MySQL (via phpMyAdmin or CLI).
3. **Connection Configuration**:
   - Update the database credentials in the configuration file (typically in `home/include/koneksi.php` or similar).
4. **Run the Server**:
   - Place the project folder in the `htdocs` (XAMPP) or `www` (Laragon) directory.
   - Access via browser: `http://localhost/2025-fathra-lets-make-it`

## 💡 Technical Highlights

- **Basic Security**: Implementation of data encryption in several parts of the application using OpenSSL/Base64.
- **Scoring Algorithm**: The quiz system uses weighted scores (bobot_a, b, c, d) to provide accurate program recommendations.
- **Interactivity**: Use of SweetAlert2 to provide premium feedback for user actions such as quiz submission or logout confirmation.

## 🛠️ Future Roadmap

Planned enhancements for this project include:
- **Refactoring to PDO/MySQLi**: Improving database security with prepared statements.
- **Modern Authentication System**: Implementation of more secure JWT or session management.
- **Progress Charts**: Data visualization of workout history using Chart.js.
- **PWA (Progressive Web App)**: Allowing the app to be installed on mobile devices for faster access.

---
*This project was developed while working at PT Ridikc Industries Indonesia.*
