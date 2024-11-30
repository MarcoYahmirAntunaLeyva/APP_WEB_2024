from django.shortcuts import render
from django.shortcuts import redirect
#from django.contrib.auth.forms import UserCreationForm
from mainapp.forms import RegisterForm
from django.contrib import messages
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required
# Create your views here.

def index(requets):
    return render(requets, 'mainapp/index.html',{
        'title':'Inicio | Pagina principal',
        'content':'..:: ¡Bienvenido a mi pagina principal !::..'                        
    })
    
@login_required(login_url='inicio')
def about(requets):
    return render(requets, 'mainapp/about.html',{
        'title':'Acerca de',
        'content':'..:: Somos un equipo de Desarrollo de SW con Django ::..'
    })

@login_required(login_url='inicio')
def mision(requets):
    return render(requets, 'mainapp/mision.html',{
        'title':'mision',
        'content':'..:: Esta es la mision de la UTD ::..'
    })
    
@login_required(login_url='inicio')
def vision(requets):
    return render(requets, 'mainapp/vision.html',{
        'title':'vision',
        'content':' Esta es la vision de la UTD'
    })
    
    
def registro(requets):
    if requets.user.is_authenticated:
        return redirect('inicio')
    else:
        register_form=RegisterForm()
        
        if requets.method == "POST":
            register_form=RegisterForm(requets.POST)
            
            if register_form.is_valid():
                register_form.save()
                messages.success(requets, "¡Registrado Correctamente")
                return redirect('inicio')
            
        return render(requets, 'users/registro.html',{
        'title':'Registro',
        'register_form':register_form
        })
    
def inicio_s(requets):
    if requets.user.is_authenticated:
        return redirect('inicio')
    else:
        if requets.method == "POST":
            username = requets.POST.get('username')
            password = requets.POST.get('password')
           
            user=authenticate(requets,username=username,password=password)
           
            if user is not None:
                login(requets,user)
                messages.success(requets,"Bienvenido al inicio de Sesión")
                return redirect('inicio')
            
            else:
                messages.warning(requets,"No es posible iniciar sesion, verifica tus credenciales")
    
        return render(requets, 'users/inicio_s.html',{
        'title':'Inicio de Sesión',
        'content':'..:: Inicio de Sesión con Django ::..'
    })

def logout_s(request):
    logout(request)
    return redirect('inicio')

#redirigir 1er forma
def error404(request,exception):
    return redirect('inicio')

#redirigir 2da forma
def error404_2(request,exception):
    return render(request, 'mainapp/404.html')