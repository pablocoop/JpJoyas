from django.db import models

# Create your models here.


class Producto(models.Model):
    CATEGORIAS = [
        ('pulsera', 'Pulsera'),
        ('anillo',   'Anillo'),
        ('collar',   'Collar'),
        # …otras categorías
    ]

    titulo       = models.CharField(max_length=200)
    descripcion  = models.TextField(blank=True)
    precio       = models.DecimalField(max_digits=10, decimal_places=2)
    categoria    = models.CharField(max_length=20, choices=CATEGORIAS)
    imagen       = models.ImageField(upload_to='productos/', blank=True, null=True)
    creado_en    = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.titulo