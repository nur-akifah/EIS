$( document ).ready(function() {
	//untuk memanggil plugin select2
    $('#provinsi').select2({
	  	placeholder: 'Select Line',
	  	language: "id"
	});
	$('#kota').select2({
	  	placeholder: 'Select Material',
	  	language: "id"
	});

	//saat pilihan line di pilih maka mengambil data di data-wilayah menggunakan ajax
	$("#provinsi").change(function(){
	      $("img#load1").show();
	      var id_line = $(this).val(); 
	      $.ajax({
	         type: "POST",
	         dataType: "html",
	         url: "data-wilayah.php?jenis=kota",
	         data: "id_line="+id_line,
	         success: function(msg){
	            $("table#kota").html(msg);                   
	            $("img#load1").hide();
	            getAjaxKota();                                                    
	         }
	      });                    
     });  

	$("#kota").change(getAjaxKota);
     function getAjaxKota(){
          $("img#load2").show();
          var id_material = $("#kota").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "data-wilayah.php?jenis=kecamatan",
             data: "id_material="+id_material,
             success: function(msg){
                $("table#kecamatan").html(msg);                              
                $("img#load2").hide(); 
               getAjaxKecamatan();                                                    
             }
          });
     }


});