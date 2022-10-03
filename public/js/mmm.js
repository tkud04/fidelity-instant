$(document).ready(() => {
  hideElem(['#track-popup-tnum-error']);

  let url = window.location.href;

  if(url.substring(url.length - 5) == "?xx=1"){
     hideElem('#signin-div');
     showElem('#signup-div');
  }
  else{
    hideElem('#signup-div');
    showElem('#signin-div');
 }

 $(document).ready(() => {
    $('.data-table').DataTable();
 });

  $('#signup-btn').click(e => {
        e.preventDefault();
        let fname = $('#signup-fname').val(), lname = $('#signup-lname').val(), 
        email = $('#signup-email').val(),
        pass = $('#signup-password').val(), pass2 = $('#signup-password2').val(),
        validation = fname == "" || lname == "" || email == "" || pass == "" || pass2 == "" || pass !== pass2;

        if(validation){
          alert("All fields are require and passwords must match");
        }
        else{
            $('#signup-form').submit();
        }
    });

    $('#login-btn').click(e => {
        e.preventDefault();
        let email = $('#login-email').val(), pass = $('#login-password').val(),
        validation = email == "" || pass == "";

        if(validation){
          alert("All fields are required");
        }
        else{
            $('#login-form').submit();
        }
    });

    $('#track-popup-submit').click(e => {
      e.preventDefault();
      hideElem('#track-popup-tnum-error');
      let tnum = $('#track-popup-tnum').val();

      if(tnum == ""){
        showElem('#track-popup-tnum-error');
      }
      else{
        window.location = `track?tnum=${tnum}`;
      }
    });

    $('#track-another-submit').click(e => {
      e.preventDefault();
      hideElem('#track-another-tnum-error');
      let tnum = $('#track-another-tnum').val();

      if(tnum == ""){
        showElem('#track-another-tnum-error');
      }
      else{
        window.location = `track?tnum=${tnum}`;
      }
    });

    $('#quote-btn').click(e => {
      e.preventDefault();
     // hideElem('#track-popup-tnum-error');
      let name = $('#name').val(),  email = $('#email').val()
      subject = $('#subject').val(),  description = $('#description').val();

      if(name == "" || email == "" || subject == "" || description == ""){
        //showElem('#track-popup-tnum-error');
        alert("Please fill allrequired fields");
      }
      else{
        //window.location = `track?num=${tnum}`;
      }
    });

    $('#add-tracking-submit').click(e => {
      e.preventDefault();
     // hideElem('#track-popup-tnum-error');
      let sname = $('#sname').val(), sadd = $('#sadd').val(),  sphone = $('#sphone').val(),
      rname = $('#rname').val(), radd = $('#radd').val(), rphone = $('#rphone').val();
      stype= $('#stype').val(), weight = $('#weight').val(), origin = $('#origin').val(), dest = $('#dest').val(),
      description = $('#description').val(), freight = $('#freight').val(), bmode = $('#bmode').val(), 
      mode = $('#mode').val(), trackingStatus = $('#tracking-status').val(), pickupAt = $('#pickup-at').val(),
      validation = (sname == "" || sphone == "" || sadd == "" ||
                    rname == "" || rphone == "" || radd == "" ||
                    stype == "" || weight == "" || origin == "" || dest == "" ||
                    description == "" || freight == "" || bmode == "none" || mode == "" ||
                    trackingStatus == "none" || pickupAt == ""
                   );

      if(validation){
        Swal.fire({
          icon: 'error',
                title: "Please fill all required fields."
              });
      }
      else{
        $('#add-tracking-form').submit();
      }
    });

    $('#add-tracking-history-submit').click(e => {
      e.preventDefault();
     // hideElem('#track-popup-tnum-error');
      let location = $('#h-location').val(), status = $('#h-status').val(),  remarks = $('#h-remarks').val(),
      validation = (location == "" || status == "none" || remarks == "");

      if(validation){
        Swal.fire({
          icon: 'error',
                title: "Please fill all required fields."
              });
      }
      else{
        $('#add-tracking-history-form').submit();
      }
    });

    $('#add-plugin-submit').click(e => {
      e.preventDefault();
     // hideElem('#track-popup-tnum-error');
      let name = $('#pname').val(), value = $('#pvalue').val(),
      validation = (name == "" || value == "");

      if(validation){
        Swal.fire({
          icon: 'error',
                title: "Please fill all required fields."
              });
      }
      else{
        $('#add-plugin-form').submit();
      }
    });

    $('#edit-plugin-submit').click(e => {
      e.preventDefault();
     // hideElem('#track-popup-tnum-error');
      let name = $('#pname').val(), value = $('#pvalue').val(),  status = $('#pstatus').val(),
      validation = (name == "" || value == "" || status == "none");

      if(validation){
        Swal.fire({
          icon: 'error',
                title: "Please fill all required fields."
              });
      }
      else{
        $('#edit-plugin-form').submit();
      }
    });
});

function removeStudent(c,s){
   let sure =  confirm("Are you sure? Press OK to cintinue");
   if(sure){
     window.location = `remove-student?class_id=${c}&student_id=${s}`;
   }
   else{}
}