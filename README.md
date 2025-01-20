# 🚗 De Auto Management System

Een Laravel-based CRUD applicatie voor het beheren van gebruikers en hun auto's. Gebouwd met Laravel 10, MySQL, en TailwindCSS.

## 📋 Features

-   👥 Gebruikersbeheer (CRUD)
-   🚙 Autobeheer (CRUD)
-   🔍 Real-time Zoeken
-   📊 Admin Dashboard met Statistieken
-   📱 Responsive Design met TailwindCSS
-   🔐 Authenticatie Systeem
-   📄 Paginering
-   🔗 Gebruiker-Auto Relatiebeheer

## 🔧 Vereisten

-   PHP >= 8.1
-   Composer
-   Node.js & NPM
-   MySQL >= 5.7
-   Git

## 💻 Installatie Handleiding

### Stap 1: Omgeving Opzetten

#### PHP Installeren (Windows)

1. Download XAMPP van [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Voer de installer uit en selecteer PHP en MySQL componenten
3. Voeg PHP toe aan je systeem PATH omgevingsvariabele

#### PHP Installeren (macOS)

bash
```
brew install php
brew install mysql
```

#### Composer Installeren

1. Download Composer van [https://getcomposer.org/download/](https://getcomposer.org/download/)
2. Volg de installatie-instructies voor jouw besturingssysteem

#### Node.js & NPM Installeren

1. Download van [https://nodejs.org/](https://nodejs.org/)
2. Kies de LTS versie
3. Volg de installatiewizard

### Stap 2: Project Setup

1. Clone de repository

bash
```
git clone https://github.com/fadialset/de-auto.git
cd de-auto
```

2. Installeer PHP dependencies
   bash
   ```
   composer install
   ```

4. Installeer Node.js dependencies
   bash
   ```
   npm install
   ```

5. Maak environment bestand aan
   bash
   ```
   cp .env.example .env
   ```

6. Genereer applicatie sleutel

bash
```
php artisan key:generate
```

### Stap 3: Database Setup

1. Maak een nieuwe MySQL database aan

bash
```
mysql -u root -p
CREATE DATABASE de_auto;
exit;
```
2. Update .env bestand met je database gegevens

env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=de_auto
DB_USERNAME=jouw_username
DB_PASSWORD=jouw_password
```

3. Voer migraties en seeders uit

### Stap 4: Storage Setup

1. Maak storage link aan

bash
```
php artisan storage:link
```

2. Zet juiste permissies (Unix systemen)

bash
```
chmod -R 775 storage bootstrap/cache
```

### Stap 5: Applicatie Starten

1. Start de development server

bash
```
php artisan serve
```

2. Compileer assets

bash
```
npm run dev
```

3. Bezoek [http://localhost:8000](http://localhost:8000) in je browser

## 👤 Standaard Gebruikers

Na het seeden kun je inloggen met deze gegevens:

**Admin Gebruiker:**

-   Email: admin@example.com
-   Wachtwoord: password

**Normale Gebruiker:**

-   Email: user@example.com
-   Wachtwoord: password

## 🚀 Gebruik

1. **Inloggen/Registreren**

    - Gebruik de standaard gegevens of registreer een nieuw account

2. **Gebruiker Dashboard**

    - Bekijk je auto's
    - Voeg nieuwe auto's toe
    - Bewerk/Verwijder je auto's

3. **Admin Dashboard**
    - Bekijk alle gebruikers en auto's
    - Zoek gebruikers en auto's
    - Beheer gebruikersaccounts
    - Bekijk systeemstatistieken

## 📁 Project Structuur
```
de-auto/
├── app/
│   ├── Http/Controllers/   # Controllers
│   ├── Models/             # Eloquent Models
│   └── Livewire/           # Livewire Components
├── database/
│   ├── migrations/         # Database Migraties
│   └── seeders/            # Database Seeders
├── resources/
│   ├── views/              # Blade Templates
│   └── css/                # Stylesheets
├── routes/
│   └── web.php             # Web Routes
├── public/                 # Publieke bestanden
├── storage/                # Uploads & Caches
├── tests/                  # Test bestanden
├── vendor/                 # Dependencies
├── .env.example            # Voorbeeld environment bestand
├── composer.json           # PHP Dependencies
└── package.json            # NPM Dependencies
```

## 🔒 Beveiliging

Onthoud:

1. Commit nooit het `.env` bestand
2. Houd je dependencies up-to-date
3. Gebruik sterke wachtwoorden
4. Zet de juiste bestandsrechten
