var alert_failed = document.getElementById("alert-failed");

if(alert_failed.innerText == ""){
  alert_failed.setAttribute('style','display:none;font-size:.8em;');
} else {
  alert_failed.removeAttribute('style');
}
