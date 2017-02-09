/**
 * Created by Ileana on 08/02/2017.
 */

var t = 0, i = 1, orden = 0, N=0;
var limpiar_operacion = function () {
    $('#orden-txt').val('');
};

//cuando el usuario ingresa N, procede a inicializar la matriz en el servidor y mostrar los campos necesarios para correr las operaciones
var init_matriz = function (ev) {
    ev.preventDefault();
    el = $('#n');
    if (el.val() == '')
        return false;
    if (/\d+/.test(el.val())) {
        var n = parseInt(el.val());
        N=n;
        if (n < 1 || n > 100)
            return false;
        $.ajax({
            url: 'http://localhost/rappi/index.php/api/matriz/matriz_init',
            type: "POST",
            data: {n: el.val()},
            success: function (resp) {
                $('#n-val').text("N = " + n);
                $('#instrucciones,#operaciones').removeClass('hidden');
                el.parents('.panel').hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(resp);
            }
        });

    }
    else
        return false;


};

//obtiene el número de operaciones a realizar y muestra los controles para que el usuario escriba las operaciones
var num_operaciones = function (ev) {
    var el = $(this);
    if (window.event) { // IE
        keynum = ev.keyCode;
    } else if (ev.which) { // Netscape/Firefox/Opera
        keynum = ev.which;
    }
    if (keynum == 13) { //actualizar
        if (/\d+/.test(el.val())) {
            o = parseInt(el.val());
            if (o < 1 || o > 1000)
                return false;
            orden = o;
            $('.orden').removeClass('hidden');
            el.parent().hide();
            $('#operaciones').find('.page-header h5').text('Operaciones en Matriz (' + orden + ')');
        }
        else
            return false;
    }
};

//checa que los parámetros de la operación estén correctos y dentro de los rangos correctos
var checar_params= function(orden_txt) {
    var ok = /^UPDATE \d+ \d+ \d+ \d+$/.test(orden_txt) || /^QUERY \d+ \d+ \d+ \d+ \d+ \d+$/.test(orden_txt);
    if (!ok)
        return false;
    params = orden_txt.split(" ");
    if (params[0] == 'UPDATE') {
        if(params[1]>=N || params[2]>=N || params[3]>=N )
            return false;
    }
    if (params[0] == 'QUERY') {
        for(var j=1;j<params.length;j++)
            if(params[j]>=N)
                return false;
    }
    return true;
};

//llamada cuando el usuario ingresa una operacion y da click en ejecutar, hace la llamada a la función correspondiente según la operación elegida
var ejecutar_operacion = function (ev) {
    var orden_txt = $('#orden-txt').val();
    if (orden_txt == '')
        return false;
    if(!checar_params(orden_txt))
        return false;
    url = '';
    if (params[0] == 'UPDATE') {
        url = 'http://localhost/rappi/index.php/api/matriz/actualizar';
        data = {x: params[1], y: params[2], z: params[3], w: params[4]};
    }
    if (params[0] == 'QUERY') {
        url = 'http://localhost/rappi/index.php/api/matriz/sum';
        data = {x1: params[1], y1: params[2], z1: params[3], x2: params[4], y2: params[5], z2: params[6]};
    }
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (resp) {
            console.log(resp);
            $('#operaciones .log').append("<p>" + resp + "</p>");
            orden--;
            $('#operaciones').find('.page-header h5').text('Operaciones en Matriz restantes(' + orden + ')');
            if (orden == 0) {
                i++;
                setTimeout(restore, 1500);
                return;
            }

            limpiar_operacion();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(resp);
        }
    });
};




//obtiene el valor de t al dar enter en el input t, inicializa el rótulo a la corrida actual
var get_t = function (ev) {
    var el = $(this);
    if (window.event) { // IE
        keynum = ev.keyCode;
    } else if (ev.which) { // Netscape/Firefox/Opera
        keynum = ev.which;
    }
    if (keynum == 13) { //actualizar
        if (/\d+/.test(el.val())) {
            t = parseInt(el.val());
            if (t < 1 || t > 50)
                return false;
            $('.cuerpo').show();
            $('#caso-prueba').text('Caso de prueba ' + i);
            el.parent().hide();
        }
        else
            return false;
    }
};

//inicializar todos los estados y controles al terminar un caso de prueba
var restore = function () {

    if (i > t) //llegué al límite de los casos de prueba
    {
        $('#instrucciones,#operaciones,#ingrese').addClass('hidden');
        $('#caso-prueba').text('FIN DEL EJERCICIO');
        $("#n-val,.log").text('');
    }
    else {
        $('#caso-prueba').text('Caso de prueba ' + i);
        $("#operaciones .form-inline").show();
        $('#instrucciones,#operaciones,.orden').addClass('hidden');
        limpiar_operacion();
        $('#operaciones').find('.page-header h5').text('Operaciones en Matriz');
        $('#ingrese').show();
        $("#n-val,.log").text('');
        $('#n, #m,#num-operaciones').val('');
    }
};
$(function () {
    $('#ejecutar-orden').click(ejecutar_operacion);
    $('#init').on("submit", init_matriz);
    $('#t').on('keypress', get_t);
    $('#num-operaciones').on('keypress', num_operaciones);
});

