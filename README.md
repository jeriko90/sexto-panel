# sexto-panel
Estructura del Proyecto.

En este caso utilizamos 3 nombres de dominios de prueba :

- hausegamming
- hausetienda
- hstienda

|-----clienteX.tar.gz
|-----docker-compose-clienteX.yaml
|-----docker-compose-hausegamming.tk.yaml
|-----docker-compose-hausetienda.tk.yaml
|-----docker-compose-hstienda.tk.yaml
|-----docker-compose.yaml
|-----multicuenta
│   |-----clienteX
│   │   |-----conf
│   │   │   |-----clienteX.conf
│   │   │   |___ php.ini
│   │   |-----Dockerfile
│   │   |___ public_html
│   │       |___ index.php
│   |-----hausegamming.tk
│   │   |-----conf
│   │   │   |-----hausegamming.tk.conf
│   │   │   |___ php.ini
│   │   |-----Dockerfile
│   │   |___ public_html
│   │       |___ index.php
│   |-----hausetienda.tk
│   │   |-----conf
│   │   │   |-----hausetienda.tk.conf
│   │   │   |___ php.ini
│   │   |-----Dockerfile
│   │   |___ public_html
│   │       |___ index.php
│   |___ hstienda.tk
│       |-----conf
│       │   |-----hstienda.tk.conf
│       │   |___ php.ini
│       |-----Dockerfile
│       |___ public_html
│           |___ index.php
|-----README.md
|___ script.sh
