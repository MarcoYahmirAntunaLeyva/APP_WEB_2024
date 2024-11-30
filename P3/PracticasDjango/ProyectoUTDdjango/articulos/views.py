from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Article,Category

@login_required(login_url='inicio')
def list_art(request):
    
    #Sacar articulos de base de datos
    articulos = Article.objects.all()
    return render(request, 'articulos/listado_art.html',{
        'title':'Articulos',
        'content':' Varios Articulos',
        'articulos': articulos
    })

@login_required(login_url='inicio')
def list_cat(request):
    
    categorias = Category.objects.all()
    return render(request, 'categorias/listado_cat.html',{
        'title':'Categorias',
        'content':' Varios Articulos',
        'categorias': categorias
    })