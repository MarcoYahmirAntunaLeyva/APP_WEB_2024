from django.urls import path
from . import views

urlpatterns = [
    path('articulos/', views.list_art, name='articulos'),
    path('categorias/', views.list_cat, name='categorias'),
]