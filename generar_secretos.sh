#!/bin/bash

# Crear la carpeta de secretos si no existe
mkdir -p docker/secrets

# Generar contraseñas aleatorias seguras y guardarlas en los archivos correspondientes
openssl rand -base64 24 > docker/secrets/db_password.txt
openssl rand -base64 32 > docker/secrets/app_key.txt

echo "¡Secretos generados con éxito en docker/secrets/!"