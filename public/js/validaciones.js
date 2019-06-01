let backupInput;
let backupCheck;
let inputs;
let checkbox;

$('.editar').on('click',function(event){
    inputs = document.getElementsByClassName('textFieldDisabled id'+$(this).attr('id').substring(1));
    checkbox = document.getElementsByClassName('check check-crear id'+$(this).attr('id').substring(1));
    backupInput = new Array(inputs.length);
    backupCheck = new Array(checkbox.length);
    if($(this).val()=="Editar"){

        for (let index = 0; index < checkbox.length; index++) {
            backupCheck[index]=[checkbox[index].name , checkbox[index].checked];
            checkbox[index].disabled = false;
        }
        for (let index = 0; index < inputs.length; index++) {
            backupInput[index]=[inputs[index].name , inputs[index].value];
            inputs[index].disabled = false;
        }

        inputs[0].focus();
        $(this).removeClass('btn-warning');
        $(this).addClass('btn-success');
        $(this).val('Actualizar');
        $(this).prop('disabled',true);
        $('#D'+$(this).attr('id').substring(1)).val('Cancelar');
        $('#D'+$(this).attr('id').substring(1)).get(0).type = "button";
        $('#flag'+$(this).attr('id').substring(1)).val('PUT');
        //document.getElementsByName('_method')[0].value = 'PUT';
        console.log(backupInput+"--"+backupCheck);
    }
});

$('.textFieldDisabled').on('keyup',function(){
    let identifier = $(this).attr('id').substring(1);
    if($(this).prop('type') == "number"){
        identifier = $(this).attr('class').substring(32);
    }
    if($(this).val().length > 0){
        
        console.log(identifier);
        var flag = false;
        let inputEmpty = false;
        for (let index = 0; index < inputs.length; index++) {
            if(inputs[index].value.length > 0){
                if(inputs[index].value != backupInput[index][1]) {
                    flag = true;
                }
            }
            else{
                inputEmpty = true;
                break;
            }
        }
        for (let index = 0; index < checkbox.length; index++) {
            if(inputs[index].value.length > 0){
                if(checkbox[index].checked != backupCheck[index][1]){
                    flag = true;
                }
            }
            else{
                inputEmpty = true;
                break;
            }
        }
    
    
        for (let index = 0; index < backupInput.length; index++) {
            console.log($(this).val().length);
            if(((backupInput[index][0] == $(this).attr('name') && backupInput[index][1] != $(this).val()) || flag) && !inputEmpty){
                $('#E'+identifier).get(0).type = "submit";
                $('#E'+identifier).prop('disabled',false);
                break;
            }
            else{
                console.log('#E'+identifier);
                $('#E'+identifier).get(0).type = "button";
                $('#E'+identifier).prop('disabled',true);
                break;
            }
    
        }
    }else{
        $('#E'+identifier).get(0).type = "button";
        $('#E'+identifier).prop('disabled',true);
    }
    
    
    
});

/*$('.check-crear').on('click',function(){
    var flag = false;
    for (let index = 0; index < inputs.length; index++) {
        if(inputs[index].value != backupInput[index][1]){
            flag = true;
            break;
        }
    }
    for (let index = 0; index < checkbox.length; index++) {
        if(checkbox[index].checked){
            if(checkbox[index].checked != backupCheck[index][1]){
                flag = true;
                break;
            }
        }else{
            flag = false;
        }
        
    }

    for (let index = 0; index < backupCheck.length; index++) {
        //console.log('('+backupCheck[index][0] +' == '+ $(this).attr('name') +' && '+ backupCheck[index][1] +' != ' +$(this).prop('checked')+') || '+flag);
        if((backupCheck[index][0] == $(this).attr('name') && backupCheck[index][1] != $(this).prop('checked')) || flag){
            $('#E'+$(this).attr('id').substring(2)).get(0).type = "submit";
            $('#E'+$(this).attr('id').substring(2)).prop('disabled',false);
            break;
        }
        else{
            $('#E'+$(this).attr('id').substring(2)).get(0).type = "button";
            $('#E'+$(this).attr('id').substring(2)).prop('disabled',true);
        }
        
    }
})*/

$('.textFieldDisabled').on('click',function(){
    let identifier = $(this).attr('id').substring(1);
    if($(this).prop('type') == "number"){
        identifier = $(this).attr('class').substring(32);
    }
    if($(this).val().length > 0){
        
        console.log(identifier);
        var flag = false;
        let inputEmpty = false;
        for (let index = 0; index < inputs.length; index++) {
            if(inputs[index].value.length > 0){
                if(inputs[index].value != backupInput[index][1]) {
                    flag = true;
                }
            }
            else{
                inputEmpty = true;
                break;
            }
        }
        for (let index = 0; index < checkbox.length; index++) {
            if(inputs[index].value.length > 0){
                if(checkbox[index].checked != backupCheck[index][1]){
                    flag = true;
                }
            }
            else{
                inputEmpty = true;
                break;
            }
        }
    
        for (let index = 0; index < backupInput.length; index++) {
            console.log($(this).val().length);
            if(((backupInput[index][0] == $(this).attr('name') && backupInput[index][1] != $(this).val()) || flag) && !inputEmpty){
                $('#E'+identifier).get(0).type = "submit";
                $('#E'+identifier).prop('disabled',false);
                break;
            }
            else{
                console.log('#E'+identifier);
                $('#E'+identifier).get(0).type = "button";
                $('#E'+identifier).prop('disabled',true);
                break;
            }
    
        }
    }else{
        $('#E'+identifier).get(0).type = "button";
        $('#E'+identifier).prop('disabled',true);
    }
    
    
});


$('.eliminar').on('click',function(event){
    let inputs = document.getElementsByClassName('textFieldDisabled id'+$(this).attr('id').substring(1));
    console.log('textFieldDisabled id'+$(this).attr('id').substring(1));
    if($('#E'+$(this).attr('id').substring(1)).val()=="Actualizar"){
        for (var i = 0; i < inputs.length; i++) {
            console.log(backupInput);
            inputs[i].value = backupInput[i][1];
            inputs[i].disabled = true;
        }
        for (var i = 0; i < checkbox.length; i++) {
            console.log(backupInput);
            checkbox[i].checked = backupCheck[i][1];
            checkbox[i].disabled = true;
        }
        $('#E'+$(this).attr('id').substring(1)).removeClass('btn-success');
        $('#E'+$(this).attr('id').substring(1)).addClass('btn-warning');
        $('#E'+$(this).attr('id').substring(1)).val('Editar');
        $(this).val('Eliminar');
    }

    $('#E'+$(this).attr('id').substring(1)).get(0).type = "button";
    $('#E'+$(this).attr('id').substring(1)).prop('disabled',false);
    if($('#D'+$(this).attr('id').substring(1)).get(0).type == "button"){
        $('#D'+$(this).attr('id').substring(1)).get(0).type = "submit";
        event.preventDefault();
    }
    //document.getElementsByName('_method')[0].value = 'DELETE';
    $('#flag'+$(this).attr('id').substring(1)).val('DELETE');
});

$(document).ready(function(){
    setTimeout(function(){
        $('.alert').fadeOut(500);
    },2000);
});

$('.check').on('click',function(event){
    let cantidad = $('#cant'+$(this).attr('id').substring(2));
    if($(this).prop('checked')){
        cantidad.prop('disabled',false);
        cantidad.val('1');
    }else{
        cantidad.prop('disabled',true);
        cantidad.val('');
    }
});

let ingredientes;
let ingredientesCant;
$('.crear-plato').on('click',function(event){
    ingredientes = new Array();
    ingredientesCant = new Array();
    let checks = document.querySelector('.check-crear');
    for (var i = 0; i < checks.form.length; i++) {
        if($(checks.form[i]).prop('checked')){
            ingredientes.push(checks.form[i].value);
            ingredientesCant.push($('#cant'+checks.form[i].value).val());
        }
    }
    if(ingredientes.length < 1 && $(this).prop('type') == 'submit'){
        event.preventDefault();
        alert('El plato debe tener minimo un ingrediente');
    }
    $('#input-array-ingredientes').val(ingredientes+"-"+ingredientesCant);
});

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    if($(this).text() == ">"){
        $(this).text('<');
    }else if($(this).text() == "<"){
        $(this).text('>');
    }
    
});

$('.plato-orden').on('mouseover',function(event){
    let checkCard = $('#check'+$(this).attr('id').substring(9));
    if(checkCard.val() == 'false'){
        $(this).addClass("plato-orden-mouseover");
    }else if(checkCard.val() == 'true'){
        $(this).removeClass("plato-orden-mouseover");
    }
    
});

$('.plato-orden').on('mouseout',function(event){
    let checkCard = $('#check'+$(this).attr('id').substring(9));
    if(checkCard.val() == 'false'){
        $(this).removeClass("plato-orden-mouseover");
    }
    
});

var flag = true;
$('.plato-orden').on('click',function(event){

    console.log('card');
    
    let checkCard = $('#check'+$(this).attr('id').substring(9));
    let cantidadCard = $('#cantidad'+$(this).attr('id').substring(9));

    cantidadCard.on('click',function(event){
        console.log('cantidad');
        let checkCard = $('#check'+$(this).attr('id').substring(8));
        if(checkCard.val() == 'true'){
            flag = false;
        }
    });
    
    if(checkCard.val() == 'false'){
        checkCard.val('true');
        cantidadCard.prop('disabled',false);
        cantidadCard.val('1');
        cantidadCard.focus()
        $(this).addClass("plato-orden-select");
        $(this).removeClass("plato-orden-mouseover");
        
    }else if(checkCard.val() == 'true' && flag){
        
        checkCard.val('false');
        cantidadCard.prop('disabled',true);
        cantidadCard.val('');
        $(this).removeClass("plato-orden-select");
    }
    flag = true;
});

let platos;
let platosCant;
let platosCantVal;
$('.crear-orden').on('click',function(event){
    platos = new Array();
    platosCant = new Array();
    platosCantVal = new Array();
    let checks = document.getElementsByClassName('check-plato-orden');
    for (var i = 0; i < checks.length; i++) {
        if(checks[i].value == 'true'){
            platos.push($('#N'+checks[i].id.substring(5)).attr('id').substring(1));
            platosCant.push($('#cantidad'+checks[i].id.substring(5)).val());
            platosCantVal.push(parseFloat($('#cantidad'+checks[i].id.substring(5)).val()) * parseFloat($('#V'+checks[i].id.substring(5)).val()));
            console.log(platos+"-"+platosCant+"-"+platosCantVal);
        }
    }
    if(platos.length < 1){
        event.preventDefault();
        alert('La orden debe contener por lo menos un plato');
    }
    $('#input-array-platos').val(platos+"-"+platosCant+"-"+platosCantVal);
});


