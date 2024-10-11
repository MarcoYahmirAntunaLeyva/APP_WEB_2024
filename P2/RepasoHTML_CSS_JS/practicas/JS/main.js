//Este es un comentario de JS de una linea

/*Este es un comentario de 
varias 
lineas de codigo*/

//Variables
var nombre="Yahmir Antuna";
var nombre2='Daniel Flores';
let nombre3="Rodolfo Flores";
let edad=20;
let estatura=1.80;
let logico=true;

//Alert
//alert("Soy una alerta")

//Contenido de variables
console.log("Hola soy la consola y tu nombre es: "+nombre3);//atraves de consola 
document.write("Hola soy la consola y tu nombre es: "+nombre3);
document.write("<hr><h2>Hola soy la consola y tu nombre es:" +nombre3+"</h2>");

//Mostrar contenido getElementByID
let datos=document.getElementById("informacion");
datos.innerHTML="Hola soy un contenido de innerHTML<br>";
datos.innerHTML+="<hr><h2>Hola soy otro contenido de innerHTML</h2><hr>"
datos.innerHTML+="<hr><h2>Mi edad es: "+edad+"</h2><hr>"
datos.innerHTML+=`
        <hr>
        <h2>Mi edad es: ${edad}</h2>
        <h2>Mi nombre es: ${nombre}</h2>
        <hr>
`;

//Condiciones
if (edad>=18){
    datos.innerHTML+=`<hr><h2>Soy mayor de edad</h2><hr>`
}
else{
    datos.innerHTML+=`<hr><h2>Soy mayor de edad</h2><hr>`
}

//Ciclos
for (let i=1;i<=5;i++){
    datos.innerHTML+=`<hr><h2>For: Soy el numero: ${i}</h2><hr>`
}

let i=1;
while (i<=5){
    datos.innerHTML+=`<hr><h2>While: Soy el numero: ${i}</h2><hr>`;
    i++;
}

i=1
do{
    datos.innerHTML+=`<hr><h2>Do While: Soy el numero: ${i}</h2><hr>`;
    i++;
}while(i<=5)

//Funciones

//1. Funciones que no reciben parametros y no resgresan valor

function suma1()
{
    let n1=2;
    let n2=3;
    let suma1=n1+n2;
    datos.innerHTML=`<hr><h2>La suma 1 es: ${suma1}</h2><hr>`;
}
suma1();

//2. Funciones que no reciben parametros y si resgresan valor

function suma2()
{
    let n1=2;
    let n2=3;
    let suma=n1+n2;
    return suma;
}

let suma=suma2();
datos.innerHTML+=`<hr><h2>La suma 2 es: ${suma}</h2><hr>`;

//3. Funciones que si reciben parametros y no resgresan valor

function suma3(numero1, numero2)
{
    let n1=numero1;
    let n2=numero2;
    let suma3=n1+n2;
    datos.innerHTML+=`<hr><h2>La suma 3 es : ${suma3}</h2>`;
}
suma3(3,4);

//4. Funciones que si reciben parametros y si resgresan valor

function suma4(numero1, numero2)
{
    let n1=numero1
    let n2=numero2
    let suma=n1+n2
    return suma;
}

sum=suma4(3,4);
datos.innerHTML+=`<hr><h2>La suma 4 es : ${sum}</h2>`;


//Arreglos

let animales=[];
animales[0]='Perro';
animales[1]='Gallina';
animales[3]='Perico';

let animales2=["Leon", "Tigre", "Elefante"];


for(let i=0; i<animales.length; i++)
{
    datos.innerHTML+=`<hr><h2>El animal es : ${animales[i]}</h2>`;
}

animales.forEach(element => {
    datos.innerHTML+=`<hr><h2>El animal es : ${element}</h2>`;
});
