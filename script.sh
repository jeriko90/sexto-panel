#!/bin/bash
set -x

nombrecliente="$1"
puerto="$2"
directorio_destino="./multicuenta/$nombrecliente"

# Creamos el directorio
mkdir -p ./multicuenta/"$nombrecliente"

# Descomprimir el archivo .tar.gz
tar -xzvf clienteX.tar.gz -C ./multicuenta/"$nombrecliente"

# Renombrar el archivo clienteX.conf a $nombrecliente.conf
mv "$directorio_destino/conf/clienteX.conf" "$directorio_destino/conf/$nombrecliente.conf"

# Editar el archivo clienteX.conf
sed -i "s/clienteX/$nombrecliente/g" "$directorio_destino/conf/$nombrecliente.conf"

# Editar el archivo Dockerfile
sed -i "s/clienteX.conf/$nombrecliente.conf/g" "$directorio_destino/Dockerfile"

# Copiar el archivo docker-compose-clienteX.yaml a la raíz y renombrarlo
cp "docker-compose-clienteX.yaml" "docker-compose-$nombrecliente.yaml"

# Editar el archivo docker-compose-nombrecliente.yaml
sed -i "s/clienteX/$nombrecliente/g" "docker-compose-$nombrecliente.yaml"
sed -i "s/XX/$puerto/g" "docker-compose-$nombrecliente.yaml"

# Ejecutar docker-compose
docker-compose -f "docker-compose-$nombrecliente.yaml" up -d --build
