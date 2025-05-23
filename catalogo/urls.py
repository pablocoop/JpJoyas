from django.urls import path
from . import views

urlpatterns = [
    path('', views.ProductoListView.as_view(), name='home'),
]
