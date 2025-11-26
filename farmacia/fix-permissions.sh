#!/bin/bash

echo "🔧 Ajustando permissões do Laravel..."

# Permissões para pastas que precisam ser graváveis
chmod -R ug+rwx storage bootstrap/cache

# Dono correto para ambiente docker (www-data)
chown -R www-data:www-data storage bootstrap/cache

# Para garantir permissões herdadas corretamente
find storage -type d -exec chmod 775 {} \;
find storage -type f -exec chmod 664 {} \;

find bootstrap/cache -type d -exec chmod 775 {} \;
find bootstrap/cache -type f -exec chmod 664 {} \;

echo "✔ Permissões corrigidas com sucesso!"
