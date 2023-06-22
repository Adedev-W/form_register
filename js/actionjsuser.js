

document.getElementById("submitbtn").addEventListener("click", function(event) {
  var form = document.getElementById('form-one');
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
	      title: "Are you sure?",
	      text: "You will not be able to recover this imaginary file!",
	      icon: "warning",
	      buttons: [
	        'No, cancel it!',
	        'Yes, I am sure!'
	      ],
	      dangerMode: true,
	    }).then(function(isConfirm) {
	      if (isConfirm) {
	        swal({
	          title: 'Shortlisted!',
	          text: 'Candidates are successfully shortlisted!',
	          icon: 'success'
	        }).then(function() {
	           form.submit(); // <--- submit form programmatically
	        });
	      } else {
	        swal("Cancelled", "Your imaginary file is safe :)", "error");
	      }
	    })
  }
    
});



function swal_save_js() {
  swal({
    closeonclickoutside: false,
    icon: "success",
    text: "Data berhasil disimpan",
    classname: "bg-light",
    buttons: {
      confirm: {
        classname: "confirm btn btn-primary"
      }
    }
  })
	
}

