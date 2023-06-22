document.getElementById("btnsubmit").addEventListener("click", function(event) {
  var form = document.getElementById('form-two');
  var errors = [];
  var inputs = document.querySelectorAll("input");
  inputs.forEach(function(input) {
    if (input.value.trim() === "") {
      input.classList.add("is-invalid");
      errors.push("error");
    } else {
      input.classList.remove("is-invalid");
      errors.splice(0, errors.length);
    }
  });
  
  var inputp = document.querySelectorAll("select");
  inputp.forEach(function(inputi) {
    if (inputi.value.trim() === "Pilih") {
      inputi.classList.add("is-invalid");
      errors.push("error");
    } else {
      inputi.classList.remove("is-invalid");
      errors.splice(0, errors.length);
    }
  });

  
 
  
  
  if (errors.length > 0) {
	  event.preventDefault();
  } else {
  	  event.preventDefault();
		swal({
	      title: "Apa Kami Yakin?",
	      text: "Data kamu akan disimpan, pastikan data sudah benar sebelum dikirim!",
	      icon: "warning",
	      buttons: [
	        'OK',
	        'CANCEL'
	      ],
	      dangerMode: true,
	    }).then(function(isConfirm) {
	      if (isConfirm) {
	        swal({
	          title: 'Berhasil!',
	          text: 'Data berhasil disimpan!',
	          icon: 'success'
	        }).then(function() {
	           form.submit(); // <--- submit form programmatically
	        });
	      } else {
	        swal("Gagal!", "Data gagal disimpan!", "error");
	      }
	    })
  }

  
	  
});
document.getElementById("por").addEventListener("click", function(event) {
  var errors = [];
  var inputs = document.querySelectorAll("input");
  inputs.forEach(function(input) {
    if (input.value.trim() === "") {
      input.classList.add("is-invalid");
      errors.push("error");
    } else {
      input.classList.remove("is-invalid");
      errors.splice(0, errors.length);
    }
  });
  
  var inputp = document.querySelectorAll("select");
  inputp.forEach(function(inputi) {
    if (inputi.value.trim() === "Pilih") {
      inputi.classList.add("is-invalid");
      errors.push("error");
    } else {
      inputi.classList.remove("is-invalid");
      errors.splice(0, errors.length);
    }
  });

  
 
  
  
  if (errors.length > 0) {
	  event.preventDefault();
  } 
});

function swal_send_js() {
  swal({
    closeonclickoutside: false,
    icon: "warning",
    text: "Ada data yang kosong, silahkan periksa lagi",
    classname: "bg-light",
    buttons: {
      confirm: {
        classname: "confirm btn btn-primary"
      }
    }
  })
	
}

function swal_fail_js() {
  swal({
    closeonclickoutside: false,
    icon: "warning",
    text: "Nama siswa sudah digunakan, silahkan periksa lagi",
    classname: "bg-light",
    buttons: {
      confirm: {
        classname: "confirm btn btn-primary"
      }
    }
  })
	
}

