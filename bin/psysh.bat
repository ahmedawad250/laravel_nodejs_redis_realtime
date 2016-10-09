@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/psy/psysh/bin/psysh
php "%BIN_TARGET%" %*
