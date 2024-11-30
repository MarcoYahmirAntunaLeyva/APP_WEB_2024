from django.shortcuts import render
from django.shortcuts import redirect
#from django.contrib.auth.forms import UserCreationForm
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
    
def registro(request):
    return render(request, 'mainapp/registro.html',{
        'title':'Registro',
        'content':'..:: Registro de usuarios ::..'
    })
    
def inicio_s(request):
    return render(request, 'mainapp/inicio_s.html',{
        'title':'Inicio de Sesión',
        'content':'..:: Inicio de Sesión con Django ::..'
    })
    
def error404_2(request,exception):
    return render(request, 'mainapp/404.html')