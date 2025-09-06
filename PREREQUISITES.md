# Prerequisites

## Overview

This Laravel LAMP stack project uses **Docker containerization** and **VS Code Dev Containers** for development. Most dependencies (PHP, Laravel, MariaDB, etc.) run inside containers, so you don't need to install them locally.

## Required Software

### Docker Desktop (Required)

- **Windows**: [Download Docker Desktop for Windows](https://desktop.docker.com/win/main/amd64/Docker%20Desktop%20Installer.exe)
- **macOS**: [Download Docker Desktop for Mac](https://desktop.docker.com/mac/main/amd64/Docker.dmg)
- **Linux**: Install via package manager or [download .deb/.rpm](https://docs.docker.com/desktop/install/linux-install/)

**Platform Notes:**

- **Windows**: Requires WSL2 (Windows Subsystem for Linux)
- **macOS**: Works on both Intel and Apple Silicon
- **Linux**: Native Docker support

### Git (Required)

- **Windows**: Install from [git-scm.com](https://git-scm.com/download/win) or via Chocolatey
- **macOS**: `brew install git` or Xcode Command Line Tools
- **Linux**: `sudo apt install git` (Ubuntu/Debian) or `sudo dnf install git` (Fedora/RHEL)

## Recommended Development Environment

### VS Code (Recommended)

While not strictly required, VS Code provides the best experience with this project.

**Download:**

- **All Platforms**: [Visual Studio Code](https://code.visualstudio.com/)

### Essential VS Code Extensions

#### Required for This Project

- **Dev Containers** - Containerized development
  - ID: `ms-vscode-remote.remote-containers`
  - Enables the containerized development environment

#### Recommended Extensions

- **PHP IntelliSense** - PHP language support
  - ID: `bmewburn.vscode-intelephense-client`
- **Laravel Blade Snippets** - Blade template support
  - ID: `onecentlin.laravel-blade`
- **Tailwind CSS IntelliSense** - CSS framework support
  - ID: `bradlc.vscode-tailwindcss`
- **Docker** - Docker file/container management
  - ID: `ms-azuretools.vscode-docker`

## Alternative Development Environments

### Without VS Code

You can use this project without VS Code by running Docker Compose directly:

```bash
# Clone the repository
git clone <your-repo-url>
cd my-stack-lamp

# Start the containers
docker-compose up -d

# Access via browser
# Laravel: http://localhost
# phpMyAdmin: http://localhost:8080
```

### Other Editors/IDEs

- **PHPStorm** - Full PHP IDE with Docker support
- **Sublime Text** - Lightweight editor
- **Vim/Neovim** - Terminal-based editing
- **Cursor** - AI-powered code editor

## What You DON'T Need to Install

### No Local PHP Installation

- PHP 8.3 runs inside the container
- No need to install PHP, Composer, or Laravel locally
- All PHP dependencies are managed in the container

### No Local Database

- MariaDB runs in a container
- phpMyAdmin provides web-based database management
- No need for local MySQL/MariaDB installation

### No Local Node.js (Optional)

- Node.js runs in the container for Vite/TailwindCSS
- Can be installed locally if preferred for frontend development

## System Requirements

### Minimum Hardware

- **RAM**: 4GB (8GB recommended)
- **Storage**: 5GB free space
- **CPU**: 2 cores (4+ recommended)

### Operating System Versions

- **Windows**: 10/11 with WSL2
- **macOS**: 10.15+ (Catalina or newer)
- **Linux**: Ubuntu 18.04+, CentOS 7+, or equivalent

## Network Requirements

### Required Ports

Ensure these ports are available on your system:

- **80** - Laravel web application
- **3306** - MariaDB database
- **8080** - phpMyAdmin

### Firewall

- Allow Docker Desktop through firewall
- Allow container network communication

## Verification Steps

### Check Docker Installation

```bash
# Verify Docker is running
docker --version
docker-compose --version

# Test Docker functionality
docker run hello-world
```

### Check VS Code Setup (if using)

1. Open VS Code
2. Check installed extensions
3. Verify Dev Containers extension is active

## Troubleshooting Prerequisites

### Docker Issues

- **Windows**: Ensure WSL2 is enabled and Docker Desktop is running
- **macOS**: Check Docker Desktop is started and has permissions
- **Linux**: Ensure Docker service is running: `sudo systemctl start docker`

### VS Code Issues

- **Extensions not loading**: Restart VS Code
- **Dev Containers not working**: Check Docker is running first

### Port Conflicts

```bash
# Check what's using ports
netstat -an | grep :80
netstat -an | grep :3306
netstat -an | grep :8080
```

## Getting Started

Once prerequisites are installed:

1. **Clone the repository**
2. **Open in VS Code** (or start Docker manually)
3. **Wait for container setup** (~2-3 minutes first time)
4. **Run `composer run dev`**
5. **Access at <http://localhost>**

**Ready to develop!** 🚀
