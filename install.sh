#!/bin/bash

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${BLUE}╔════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║       Phoenix Theme Auto Installer      ║${NC}"
echo -e "${BLUE}║        © 2024 GusmanikCraft           ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"

# Check if running as root
if [ "$EUID" -ne 0 ]; then 
    echo -e "${RED}Error: Please run as root (sudo)${NC}"
    exit 1
fi

# Function to check command existence
check_command() {
    if ! command -v $1 &> /dev/null; then
        echo -e "${RED}Error: $1 is not installed${NC}"
        exit 1
    fi
}

# Check required commands
echo -e "\n${YELLOW}Checking requirements...${NC}"
check_command "git"
check_command "yarn"
check_command "php"

# Check Pterodactyl installation
PTERO_PATH="/var/www/pterodactyl"
if [ ! -d "$PTERO_PATH" ]; then
    echo -e "${RED}Error: Pterodactyl installation not found at $PTERO_PATH${NC}"
    exit 1
fi

# Backup existing theme
echo -e "\n${YELLOW}Creating backup...${NC}"
BACKUP_DATE=$(date +%Y%m%d_%H%M%S)
if [ -d "$PTERO_PATH/resources/views/themes" ]; then
    tar -czf "pterodactyl_themes_backup_$BACKUP_DATE.tar.gz" "$PTERO_PATH/resources/views/themes"
    echo -e "${GREEN}Backup created: pterodactyl_themes_backup_$BACKUP_DATE.tar.gz${NC}"
fi

# Create theme directories
echo -e "\n${YELLOW}Creating theme directories...${NC}"
mkdir -p $PTERO_PATH/resources/views/themes/phoenix/{components,admin,js,css}

# Download theme files
echo -e "\n${YELLOW}Downloading theme files...${NC}"
git clone https://github.com/GusmanikCraft/phoenix-theme.git /tmp/phoenix-theme
cp -r /tmp/phoenix-theme/* $PTERO_PATH/resources/views/themes/phoenix/
rm -rf /tmp/phoenix-theme

# Set permissions
echo -e "\n${YELLOW}Setting permissions...${NC}"
chown -R www-data:www-data $PTERO_PATH/resources/views/themes/phoenix
chmod -R 755 $PTERO_PATH/resources/views/themes/phoenix

# Install dependencies
echo -e "\n${YELLOW}Installing dependencies...${NC}"
cd $PTERO_PATH
yarn install
yarn build

# Update .env file
echo -e "\n${YELLOW}Updating configuration...${NC}"
if [ -f "$PTERO_PATH/.env" ]; then
    sed -i 's/APP_THEME=.*/APP_THEME=phoenix/' $PTERO_PATH/.env
    echo "APP_THEME_AUTHOR=GusmanikCraft" >> $PTERO_PATH/.env
else
    echo -e "${RED}Warning: .env file not found${NC}"
fi

# Clear cache
echo -e "\n${YELLOW}Clearing cache...${NC}"
php artisan view:clear
php artisan cache:clear
php artisan config:clear

# Create protection file
echo -e "\n${YELLOW}Setting up theme protection...${NC}"
cat > $PTERO_PATH/resources/views/themes/phoenix/.protection << EOL
THEME_NAME=Phoenix
THEME_AUTHOR=GusmanikCraft
THEME_VERSION=1.0.0
INSTALLATION_DATE=$(date)
SERVER_IP=$(hostname -I | awk '{print $1}')
LICENSE_KEY=$(openssl rand -hex 16)
EOL

echo -e "\n${GREEN}╔════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║       Installation Completed! 🎉        ║${NC}"
echo -e "${GREEN}╚════════════════════════════════════════╝${NC}"
echo -e "\n${BLUE}Theme Details:${NC}"
echo -e "  • Name: Phoenix Theme"
echo -e "  • Author: GusmanikCraft"
echo -e "  • Installation Path: $PTERO_PATH/resources/views/themes/phoenix"
echo -e "  • Backup File: pterodactyl_themes_backup_$BACKUP_DATE.tar.gz"
echo -e "\n${YELLOW}Next Steps:${NC}"
echo -e "1. Restart your web server: ${GREEN}systemctl restart nginx${NC} (or apache2)"
echo -e "2. Clear browser cache"
echo -e "3. Login to admin panel"
echo -e "\n${RED}Important:${NC}"
echo -e "• Keep your backup file safe"
echo -e "• Do not modify theme files"
echo -e "• Theme is protected by copyright"
echo -e "\n${BLUE}Support: https://github.com/GusmanikCraft/phoenix-theme/issues${NC}"
echo -e "${BLUE}© 2024 GusmanikCraft - All rights reserved${NC}\n" 