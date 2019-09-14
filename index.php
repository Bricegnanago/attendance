<?php

//index.php

include('header.php');

?>

<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header">
      <div class="row">
        <div class="col-md-9">Overall Student Attendance Status</div>
        <div class="col-md-3" align="right">
          
        </div>
      </div>
    </div>
  	<div class="card-body">
  		<div class="table-responsive">
			<table class="table table-striped table-bordered" id="student_table">
			  <thead>
			    <tr>

			      <th>Student Name</th> //Nom Complet
			      <th>Roll Number</th> //a supprimer
			      <th>Grade</th> // Niveau de classe
			      <th>Attendance Percentage</th> // Statistique de presence
			      <th>Report</th> // Etat
			    </tr>
			  </thead>
			  <tbody>
				//Ici sera appelé le l'information depuis la base de données transmit par ajax
			  </tbody>
			</table>
 		</div>
  	</div>
  </div>
</div>

</body>
</html>

<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="css/datepicker.css" />

<style>
    .datepicker
    {
      z-index: 1600 !important; /* has to be larger than 1050 */
    }
</style>

//debut modal de creation de reporting
<div class="modal" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Make Report</h4> // Faire un etat
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <div class="input-daterange">
		//Input date de debut!
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
            <span id="error_from_date" class="text-danger"></span>
            <br />
		//Input date de fin!
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
            <span id="error_to_date" class="text-danger"></span>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
	//On attribut une valeur au champ quand on clique sur un bouton report du tableau
        <input type="hidden" name="student_id" id="student_id" /> 
	//Il crée un report
        <button type="button" name="create_report" id="create_report" class="btn btn-success btn-sm">Create Report</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
	    

    </div>
  </div>
	//fin modal de creation de reporting
</div>


<script>
$(document).ready(function(){
//Initialisation du plugin Datatable
  var dataTable = $('#student_table').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"attendance_action.php", //fichier traitant avec la BD 
      type:"POST",
      data:{action:'index_fetch'}
    }
  });

  $('.input-daterange').datepicker({
    todayBtn:"linked", // initialise à la date du jour
    format:"yyyy-mm-dd", //dd-mm-yyyy - Jour mois année
    autoclose:true, //se ferme automatiquement
    container: '#formModal modal-body' //entourer le select de la div modal-body 
  });

	//au clique sur le bouton report
  $(document).on('click', '.report_button', function(){
    var student_id = $(this).attr('id');// on recuperer l'id du bouton cliqué
    $('#student_id').val(student_id); // 
    $('#formModal').modal('show'); // au clique on affiche un modal
  });

  $('#create_report').click(function(){
    var student_id = $('#student_id').val();  
    var from_date = $('#from_date').val(); // on initialise à null date debut
    var to_date = $('#to_date').val();  // on initialise à null date fin 
    var error = 0;
    if(from_date == '')
    {
      $('#error_from_date').text('From Date is Required');//Date fin est requis
      error++;
	// on retourne une erreur au cas où la date debut est vide
    }
    else
    {
      $('#error_from_date').text('');
    }
    if(to_date == '')
    {
      $('#error_to_date').text('To Date is Required'); // Date debut est requis 
      error++;
	// on retourne une erreur au cas où la date debut est vide
    }
    else
    {
      $('#error_to_date').text(''); //aucun problème signalé à ce niveau
    }

    if(error == 0)
    {
	//aucun problème signalé au niveau du formulaire
      $('#from_date').val(''); //
      $('#to_date').val('');
      $('#formModal').modal('hide'); //on ferme le modal et on affiche 
      window.open("report.php?action=student_report&student_id="+student_id+"&from_date="+from_date+"&to_date="+to_date);
    }
  });

});
</script>
