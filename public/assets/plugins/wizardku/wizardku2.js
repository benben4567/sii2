function validate1(val) {
  v1 = document.getElementById("file_penyusun");

  flag1 = true;

  if(val>=1 || val==0) {
    if(v1.value == "") {
      toastr.warning('Silakan pilih file!', 'Warning Alert', {timeOut: 3000});
      v1.style.borderColor = "red";
      flag1 = false;
    }
    else {
      v1.style.borderColor = "green";
      flag1 = true;
    }
  }


  flag = flag1 ;

  return flag;
}

function validate2(val) {
  v1 = document.getElementById("judul_sertifikat_pembelajaran");
  v2 = document.getElementById("tgl_mulai");
  v3 = document.getElementById("tgl_selesai");
  v4 = document.getElementById("file_sertifikat_pembelajaran");


  flag1 = true;
  flag2 = true;
  flag3 = true;
  flag4 = true;


  if(val>=1 || val==0) {
    if(v1.value == "") {
      // toastr.warning('Silakan isi judul !', 'Warning Alert', {timeOut: 3000});
      v1.style.borderColor = "red";
      flag1 = false;
    }
    else {
      v1.style.borderColor = "green";
      flag1 = true;
    }
  }
  if(val>=2 || val==0) {
    if(v2.value == "") {
      // toastr.warning('Silakan isi tanggal mulai !', 'Warning Alert', {timeOut: 3000});
      v2.style.borderColor = "red";
      flag2 = false;
    }
    else {
      v2.style.borderColor = "green";
      flag2 = true;
    }
  }
  if(val>=3 || val==0) {
    if(v3.value == "") {
      // toastr.warning('Silakan isi tanggal selesai !', 'Warning Alert', {timeOut: 3000});
      v3.style.borderColor = "red";
      flag3 = false;
    }
    else {
      v3.style.borderColor = "green";
      flag3 = true;
    }
  }

  if(val>=4 || val==0) {
    if(v4.value == "") {
      // toastr.warning('Silakan pilih file !', 'Warning Alert', {timeOut: 3000});
      v4.style.borderColor = "red";
      flag4 = false;
    }
    else {
      v4.style.borderColor = "green";
      flag4 = true;
    }
  }


  flag = flag1 && flag2 && flag3 && flag4;

  return flag;
}

function validate3(val) {
  v1 = document.getElementById("ijazah");

  flag1 = true;
  flag2 = true;

  if(val>=1 || val==0) {
    if(v1.value == "") {
      v1.style.borderColor = "red";
      flag1 = false;
    }
    else {
      v1.style.borderColor = "green";
      flag1 = true;
    }
  }

  flag = flag1;

  return flag;
}
function validate4(val) {
  flag1 = true;

  flag = flag1;

  return flag;
}

$(document).ready(function(){

  var current_fs, next_fs, previous_fs;

  $(".next").click(function(){

    str1 = "next1";
    str2 = "next2";
    str3 = "next3";
    str4 = "next4";

    if(!str1.localeCompare($(this).attr('id')) && validate1(0) == true) {
      val1 = true;
    }
    else {
      val1 = false;
    }

    if(!str2.localeCompare($(this).attr('id')) && validate2(0) == true) {
      val2 = true;
    }
    else {
      val2 = false;
    }

    if(!str3.localeCompare($(this).attr('id')) && validate3(0) == true) {
      val3 = true;
    }
    else {
      val3 = false;
    }
    if(!str4.localeCompare($(this).attr('id')) && validate4(0) == true) {
      val4 = true;
    }
    else {
      val4 = false;
    }

    if((!str1.localeCompare($(this).attr('id')) && val1 == true) || (!str2.localeCompare($(this).attr('id')) && val2 == true) || (!str3.localeCompare($(this).attr('id')) && val3 == true) || (!str4.localeCompare($(this).attr('id')) && val4 == true)) {
      current_fs = $(this).parent().parent();
      next_fs = $(this).parent().parent().next();

      $(current_fs).removeClass("show");
      $(next_fs).addClass("show");

      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      current_fs.animate({}, {
        step: function() {

          current_fs.css({
            'display': 'none',
            'position': 'relative'
          });

          next_fs.css({
            'display': 'block'
          });
        }
      });

    }
  });

  $(".prev").click(function(){

    current_fs = $(this).parent().parent();
    previous_fs = $(this).parent().parent().prev();

    $(current_fs).removeClass("show");
    $(previous_fs).addClass("show");

    $("#progressbar li").eq($("fieldset").index(next_fs)).removeClass("active");

    current_fs.animate({}, {
      step: function() {

        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });

        previous_fs.css({
          'display': 'block'
        });
      }
    });
  });

  // $('.radio-group .radio').click(function(){
  //   $('.selected .fa').removeClass('fa-check');
  //   $('.selected .fa').addClass('fa-circle');
  //   $('.radio').removeClass('selected');
  //   $(this).addClass('selected');
  //   $('.test').remove()
  //   var value = $('.selected').attr('value');
  //   console.log(value);
  //   $('#tahun_pengalaman').attr('value',value);
  //   $('.selected .fa').removeClass('fa-circle');
  //   $('.selected .fa').addClass('fa-check');
  // });



});
