$(init);
var table = null;

function init(){
    table = $('#cit').DataTable({"aLengthMenu": [[10,25,50,75,100],[10,25,50,75,100]],"iDisplaylength":15});
    
    //activiar la validacion del formulario 
     $(document).ready(function(){
    $('.datepicker').datepicker();
  });
    
    //Evento click del floatButton Agregar
    $('#add-record').on("click", function(){
        $('#pk').val('0');
    });
    //click del boton de guardar
    $('#guardar').on("click", function(){
        $('#frm-cursos').submit();// sumit sirbe para hacer ejecutar el validateform
    });


   
}
function validateForm(){
    $('#frm-cursos').validate({
        rules:{
            'tit':{
                required: true
                  },
            'descrip':{
                required: true //,
                //digits:true agregar solo digitos 
            }      
        },
        messages:{
            'tit':{
                required: 'Campo requerido '
                  },
            'descrip':{
                required: 'Campo Requerido '//,
                //digits: 'Ingrese solo numeros'
                       }
        },
        errorElement:"div",
        errorClass:"invalid",
        errorPlacement : function(error, element){
            error.insertAfter(element)
        },
        submitHandler: function(form){
            saveData();
        }
    });
}

function saveData(){
    var id = $('#pk').val();
    var sURL = '';
    var parametros ="";
    if(id>0){
        sURL = url_update;
        parametros =$("frm-cursos").serialize();
    }else{
        //es un Insert
        sURL = url_insert;
        parametros = new FormData($("#frm-cursos")[0]);
    }
    $.ajax({
        type: "post",
        url: sURL,
        contentType:false,
        processData:false,
//        dataType: 'json',
        data:parametros,// arma la caja de de conteniedo 
        success: function(response){
            if(response['status']){
                $('#pk').val('0');
                $('#tit').val('');
                $('#descrip').val('');
                $('#modalRegistro').modal('close');
                // en este codigo cerramos la ventana modal.
                Materialize.toast('Registro Guardado',5000);
                if(id>0){
                    setRow(response['data'], 'delete');
                    setRow(response['data'], 'insert');
                }else{
                    setRow(response['data'],'insert');
                }
            }
            else{
                Materialize.toast('Error de Guardado'+response,5000);
            }
        }
    });
    
    
}


function deleteData(id){
    $.ajax({
        type: "post",
        url: url_delete,
        dataType: 'json',
        data: { "pk":id },
        success: function(response){
            if(response['status']){
                Materialize.toast('Registro Eliminado',5000);
                setRow(response['data'], 'delete');
                    //setRow(response['data'], 'insert');
            }
            else{
                Materialize.toast('No se pudo eliminar '+response,5000);
            }
            
        },
        error: function(request,status,error){
          Materialize.toast('Error al eliminar ',5000);

        }
    });
     
}
//funcion para agregar o eliminar un renglon de la tabla 
function setRow(data,action){
    if(action === 'insert'){
        var row = table.row.add([
            data.tit,
            data.descrip,
            '<i class="material-icons edit" id-record="'+data.pk+'">create</i><i \n\
                 class="material-icons delete" id-record="'
                    +data.pk+'">delete_forever</i>'
            
        ]).draw().node();
        $(row).attr('id',data.pk);
        //hay que agregar el nuevo elemento al arreglo json categorias 
        cursos[data.pk]={
            "idcurso": data.pk,
            "titcurso": data.tit,
            "descripcioncurso": data.descrip,
        }
    }
    if(action === 'delete'){
        table.row('#'+data.pk).remove().draw();
    }
}