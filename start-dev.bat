@echo off
cd /d D:\Informatika_Project_Code\Laragon\Project\DusunKemiri

start /min php -S localhost:8000 -t public
start /min npm run dev
