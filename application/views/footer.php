    <footer class="footer">
      <div class="container">
      <div class="center-block col-xs-12 col-md-12 ">
          © <?= date('Y') ?> Copyright: <a href="http://www.cargar.co"> AppVirtualSchool</a></div>

</div>
      </div>
    </footer>



<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?> "></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?> "></script>
<script src="<?php echo base_url('assets/js/bootstrap.js'); ?> "></script>
<script src="<?php echo base_url('assets/js/alertify.min.js'); ?> "></script>
<script>
  jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
})
</script>
<?php 
$uri = $this->uri->segment(1);
switch ($uri) {
  case 'institucion':?>

<script src="<?= base_url('assets/js/institucion/institucion.js');?> " ></script><?php 
    break;
    case 'alumno':?>
<script src="<?= base_url('assets/js/alumno/alumno.js');?> " ></script><?php 
      break;
      case 'cuenta':?>
<script src="<?= base_url('assets/js/account/cuentas.js');?> " ></script><?php 
      break;
      case 'servicio':?>
<script src="<?= base_url('assets/js/services/servicio.js');?> " ></script><?php 
      break;
        case 'contacto':?>
<script src="<?= base_url('assets/js/contact/contacto.js');?> " ></script><?php 
      break;
         case 'empleado':?>
<script src="<?= base_url('assets/js/employee/empleado.js');?> " ></script><?php 
      break;
  default:
    # code...
    break;
} ?>



</body>

</html>