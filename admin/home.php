
<!-- <div class="container"> -->
	<div class="alert alert-warning">
		<p>Selmat datang admin</p>

 	</div>
      <form class="contact100-form validate-form" id="whatsapp">
        <span class="contact100-form-title">Order via WA</span>
        <input class="tujuan" type="hidden" id="noAdmin">
        <div class="wrap-input100">
          <span class="label-input100">Nama</span>
          <label>
          <input class="input100 nama" type="text" placeholder="Masukkan nama Anda">
          </label>
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100">
          <span class="label-input100">Nomor WhatsApp</span>
          <label>
          <input class="input100 nowhatsapp" type="text" placeholder="08xxxxxxxxxx">
          </label>
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100">
          <span class="label-input100">Alamat</span>
          <label>
          <textarea class="input100 alamat" placeholder="Masukkan alamat lengkap Anda"></textarea>
          </label>
          <span class="focus-input100"></span>
        </div>
        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <a class="contact100-form-btn submit">Kirim</a>
          </div>
        </div>
      </form>

      <script type="text/javascript">
      	//no wa admin
  $("#noAdmin").val("08979655692");
  $('.whatsapp-btn').click(function () {
    $('#whatsapp').toggleClass('toggle');
  });
  // Onclick Whatsapp Sent!
  $('#whatsapp .submit').click(WhatsApp);
  $("#whatsapp input, #whatsapp textarea").keypress(function () {
    if (event.which == 13) WhatsApp();
  });
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  function WhatsApp() {
    var ph = '';
    if ($('#whatsapp .nama').val() == '') { // Cek Nama
      ph = $('#whatsapp .nama').attr('placeholder');
      alert('Silahkan tulis ' + ph);
      $('#whatsapp .nama').focus();
      return false;
    } else if ($('#whatsapp .nowhatsapp').val() == '') { // Cek Whatsapp
      ph = $('#whatsapp .nowhatsapp').attr('placeholder');
      alert('Silahkan tulis ' + ph);
      $('#whatsapp .nowhatsapp').focus();
      return false;
    } else if ($('#whatsapp .alamat').val() == '') { // Cek Alamat
      ph = $('#whatsapp .alamat').attr('placeholder');
      alert('Silahkan tulis ' + ph);
      $('#whatsapp .alamat').focus();
      return false;
    } else {
      // Check Device (Mobile/Desktop)
      var url_wa = 'https://web.whatsapp.com/send';
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        url_wa = 'whatsapp://send/';
      }
      // Get Value
      var tujuan = $('#whatsapp .tujuan').val(),
        via_url = location.href,
        nama = $('#whatsapp .nama').val(),
        nowhatsapp = $('#whatsapp .nowhatsapp').val(),
        alamat = $('#whatsapp .alamat').val();
      $(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text=Nama: ' + nama + ' %0ANo. Whatsapp: ' + nowhatsapp + '%0AAlamat: ' + alamat + ' %0A%0Avia ' + via_url);
      var w = 960,
        h = 540,
        left = Number((screen.width / 2) - (w / 2)),
        tops = Number((screen.height / 2) - (h / 2)),
        popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
      popupWindow.focus();
      return false;
    }
  }
      </script>
<!-- </div> -->