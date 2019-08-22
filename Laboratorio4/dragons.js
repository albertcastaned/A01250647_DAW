var cantidad_dragones = 0;
var fuerza_kirito = 0;
var dragones = [];

function Dragon(fuerza, bonus){
    this.fuerza = fuerza;
    this.bonus = bonus;

    this.puedoDerrotar = function(fuerzaKirito)
    {
        return fuerzaKirito > this.fuerza;
    }

    this.obtenerBonus = function()
    {
        return this.bonus;
    }
}

function ingresar_datos()
{

    dragones = [];
    fuerza_kirito = parseInt(prompt("Ingresa la fuerza inicial de Kirito"));
    cantidad_dragones = parseInt(prompt("Ingresa el numero de dragones"));

    for(let i = 0; i < cantidad_dragones; i++)
    {
        var fuerza_dragon_temp = parseInt(prompt("Fuerza del dragon numero " + (i + 1)));
        var bonus = parseInt(prompt("Bonus del dragon numero " + (i + 1)));

        dragones.push(new Dragon(fuerza_dragon_temp,bonus));
    }

    obtener_resultado();
}

function obtener_resultado()
{

    while(dragones.length != 0)
    {
        let flag = false;

        for(let i = 0; i < dragones.length; i++)
        {
            if(dragones[i].puedoDerrotar(fuerza_kirito))
            {
                flag = true;
                fuerza_kirito += dragones[i].obtenerBonus();
                dragones.splice(i,1);
            }
        }

        if(!flag)
            break;
        
    }
    document.getElementById('resultadosDragon').innerHTML = dragones.length == 0 ? '<h2 class = "correcto">Si</h2>' : '<h2 class = "incorrecto">No</h2>'
}