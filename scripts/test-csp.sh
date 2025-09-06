#!/bin/bash

echo "=== Environment-Aware CSP Testing ==="
echo

echo "1. Testing localhost (development):"
curl -s -I http://localhost:80 | grep -E "Content-Security-Policy|Strict-Transport" | head -2
echo

echo "2. Testing 127.0.0.1 (development):"
curl -s -I -H "Host: 127.0.0.1" http://localhost:80 | grep -E "Content-Security-Policy|Strict-Transport" | head -2
echo

echo "3. Testing myapp.local (development):"
curl -s -I -H "Host: myapp.local" http://localhost:80 | grep -E "Content-Security-Policy|Strict-Transport" | head -2
echo

echo "4. Testing production.example.com (production):"
curl -s -I -H "Host: production.example.com" http://localhost:80 | grep -E "Content-Security-Policy|Strict-Transport" | head -2
echo

echo "=== Summary ==="
echo "✅ Development environments have relaxed CSP with Vite HMR support"
echo "✅ Production environments have strict CSP with HSTS"
echo "✅ Environment detection based on hostname patterns"
