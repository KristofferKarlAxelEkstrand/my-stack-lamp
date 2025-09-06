# Docker

## What is Docker?

Docker is a platform for developing, shipping, and running applications inside containers. Containers are lightweight, portable, and self-sufficient units that package software with all its dependencies.

**Key Features:**

- **Containerization** - Package applications with dependencies
- **Portability** - Run consistently across different environments
- **Isolation** - Each container runs independently
- **Efficiency** - Lightweight compared to virtual machines
- **Version Control** - Track container images and configurations

## Docker in This Project

This Laravel project uses Docker to create a complete development environment:

### Development Environment

- **VS Code Dev Containers** - Integrated development environment
- **Docker Compose** - Orchestrates multiple services
- **Hot Reloading** - Instant code updates during development

### Services Architecture

- **Web Container** - PHP 8.3 + Apache running Laravel
- **Database Container** - MariaDB 10.11 with persistent storage
- **Admin Container** - phpMyAdmin for database management

### Configuration Files

- **`docker-compose.yml`** - Defines all services and their relationships
- **`.devcontainer/`** - VS Code container configuration
- **`Dockerfile`** - Custom PHP-Apache image build instructions

## Deployment with Docker

### Development Deployment

```bash
# Start all services
docker-compose up -d

# View running containers
docker-compose ps

# Access the application
# Laravel: http://localhost
# phpMyAdmin: http://localhost:8080
```

### Production Deployment

For production, you can:

1. **Build Production Images**

   ```bash
   docker-compose -f docker-compose.prod.yml build
   ```

2. **Use Docker Registry**

   ```bash
   # Build and tag image
   docker build -t my-laravel-app:latest .

   # Push to registry
   docker push my-registry/my-laravel-app:latest
   ```

3. **Orchestration Options**
   - **Docker Swarm** - Native clustering
   - **Kubernetes** - Container orchestration platform
   - **Docker Compose** - Simple multi-container deployments

### Environment Benefits

- **Consistent Environments** - Same setup across dev/staging/production
- **Scalability** - Easy horizontal scaling
- **Resource Efficiency** - Optimized resource usage
- **Fast Deployment** - Quick container startup times

Docker ensures your Laravel application runs identically in development, testing, and production environments.

**Learn More:** [Docker Documentation](https://docs.docker.com/)
