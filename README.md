# Titan Gym Management System

A premium, role-based gym management platform featuring glassmorphism UI, real-time statistics, and seamless member interactions.

## Features

- **Dynamic Landing Page**: High-end "Cyber-Premium" aesthetic with real-time stats.
- **Role-Based Access**: Specialized portals for Admins, Staff, and Members.
- **Member Dashboard**: Personalized progress tracking and session bookings.
- **Class Scheduling**: Interactive weekly schedule with one-click booking for members.
- **Membership Management**: Automated provisioning and expiry tracking.

## Technology Stack

- **Framework**: Laravel 11
- **Styling**: Tailwind CSS & Custom Vanilla CSS (Premium Glassmorphism)
- **Database**: MySQL / SQLite
- **Frontend**: Blade Templating

## Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/hasanarofid/system-gym.git
   cd system-gym
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Setup environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Database migration & seeding:
   ```bash
   php artisan migrate:fresh --seed
   ```

5. Run the development server:
   ```bash
   php artisan serve
   npm run dev
   ```

## Developer Contacts

- **Email**: [hasanarofid@gmail.com](mailto:hasanarofid@gmail.com)
- **Website**: [hasanarofid.site](https://hasanarofid.site)

## License

The Titan Gym System is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# system-gym
