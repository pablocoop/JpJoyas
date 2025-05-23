from django.views.generic import ListView
from .models import Producto

class ProductoListView(ListView):
    model               = Producto
    template_name       = "catalogo/producto_list.html"
    context_object_name = "productos"
    paginate_by         = 12    # opcional: paginación