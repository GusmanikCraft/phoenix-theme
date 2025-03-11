# 🔥 Phoenix Theme by GusmanikCraft

A premium and modern theme for Pterodactyl Panel, bringing a fresh new look to your game hosting environment.

![Phoenix Theme Banner](https://raw.githubusercontent.com/GusmanikCraft/phoenix-theme/main/preview.png)

## ✨ Features

- 🎨 Premium Modern UI Design
- 🌙 Smart Dark Mode
- 📱 Fully Responsive Layout
- ⚡ Resource Monitoring
- 🔐 Menu Access Control
- 🛡️ Auto Expiry System
- ⚙️ Admin Control Panel
- 🌐 Full English Interface
- 🚀 One-Click Installation
- 🔒 Secure Implementation

## 🚀 Quick Install

```bash
# Download installer
curl -Lo install.sh https://raw.githubusercontent.com/GusmanikCraft/phoenix-theme/main/install.sh

# Make it executable
chmod +x install.sh

# Run installer
sudo ./install.sh
```

## 📋 Requirements

- Pterodactyl Panel
- PHP 8.0+
- curl
- unzip

## 🛠️ Manual Installation

1. Go to your panel directory:
```bash
cd /workspaces/paenl/pterodactyl/panel
```

2. Clone the theme:
```bash
git clone https://github.com/GusmanikCraft/phoenix-theme.git resources/views/themes/phoenix
```

3. Set permissions:
```bash
chmod -R 755 resources/views/themes/phoenix
chown -R www-data:www-data resources/views/themes/phoenix
```

4. Edit `.env` file and add:
```env
APP_THEME=phoenix
APP_THEME_AUTHOR=GusmanikCraft
```

5. Clear cache:
```bash
php artisan view:clear
php artisan cache:clear
php artisan config:clear
```

6. Restart your webserver

## 🖼️ Screenshots

[Screenshots will be added soon]

## ⚙️ Configuration

The theme automatically integrates with your Pterodactyl installation. Additional configuration options available in the admin panel!

## 🤝 Support & Community

- [Report Issues](https://github.com/GusmanikCraft/phoenix-theme/issues)
- [Discord Server](https://discord.gg/gusmanikcraft)
- [Documentation](https://github.com/GusmanikCraft/phoenix-theme/wiki)

## 📜 License & Copyright

© 2024 GusmanikCraft. All Rights Reserved.

This theme is protected by copyright law. Unauthorized copying, modification, distribution, or use is strictly prohibited. The theme is licensed exclusively for use on a single Pterodactyl Panel installation per purchase.

## 🙏 Credits

Developed with ❤️ by [GusmanikCraft](https://github.com/GusmanikCraft)

# Pterodactyl Indonesian Theme

Tema kustom untuk panel Pterodactyl dengan tampilan modern dan terjemahan Bahasa Indonesia.

## Fitur / Features

- 🇮🇩 Terjemahan Bahasa Indonesia lengkap
- 🎨 Desain modern dan responsif
- 📱 Tampilan mobile-friendly
- 🌙 Mode gelap yang elegan
- ⚡ Performa optimal
- 🎮 Dukungan khusus untuk Minecraft

## Instalasi / Installation

### Bahasa Indonesia

1. Unduh tema ini ke folder pterodactyl themes:
```bash
cd /var/www/pterodactyl
git clone https://github.com/yourusername/pterodactyl-indo-theme.git resources/themes/pterodactyl-indo
```

2. Install dependensi yang diperlukan:
```bash
yarn install
```

3. Build tema:
```bash
yarn build:production
```

4. Bersihkan cache:
```bash
php artisan view:clear
php artisan cache:clear
```

### English

1. Download this theme to pterodactyl themes folder:
```bash
cd /var/www/pterodactyl
git clone https://github.com/yourusername/pterodactyl-indo-theme.git resources/themes/pterodactyl-indo
```

2. Install required dependencies:
```bash
yarn install
```

3. Build the theme:
```bash
yarn build:production
```

4. Clear cache:
```bash
php artisan view:clear
php artisan cache:clear
```

## Kustomisasi / Customization

### Mengubah Warna / Change Colors

Edit file `resources/styles/theme.scss` untuk mengubah warna tema:

```scss
$primary-color: #7289DA;    // Warna utama / Primary color
$secondary-color: #2C2F33;  // Warna sekunder / Secondary color
$accent-color: #99AAB5;     // Warna aksen / Accent color
$background-color: #23272A; // Warna latar / Background color
```

### Mengubah Font / Change Font

Edit bagian font-family di `resources/styles/theme.scss`:

```scss
body {
    font-family: 'Your Font', sans-serif;
}
```

## Lisensi / License

MIT License

## Dukungan / Support

Jika Anda memerlukan bantuan atau menemukan masalah, silakan buat issue di repository ini.

If you need help or found any issues, please create an issue in this repository.

# Phoenix Theme for Pterodactyl Panel
By GusmanikCraft © 2024

## Quick Installation

```bash
# Go to your pterodactyl panel directory
cd /var/www/pterodactyl

# Clone the theme
git clone https://github.com/GusmanikCraft/phoenix-theme.git resources/views/themes/phoenix

# Install dependencies
yarn install
yarn build

# Clear cache
php artisan view:clear
php artisan cache:clear
```

## Features
- Modern UI Design
- Auto Expiry System
- Resource Monitoring
- Admin Control Panel
- Menu Access Control
- Full English Interface

## Copyright Notice
© 2024 GusmanikCraft. All rights reserved.
This theme is protected by copyright law. Unauthorized reproduction or distribution is strictly prohibited. 
