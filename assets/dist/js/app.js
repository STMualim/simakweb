
// Reload DataTable
function reloadTable(table)
{
  $(table).DataTable().one('draw', function (){
    $(table).DataTable().columns.adjust();
  }).ajax.reload(null, false);
}

// Tooltip
$('[data-toggle="tooltip"]').tooltip();

// On Loading Element
function loadingElementOn(el)
{
  $(el).LoadingOverlay("show", {
    background  : "rgba(0, 0, 0, 0.05)",
    image: "",
    imageAnimation: "2s rotate_right",
    fontawesome: "fas fa-circle-notch fa-spin",
    fontawesomeColor: "#FE6033",
    fontawesomeAutoResize: false,
    fontawesomeResizeFactor: 0.5,
  });
}

// On Loading Screen
function loadingScreenOn()
{
  $.LoadingOverlay("show", {
    background: "rgba(11, 105, 104, 0.8)",
    image: "",
    imageAnimation: "2s rotate_right",
    fontawesome: "fas fa-circle-notch fa-spin",
    fontawesomeColor: "#FE6033",
    fontawesomeAutoResize: false,
    fontawesomeResizeFactor: 0.5,
  });
}

// Off Loading Screen
function loadingScreenOff()
{
  $.LoadingOverlay("hide");
}

// Off Loading Element
function loadingElementOff(el)
{
  $(el).LoadingOverlay("hide", true);
}

// On Loading Tombol Simpan
function loadingBtnOn()
{
  $('.btn-loading')
  .prop('disabled', true)
  .prepend('<i class="bx bx-loader-alt bx-spin" id="iconSpin"></i>');
}

// Off Loading Tombol Simpan
function loadingBtnOff()
{
  $('.btn-loading').prop('disabled', false);
  $('#iconSpin').remove();
}

// Alert Sukses
function alertSukses(alert)
{
  toastr.success(alert);
}

// Alert Error
function alertError(alert)
{
  toastr.error(alert);
}

// Angka Random 6 Digits
function randNumb(min, max){
  return Math.floor(Math.random()*(max-min+1)+min);
}

// Tanggal Biasa Normal
function tgl(string)
{
  var p = string.split(/\D/g);
  return [p[2],p[1],p[0] ].join("-");
}

// Tanggal dan Jam
function tglJam(string)
{
  bulanIndo = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep' , 'Okt', 'Nov', 'Des'];
  date = string.split(" ")[0];
  time = string.split(" ")[1];
  tanggal = date.split("-")[2];
  bulan = date.split("-")[1];
  tahun = date.split("-")[0];
  return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun + " - " + time;
}

// Tanggal Indo
function tglIndo(string)
{
  bulanIndo = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep' , 'Okt', 'Nov', 'Des'];
  tanggal = string.split("-")[2];
  bulan = string.split("-")[1];
  tahun = string.split("-")[0];
  return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
}

// Step Content
// function stepContentValidate(step)
// {
//   var s = 1;
//
//   $('#btnStepNext').click(function(){
//     s += 1;
//
//     if (s <= step) {
//       $('.step-item').removeClass('active');
//       $('#stepItem'+s).addClass('active');
//
//       $('.step-content-wrapper').removeClass('active');
//       $('#stepContent'+s).addClass('active');
//
//       if (s > 1) {
//         $('#btnStepPrev').prop('disabled', false);
//       }
//       if (s == step) {
//         $('#btnStepNext').prop('disabled', true);
//         $('#btnSimpan').prop('disabled', false);
//       }
//     }
//   });
//
//   $('#btnStepPrev').click(function(){
//     s -= 1;
//
//     if (s <= step) {
//       $('.step-item').removeClass('active');
//       $('#stepItem'+s).addClass('active');
//
//       $('.step-content-wrapper').removeClass('active');
//       $('#stepContent'+s).addClass('active');
//
//       if (s < step) {
//         $('#btnStepNext').prop('disabled', false);
//         $('#btnSimpan').prop('disabled', true);
//       }
//       if (s == 1) {
//         $('#btnStepPrev').prop('disabled', true);
//       }
//     }
//   });
// }
