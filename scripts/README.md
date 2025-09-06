# Scripts Directory

This directory contains utility scripts for testing and managing the LAMP stack project.

## Available Scripts

### `test-csp.sh`

Tests the environment-aware Content Security Policy configuration.

**Usage:**

```bash
cd scripts
chmod +x test-csp.sh
./test-csp.sh
```

**What it tests:**

- Development CSP (localhost, 127.0.0.1, \*.local)
- Production CSP (custom domains)
- HSTS header presence
- Vite HMR support in development

**Requirements:**

- Docker containers must be running
- Apache server must be accessible on port 80

## Adding New Scripts

When adding new scripts:

1. Make them executable: `chmod +x script-name.sh`
2. Add documentation to this README
3. Follow the existing naming conventions
4. Include error handling and clear output
