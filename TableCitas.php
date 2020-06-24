<?php
   include_once("./Utilerias/database_utilerias.php");
   $result = consultaCita();
   if ($result === false) die("failed");
      
        print "<div class='row'>
               <div class='col s12 m8 offset-m2'>
                 <div class='card'>
            <!--Contenedor--> 
               <!--Creamos un contenedor donde dentro de el crearemos la lista de los cursos.-->
                  <div class='card-content'>
                 <h2><span>Citas</span></h2>
                
               <table id='cit' class='highlight bordered dataTable'>
               <thead>
                   <tr>
                   <th>NomPersona</th>
                   <th>FechaCita</th>
                   <th>HoraCita</th>
                   <th>NomLocacion</th>
                   <td></td>
                   <td></td>
                   </tr></thead><tbody>";
               
   while (!$result->EOF) {
       $id=$result->fields['idCita'];
       $nom=$result->fields['NomPersona'];
       $DateU=$result->fields['FechaCita'];
       $TimeDateu=$result->fields['HoraCita'];
      // $Status=$result->fields['Status'];
       $Location=$result->fields['NomLocacion'];
       $User=$result->fields['NomUsuario'];

    
       print"<tr>
             
             <td>$nom</td>
             <td>$DateU</td>
             <td>$TimeDateu</td>
             <td>$Location</td>
           
             
             <td>
             <a href='#' id='add-record' data-id='$id'class='btn-floating btn-large waves-effect waves-light right'>
                  <i class='material-icons'>✔</i>
              </a> 
              <a href='#' id='add-record1' data-id='$id'class='btn-floating btn-large waves-effect waves-light red'>
                  <i class='material-icons'>✘</i>
              </a> 
             </td></tr>"; 
     
        $result->MoveNext();
      
   }

    print"</tbody></table></div></div></div></div>";

  // print "</div></div></div></div>"

 ?>