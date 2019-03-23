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
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}


// Install input filters.
setInputFilter(document.getElementById("phone"), function(value) {
  return /^\d*$/.test(value); });
  setInputFilter(document.getElementById("nama_wali"), function(value) {
    return /^\D*$/.test(value); });
function enabledisabletext()
{
	if(document.form.pilihan.value=='lain')
	{
	document.form.keterangan.disabled=false;
	}
	else
	{
	document.form.keterangan.disabled=true;
	}
}

function enabledisabletextwali()
{
	if(document.form.status_wali.value=='lain_wali')
	{
	document.form.keterangan_wali.disabled=false;
	}
	else
	{
	document.form.keterangan_wali.disabled=true;
	}
}
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
