# Troubleshooting Guide - Dev Container Issues

## Container Fails to Start

If you see the error "container is not running" or the dev container fails to start:

### 1. Check Docker Desktop

-   Ensure Docker Desktop is running and functioning
-   Check that you have enough disk space and memory
-   Try restarting Docker Desktop

### 2. Clean Up Previous Containers

```bash
# In a regular terminal (not VS Code), run:
docker system prune -f
docker volume prune -f
```

### 3. Rebuild Container from Scratch

In VS Code:

-   Press `Ctrl+Shift+P`
-   Select "Dev Containers: Rebuild Container Without Cache"
-   Wait for the complete rebuild process

### 4. Check Port Conflicts

Make sure these ports are not in use by other applications:

-   Port 80 (Apache)
-   Port 3306 (MariaDB)
-   Port 8080 (phpMyAdmin)

### 5. Windows-Specific Issues

#### WSL2 Integration

-   Ensure Docker Desktop has WSL2 integration enabled
-   Check that your project is in a proper location (not on a network drive)

#### File Permissions

-   Make sure your Windows user has permissions to the project folder
-   Try running VS Code as Administrator if needed

### 6. Manual Container Check

If the automatic setup fails, you can manually check the containers:

```bash
# Check if containers are running
docker ps -a

# Check container logs
docker logs lamp-web
docker logs lamp-mariadb
docker logs lamp-phpmyadmin

# Restart specific container
docker restart lamp-web
```

### 7. Alternative: Manual Docker Compose

As a fallback, you can start the environment manually:

```bash
# From the project root
docker-compose up -d

# Then attach VS Code to the running container
# Ctrl+Shift+P -> "Dev Containers: Attach to Running Container"
```

## Common Error Messages

### "Error response from daemon: container ... is not running"

-   This indicates the container started but immediately exited
-   Check container logs: `docker logs lamp-web`
-   Usually caused by Apache configuration issues or missing files

### "Container lamp-web Started" but then fails

-   The container starts but Apache fails to run properly
-   Check the Apache error logs in the `logs/` directory
-   Verify all required files are present

### "Shell server terminated (code: 1)"

-   The container's shell is not accessible
-   Usually indicates the container crashed during startup
-   Check Docker logs for the specific error

## Recovery Steps

1. **First try**: Rebuild container without cache
2. **Second try**: Clean Docker system and rebuild
3. **Third try**: Delete the entire `.devcontainer` and rebuild from scratch
4. **Last resort**: Use manual docker-compose setup

## Getting Help

If none of these steps work:

1. Check the container logs: `docker logs lamp-web`
2. Check the VS Code Dev Container logs (Output panel)
3. Try the manual Docker Compose approach
4. Create a minimal test setup to isolate the issue

## Manual Recovery Command

If all else fails, run this command from the project directory:

```bash
# Clean everything and start fresh
docker-compose down -v
docker system prune -f
docker-compose up -d
```

Then attach VS Code to the running container manually.
