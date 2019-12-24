var query;
var modal = document.getElementById("modalResize");
var btn = document.getElementById("btn");
var span = document.getElementsByClassName("close")[0];

function moosend(query){
    var jsonString = JSON.stringify(query);
    console.log(jsonString);
    $.ajax({
    type: "POST",
    url: "./ajax.php",
    data: {jsonString},
    cache: false,
    success: function(data){
        createCookie('inspect', data, 1);
        window.location.reload(false);
    }

});
}  

function inspect(){
    $(".container").click(function(){
        query=$(this).attr('id');
        //alert( $(this).attr('id'));
        moosend(query);
    })
}
function inspectcart(){
    $(".row").click(function(){
        query=$(this).attr('id');
        //alert( $(this).attr('id'));
        moosend(query);
    })
}
function createCookie(name, value, days) { 
    var expires; 
    if (days) { 
        var date = new Date(); 
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        expires = "; expires=" + date.toGMTString(); 
    } 
    else{ 
        expires = ""; 
    } 
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/"; 
} 

function uploadBut(){
    $(function(){
        $("#upimg").click(function () {
            $("#userImagePath1").trigger('click');
       });
    });
    
}

var arrMas = [];


$(document).on("change", "input[name='view']", function () {
    var checked = $(this).val();
    console.log(checked);
    if($(this).is(':checked')){
        arrMas.push(checked);
    }
    else{
        arrMas.splice($.inArray(checked,arrMas),1);
    }
});


// $("input[name='checkbox']").change(function(){
//     var checked = $(this).val();
//     console.log(checked);
//     if($(this).is(':checked')){
//         arrMas.push(checked);
//         alert(arrMas);
//     }
//     else{
//         arrMas.splice($.inArray(checked,arrMas),1);
//     }
// });
function send(){
    var jsonStringArr = JSON.stringify(arrMas);
    console.log(jsonStringArr);
    $.ajax({
    type: "POST",
    url: "./ajax.php",
    data: {jsonStringArr},
    cache: false,
    success: function(data){
        window.location.reload(false);
    }
});
}

function deleteOrder(){
    var jsonStr = JSON.stringify(arrMas);
    console.log(jsonStr);
    $.ajax({
    type: "POST",
    url: "./ajax.php",
    data: {jsonStr},
    cache: false,
    success: function(data){
        window.location.reload(false);
    }
});
}  


function proveOrder(){
    var jsonProve = JSON.stringify(arrMas);
    console.log(jsonProve);
    $.ajax({
    type: "POST",
    url: "./ajax.php",
    data: {jsonProve},
    cache: false,
    success: function(data){
        window.location.reload(false);
    }
});
}  


function deletePhoto(){
    var jsonPhoto = JSON.stringify(arrMas);
    console.log(jsonPhoto);
    $.ajax({
    type: "POST",
    url: "./ajax.php",
    data: {jsonPhoto},
    cache: false,
    success: function(data){
        window.location.reload(false);
    }
});
}  
