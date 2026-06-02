#!/bin/bash
cd "c:\SIMONE\LANDING PAGE\lp-kpm"
Start-Process powershell -ArgumentList "-NoExit", "-Command", "cd 'c:\SIMONE\LANDING PAGE\lp-kpm'; php artisan serve"
Start-Process powershell -ArgumentList "-NoExit", "-Command", "cd 'c:\SIMONE\LANDING PAGE\lp-kpm'; npm run dev"
Write-Host "✅ Development servers running!" -ForegroundColor Green
Write-Host "   Laravel: http://localhost:8000" -ForegroundColor Cyan
Write-Host "   Press Ctrl+C to stop" -ForegroundColor Yellow
