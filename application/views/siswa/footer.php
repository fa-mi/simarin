<footer>
  <div class="pull-right">
    @ Made By Fahmi Aquinas
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<script language="javascript">
function enabledisabletext()
{
	if(document.form.pilihan.value=='lain')
	{
	document.form.text.disabled=false;
	}
	else
	{
	document.form.text.disabled=true;
	}
}
</script>
<script type="text/javascript">

$(function(){

$.ajaxSetup({
 type:"post",
 cache:false,
 dataType: "json"
})



$(document).on("click",".update",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"update",
   text:"Masukkan nama industri",
   type: "input",
   showCancelButton: true,
   confirmButtonText: "update",
   closeOnConfirm: true,
   inputPlaceholder: "Nama Industri"
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/update'); ?>",
     data:{id:id},
     type: "POST",
    });
 });

});

$(document).on("click",".konfirmasi",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Konfirmasi",
   text:"Yakin akan konfirmasi siswa ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "konfirmasi",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/konfirmasi'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();

       });

     }
    });
    location.reload();
 });

});

$(document).on("click",".hapus-industri",function(){
 var id=$(this).attr("data-id");
 swal({
   title:"Hapus Industri",
   text:"Yakin akan menghapus data ini?",
   type: "warning",
   showCancelButton: true,
   confirmButtonText: "Hapus",
   closeOnConfirm: true,
 },
   function(){
    $.ajax({
     url:"<?php echo base_url('c_admin/delete'); ?>",
     data:{id:id},
     success: function(){
       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
         $(this).remove();
       });
     }
    });
 });
});

});

</script>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>assets/dashboard/build/js/custom.min.js"></script>
</body>
</html>
