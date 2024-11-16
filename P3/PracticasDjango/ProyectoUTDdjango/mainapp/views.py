from django.shortcuts import render
from django.shortcuts import redirect

# Create your views here.

def index(requets):
    return render(requets, 'mainapp/index.html',{
        'title':'Inicio | Pagina principal',
        'content':'..:: ¡Bienvenido a mi pagina principal !::..'                        
    })
    
def about(requets):
    return render(requets, 'mainapp/about.html',{
        'title':'Acerca de',
        'content':'..:: Somos un equipo de Desarrollo de SW con Django ::..'
    })
    
def mision(requets):
    return render(requets, 'mainapp/mision.html',{
        'title':'mision',
        'content':'..:: Somos un equipo de Desarrollo de SW con Django ::..'
    })
    
def vision(requets):
    return render(requets, 'mainapp/vision.html',{
        'title':'vision',
        'content':'..:: Somos un equipo de Desarrollo de SW con Django ::..'
    })

#redirigir 1er forma
def error404(request,exception):
    return redirect('inicio')

#redirigir 2da forma
def error404_2(request,exception):
    return render(request, 'mainapp/404.html')