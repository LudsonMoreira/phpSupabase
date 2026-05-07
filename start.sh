#!/bin/bash

mkdir -p /home/runner/workspace/apache/logs
mkdir -p /home/runner/workspace/apache/run

# Inicia o PHP-FPM em background
php-fpm -y /home/runner/workspace/apache/php-fpm.conf &
FPM_PID=$!

echo "PHP-FPM iniciado (PID: $FPM_PID)"

# Aguarda o PHP-FPM ficar pronto
sleep 1

# Inicia o Apache em foreground
echo "Iniciando Apache na porta 5000..."
httpd -f /home/runner/workspace/apache/httpd.conf -DFOREGROUND

# Se Apache encerrar, encerra o PHP-FPM também
kill $FPM_PID 2>/dev/null
