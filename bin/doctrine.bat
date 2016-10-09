@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/doctrine/orm/bin/doctrine
php "%BIN_TARGET%" %*
