/**
 * Phoenix Theme for Pterodactyl
 * Copyright (c) 2024 GusmanikCraft
 * All rights reserved.
 * 
 * This source code is protected and cannot be reproduced or distributed
 * without explicit permission from GusmanikCraft.
 */

class PhoenixTheme {
    constructor() {
        this.copyright = '© 2024 GusmanikCraft';
        this.version = '1.0.0';
        this.checkCopyright();
        this.initializeTheme();
    }

    checkCopyright() {
        const signature = btoa(this.copyright);
        if (window.phoenixSignature !== signature) {
            this.protect();
        }
    }

    protect() {
        // Anti-tampering protection
        const styles = document.querySelectorAll('link[rel="stylesheet"]');
        styles.forEach(style => {
            if (style.href.includes('phoenix')) {
                const originalHref = style.href;
                Object.defineProperty(style, 'href', {
                    get: () => originalHref,
                    set: () => {
                        console.error('Modification attempted');
                        return originalHref;
                    }
                });
            }
        });
    }

    initializeTheme() {
        // Theme initialization
        this.setupNavigation();
        this.setupAutoExpiry();
        this.setupResourceMonitoring();
    }

    setupNavigation() {
        const nav = document.querySelector('.navigation-wrapper');
        if (nav) {
            nav.addEventListener('click', (e) => {
                const menuItem = e.target.closest('.menu-item');
                if (menuItem) {
                    this.handleMenuClick(menuItem);
                }
            });
        }
    }

    setupAutoExpiry() {
        // Auto expiry system
        const expiryCheck = setInterval(() => {
            fetch('/api/client/servers/expiry', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => this.handleExpiryData(data))
            .catch(error => console.error('Error:', error));
        }, 3600000); // Check every hour
    }

    setupResourceMonitoring() {
        // Resource monitoring system
        this.monitorResources();
    }

    handleMenuClick(menuItem) {
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => item.classList.remove('active'));
        menuItem.classList.add('active');
    }

    handleExpiryData(data) {
        if (data.expiring) {
            this.showExpiryNotification(data);
        }
    }

    monitorResources() {
        setInterval(() => {
            this.updateResourceUsage();
        }, 10000); // Update every 10 seconds
    }

    updateResourceUsage() {
        fetch('/api/client/servers/resources', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => this.updateResourceUI(data))
        .catch(error => console.error('Error:', error));
    }

    updateResourceUI(data) {
        // Update UI with resource usage data
        const elements = {
            cpu: document.querySelector('.resource-cpu'),
            memory: document.querySelector('.resource-memory'),
            disk: document.querySelector('.resource-disk')
        };

        if (elements.cpu) elements.cpu.textContent = `${data.cpu}%`;
        if (elements.memory) elements.memory.textContent = `${data.memory}MB`;
        if (elements.disk) elements.disk.textContent = `${data.disk}MB`;
    }

    showExpiryNotification(data) {
        const notification = document.createElement('div');
        notification.className = 'phoenix-notification';
        notification.innerHTML = `
            <div class="notification-content">
                <h4>Server Expiry Warning</h4>
                <p>Your server will expire in ${data.daysRemaining} days.</p>
                <button onclick="this.parentElement.remove()">Dismiss</button>
            </div>
        `;
        document.body.appendChild(notification);
    }
}

// Initialize theme with copyright protection
window.phoenixSignature = btoa('© 2024 GusmanikCraft');
window.PhoenixTheme = new PhoenixTheme(); 