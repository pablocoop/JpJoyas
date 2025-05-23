from django.contrib import admin
from .models import Producto

# Register your models here.


@admin.register(Producto)
class ProductoAdmin(admin.ModelAdmin):
    list_display  = ('titulo', 'categoria', 'precio', 'creado_en')
    list_filter   = ('categoria',)
    search_fields = ('titulo', 'descripcion')