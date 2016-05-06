<footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b>Version</b> 2.3.2
	</div>
    
	<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
	reserved.
</footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
{!! HTML::script ('admintheme/plugins/jQuery/jQuery-2.1.4.min.js') !!}
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
{!! HTML::script ('https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js') !!}

<script>
   $(document).ready(function(){
       $('#example').DataTable();
       $("#empform").validate();
       $("#empformedit").validate();
        
       /***************************** News Section *******************************************/
		$(".newsid").click(function(){
			var id = $(this).attr('data-id');
			var url = "{{ url() }}/news/"+id;
			$.ajax({
					type: "GET",
					url: url,
					data: {	newsid : id},
					success: function(response) {
						$('#myModal1 #newsid').val(response[0].id);
						$('#myModal1 #title').val(response[0].title);
						$('#myModal1 #description').val(response[0].description);
						$('#myModal1 #type').val(response[0].type);
					},
					error: function(response) {
						alert("not done");
						console.log(response);
					}
			});
		});
		$(".newsdeleteid").click(function(){
			var id = $(this).attr('data-id');
			var url = "{{ url() }}/delnews/"+id;
			$.ajax({
					type: "GET",
					url: url,
					 async: false,
					data: {	newsdelid : id},
					success: function(response) {
						alert("Recored Deleted");
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert("not done");
						console.log(jqXHR);
						console.log(textStatus);
						console.log(errorThrown);
					}
			});
		});
   /***************************** Employee Section *******************************************/
                $(".empeditid").click(function(){
			var id = $(this).attr('data-id');
			var url = "{{ url() }}/emp/"+id;
                        var editurl = "{{ url() }}/editurl";
                        
			$.ajax({
                            type: "GET",
                            url: url,
                            data: {empeditid : id},
                            success: function(response) {
                                    $('#myModal1 #emp_id').val(response[0].id);
                                    $('#myModal1 #name').val(response[0].name);
                                    $('#myModal1 #email').val(response[0].email);
                                    $('#myModal1 #password').val(response[0].password);
                                    $('#myModal1 #content').val(response[0].content);
                                    var gen = response[0].gender;
                                    
                                    if(gen == 'M'){
                                        $('#myModal1 #female').removeAttr('checked');
                                        $('#myModal1 #male').prop('checked',true);
                                    }else if(gen == 'F'){
                                        $('#myModal1 #male').removeAttr('checked');
                                        $('#myModal1 #female').prop('checked',true);
                                    }else{
                                        $('#myModal1 #male').removeAttr('checked');
                                        $('#myModal1 #female').removeAttr('checked');
                                    }
                                    var sub = response[0].subscription;
                                    if(sub == "1"){
                                        $('#myModal1 #subscription').attr('checked',"checked");
                                    }
                                    $('#myModal1 #type').val(response[0].type);
                                    
                                    var file = response[0].photo;
                                    if(file != "0"){
                                        
                                        $('#myModal1 .fileupload input').css("display","none");                                        
                                        $("#myModal1 .fileupload .imguploaddiv").remove();
                                        $('#myModal1 .fileupload').append("<input type='hidden' id='oldphoto' name='oldphoto' value='"+file+"'>");  
                                        $('#myModal1 .fileupload').append("<div class='imguploaddiv'><input type='hidden' id='oldimg' name='oldimg' value='"+file+"'> <img src='app/uploads/"+file+"' height='100px' width='100'><input type='button' class='fileremovebtn' value='Remove Image'></div>");
                                    }
                            },
                            error: function(response) {
                                    alert("not done");
                                    console.log(response);
                            }
			});
		});
		$(".empdeleteid").click(function(){
                    	var id = $(this).attr('data-id');
			var url = "{{ url() }}/delemp/"+id;
                        $.ajax({
                                type: "GET",
                                url: url,
                                async: false,
                                data: {	empdelid : id },
                                success: function(response) {
                                    location.reload();
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    alert("not done");
                                }
			});
		});
         });
         
        $(document).on('click', "#myModal1 .fileupload .fileremovebtn", function() {
           $("#myModal1 .fileupload .imguploaddiv").remove();
           $('#myModal1 .fileupload input').css("display","block");
        });
</script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
{!! HTML::script ('admintheme/bootstrap/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! HTML::script ('admintheme/plugins/morris/morris.min.js') !!}
<!-- Sparkline -->
{!! HTML::script ('admintheme/plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! HTML::script('admintheme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! HTML::script ('admintheme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! HTML::script('admintheme/plugins/knob/jquery.knob.js') !!}
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
{!! HTML::script ('admintheme/plugins/daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
{!! HTML::script ('admintheme/plugins/datepicker/bootstrap-datepicker.js') !!}
<!-- Bootstrap WYSIHTML5 -->
{!! HTML::script ('admintheme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
{!! HTML::script ('admintheme/plugins/slimScroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! HTML::style ('admintheme/plugins/fastclick/fastclick.js') !!}
<!-- AdminLTE App -->
{!! HTML::script ('admintheme/dist/js/app.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! HTML::script ('admintheme/dist/js/pages/dashboard.js') !!}
<!-- AdminLTE for demo purposes -->
{!! HTML::script ('admintheme/dist/js/demo.js') !!}
