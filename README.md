# Manga Reader

Manga Reader is a Laravel project that serves as an online manga reading platform. It includes a fresh database migration and seeding for quick setup. Additionally, it utilizes storage linking to ensure proper file handling.

## Getting Started

### Prerequisites

Before you begin, make sure you have the following installed:

- PHP
- Composer
- Laravel

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/PhyoZayHtike/Manga-Reader.git

   cd Manga-Reader

   cp .env.example .env

   php artisan migrate --seed

   php artisan storage:link


