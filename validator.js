function formSubmit() {
  var result = true;

  var fname = document.getElementById('firstName');
  if (fname.value == '') {
    showError('Please provide first name');
    result = false;
  }
}
