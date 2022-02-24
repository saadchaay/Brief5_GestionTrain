// model add voyage

var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'Ajouter une voyage ' + recipient
  modalBodyInput.value = recipient
})


// canceled add voyage

var exampleModal = document.getElementById('exampleModalCanceled')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'Ajouter une voyage ' + recipient
  modalBodyInput.value = recipient
})

// Display result message

var alert_failed = document.getElementById("alert-failed");
var alert_success = document.getElementById("alert-success");

if(alert_failed.innerText == ""){
  alert_failed.setAttribute('style','display:none;');
} else {
  alert_failed.removeAttribute('style');
}

if(alert_success.innerText == ""){
  alert_success.setAttribute('style','display:none;');
} else {
  alert_success.removeAttribute('style');
}