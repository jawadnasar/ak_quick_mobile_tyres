@echo off
set "NODE_DIR=C:\Program Files\nodejs"
set "PATH=%NODE_DIR%;%PATH%"

cd /d "%~dp0"

echo.
echo NextIn Site - Building frontend assets...
echo.

where node >nul 2>&1
if errorlevel 1 (
    echo ERROR: Node.js was not found at %NODE_DIR%
    echo.
    echo Install Node.js from https://nodejs.org/
    echo Or edit NODE_DIR in this file to match your install path.
    pause
    exit /b 1
)

if not exist "node_modules\" (
    echo Installing npm packages...
    call npm install
    if errorlevel 1 goto :failed
)

call npm run build
if errorlevel 1 goto :failed

echo.
echo Build completed successfully.
echo Refresh your browser with Ctrl+Shift+R
echo.
pause
exit /b 0

:failed
echo.
echo Build failed.
pause
exit /b 1
