$(document).ready(function() {
    $("#bomon").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'idmon='+ id;    
		$.ajax({
			url: 'get_gvbm.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(empData) {
			   if(empData) {
					$("#errorMassage").addClass('hidden').text("hihihi");
					$("#recordListing").removeClass('hidden');
                    $("#gvId").text(empData.id);				
					$("#gvHoten").text(empData.hoten);
					$("#gvNgaysinh").text(empData.ngaysinh);
					$("#gvTrinhdo").text(empData.trinhdo);
					$("#gvSdt").text(empData.sdt);					
                    $("#gvEmail").text(empData.email);					
				} else {
					$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("Không tìm thấy!");
				}   	
			} 
		});
 	}) 
});
