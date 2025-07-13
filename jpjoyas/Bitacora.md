# Paso 1:
Ejecutamos el siguiente comando para crear un modelo de BlogPost en Laravel:


```bash
php artisan make:model BlogPost -m
```

Esto creará el archivo:
app/Models/BlogPost.php
y un archivo de migración en database/migrations con un nombre similar a 2025_07_13_202203_create_blog_posts_table.php.

# Paso 2:
Editamos el archivo de migración para definir la estructura de la tabla `blog_posts`. El contenido del archivo debe ser similar al siguiente:

```php
Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('body');
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable()->after('image_path');
            $table->timestamps();
        });
```


# Paso 3: Modificar migración para agregar campo "username" a la tabla users

Ejecutamos el siguiente comando para crear una migración que agregue el campo `username` a la tabla `users`:
```bash
php artisan make:migration add_username_to_users_table --table=users
```
Dentro de la migración, agregamos el campo `username` como único y después del campo `name`:

```php
Schema::table('users', function (Blueprint $table) {
    $table->string('username')->unique()->after('name');
});
```

# Paso 4: Crear el controlador BlogPostController

Ejecutamos el siguiente comando para crear un controlador de recursos para BlogPost:

```bash
php artisan make:controller BlogPostController --resource
``` 

# Paso 5: Modificar el modelo User para establecer la relación con BlogPost



# Paso 6: Antes de cambiar las rutas, creamos un controlador para la página principal.

Ejecutamos el siguiente comando para crear un controlador para la página principal:

```bash
php artisan make:controller HomeController
```
