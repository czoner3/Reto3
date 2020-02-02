let botondni = document.getElementById('botondni');

botondni.addEventListener("click", function () {


    let dnicliente = document.getElementById('dniCliente').value;
    comprobarDni(dnicliente);

    function comprobarDni(dni){
        let numero;
        let letr;
        let letra;
        let regexpdni = /^\d{8}[a-zA-Z]$/;

        if(regexpdni.test (dni)){
            numero = dni.substr(0,dni.length-1);
            letr = dni.substr(dni.length-1,1);
            numero = numero % 23;
            letra='TRWAGMYFPDXBNJZSQVHLCKET';
            letra=letra.substring(numero,numero+1);
            if (letra!=letr.toUpperCase()) {
                alert('Dni erroneo, la letra del NIF no se corresponde');
            }else{
                buscarDni(dnicliente)
            }
        }else{
            alert('Dni erroneo, formato no válido');
        }
    }
    function buscarDni(dnicliente){
        document.getElementById('fichaIncidencia').style.height="414px";
        document.getElementById('fichaIncidencia').style.transitionDelay="1s";
        document.getElementById('fichaIncidencia').style.transitionDuration="1.5s";
        botondni.style.backgroundColor="#32cc98";
        botondni.style.color="white";

        $.ajax({
            data: dnicliente,
            url: "/create/incidencia?_token=KjSunNIDQC8HoHZt3Oayt3rB7mS5JV0mNVbrplb4&dniCliente=" + dnicliente + "&action=Buscar+dni",
            type: "GET",
            async: false,
            success: function (result) {
                let contenido = $("<div />").html(result).find('#jscliente').html();
                eval(contenido);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
            }
        });
    }
});


let botonmatricula = document.getElementById('botonmatricula');

botonmatricula.addEventListener("click", function () {
    let nummatricula = document.getElementById('matricula').value;
    $.ajax({
        data: nummatricula,
        url: "/create/incidencia?_token=KjSunNIDQC8HoHZt3Oayt3rB7mS5JV0mNVbrplb4&matricula="+ nummatricula +"&action=Buscar+matricula",
        type: "GET",
        async: false,
        success: function (result) {
            console.log(result);
            let contenido = $("<div />").html(result).find( '#jscoche' ).html();
            eval(contenido);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
        }
    });
});

