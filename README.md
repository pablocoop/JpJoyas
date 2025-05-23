# JpJoyas
Desarrollo utilizando Django para el sitio web JpJoyas.

# Cloned proyect

python -m venv venv
.\venv\Scripts\Activate.ps1
pip install -r requirements.txt


# Comandos para el desarrollo.

## 1. Crea el entorno virtual
python -m venv venv

## 2. Activa el entorno virtual (PowerShell)
.\venv\Scripts\Activate.ps1

##    Si te da error de ejecución de scripts, ejecuta (una sola vez):
##    Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser

## 3. Instala Django
pip install django

## 4. Genera el proyecto Django dentro de esta carpeta
django-admin startproject jpjoyas_project .

## 5. Crea la app 'catalogo'
python manage.py startapp catalogo

## 6. Crea tu .gitignore rápidamente
echo venv/            >> .gitignore
echo __pycache__/     >> .gitignore
echo *.pyc            >> .gitignore
echo *.sqlite3        >> .gitignore
echo .DS_Store        >> .gitignore
echo .vscode/         >> .gitignore

## 7. Inicializa Git y primer commit
git init
git add .
git commit -m "Inicializar proyecto Django para JPJoyas"


## 8. Instalar Pillow
python -m pip install Pillow