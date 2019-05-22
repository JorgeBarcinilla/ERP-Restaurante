$('#form-1').on('submit',function(event){
    let inputs = document.querySelector('.textField');
    if(validar(inputs)){

        $.ajax({
            url: 'insertar.php',
            method: 'POST',
            data: $('#form-1').serialize(),
        })
        .done(function(respuesta){
            
            if(respuesta == "false"){
                alert("El campo debe cumplir con un formato valido");
            }else if(respuesta.includes("Duplicate entry")){
                alert("El codigo fue registrado anteriormente");
            }else{
                for (var i = 0; i < inputs.form.length-1; i++) {
                    inputs.form[i].value = '';
                }
            }
            
        })
        .fail(function(resp){
            alert('Hubo un problema al intentar enviar la informacion');
        })
        
    }
    event.preventDefault();
});

function validar(inputs){
    let flag = true;
    let name = "";

    for (var i = 0; i < inputs.form.length; i++) {
        if (inputs.form[i].value == "" && inputs.form[i].name != "celular") {
            $(inputs.form[i]).addClass("error");
            $(inputs.form[i]).focus();
            flag = false;
            name = inputs.form[i].name + " no puede estar vacio!";
            break;
        } else if(inputs.form[i].className == "textField num" && isNaN(inputs.form[i].value)){
            $(inputs.form[i]).addClass("error");
            $(inputs.form[i]).focus();
            flag = false;
            name = inputs.form[i].name + " es solo numeros";
            break;
        }else{
            $(inputs.form[i]).removeClass("error");
        }
    }

    if (!flag) {
        alert("El campo " + name);
        return false;
    }

    return true;
}


let backupInput ;
let inputs;

$('.editar').on('click',function(event){
    inputs = document.getElementsByClassName('textFieldDisabled id'+$(this).attr('id').substring(1));
    backupInput = new Array(inputs.length);
    if($(this).val()=="Editar"){
        for (var i = 0; i < inputs.length; i++) {
            backupInput[i]=[inputs[i].name , inputs[i].value];
            inputs[i].disabled = false;
            inputs[i].focus();
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-success');
            
        }
        $(this).val('Actualizar');
        $(this).prop('disabled',true);
        $('#D'+$(this).attr('id').substring(1)).val('Cancelar');
        $('#D'+$(this).attr('id').substring(1)).get(0).type = "button";
        
        console.log($('.card-footer').html()+"@method('PUT')");
    }
})

$('.textFieldDisabled').on('keyup',function(){
    let flag = false;
    for (let index = 0; index < inputs.length; index++) {
        if(inputs[index].value != backupInput[index][1]){
            flag = true;
            break;
        }
    }
    for (let index = 0; index < backupInput.length; index++) {
        console.log('('+backupInput[index][0] +' == '+ $(this).attr('name') +' && '+ backupInput[index][1] +' != ' +$(this).val()+') || '+flag);
        if((backupInput[index][0] == $(this).attr('name') && backupInput[index][1] != $(this).val()) || flag){
            $('#E'+$(this).attr('id').substring(1)).get(0).type = "submit";
            $('#E'+$(this).attr('id').substring(1)).prop('disabled',false);
            break;
        }
        else{
            $('#E'+$(this).attr('id').substring(1)).get(0).type = "button";
            $('#E'+$(this).attr('id').substring(1)).prop('disabled',true);
        }
    }
    
})

$('.textFieldDisabled').on('click',function(){
    let flag = false;
    for (let index = 0; index < inputs.length; index++) {
        if(inputs[index].value != backupInput[index][1]){
            flag = true;
            break;
        }
    }
    for (let index = 0; index < backupInput.length; index++) {
        console.log('('+backupInput[index][0] +' == '+ $(this).attr('name') +' && '+ backupInput[index][1] +' != ' +$(this).val()+') || '+flag);
        if((backupInput[index][0] == $(this).attr('name') && backupInput[index][1] != $(this).val()) || flag){
            $('#E'+$(this).attr('id').substring(1)).get(0).type = "submit";
            $('#E'+$(this).attr('id').substring(1)).prop('disabled',false);
            break;
        }
        else{
            $('#E'+$(this).attr('id').substring(1)).get(0).type = "button";
            $('#E'+$(this).attr('id').substring(1)).prop('disabled',true);
        }
    }
})


$('.eliminar').on('click',function(event){
    let inputs = document.getElementsByClassName('textFieldDisabled id'+$(this).attr('id').substring(1));
    console.log('textFieldDisabled id'+$(this).attr('id').substring(1));
    if($('#E'+$(this).attr('id').substring(1)).val()=="Actualizar"){
        for (var i = 0; i < inputs.length; i++) {
            console.log(backupInput);
            if(backupInput[i] != inputs[i].value){
                console.log(backupInput[i]);
                inputs[i].value = backupInput[i][1];
            }
            inputs[i].disabled = true;
            $('#E'+$(this).attr('id').substring(1)).removeClass('btn-success');
            $('#E'+$(this).attr('id').substring(1)).addClass('btn-warning');
        }
        $('#E'+$(this).attr('id').substring(1)).val('Editar');
        $(this).val('Eliminar');
        backupInput = "";
    }
    $('#E'+$(this).attr('id').substring(1)).get(0).type = "button";
    $('#E'+$(this).attr('id').substring(1)).prop('disabled',false);
    if($('#D'+$(this).attr('id').substring(1)).get(0).type == "button"){
        $('#D'+$(this).attr('id').substring(1)).get(0).type = "submit";
        event.preventDefault();
    }
    console.log($('.card-footer').html()+"@method('DELETE')");
})

$(document).ready(function(){
    setTimeout(function(){
        $('.alert').fadeOut(500);
    },2000);
})

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    if($(this).text() == "Menu"){
        $(this).text('X');
    }else if($(this).text() == "X"){
        $(this).text('Menu');
    }
    
  });
