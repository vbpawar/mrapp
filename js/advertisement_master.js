display_advertisementMaster();
fetch_companies();
//for display data of advertisement Master
$('#companyId').select2({
    allowClear: true,
    placeholder: "Select Company Name"
});
$('#Atype').select2({
    allowClear: true,
    placeholder: "Select Type"
});
$('.jqte-test').jqte();

// settings of status
var jqteStatus = true;
$(".status").click(function()
{
  jqteStatus = jqteStatus ? false : true;
  $('.jqte-test').jqte({"status" : jqteStatus})
});

function display_advertisementMaster(){
    $.ajax({
        type:'GET',
        url:api_url+'display_advertisementMaster.php',
        dataType:'json',
       success:function(response){
         if(response.Responsecode==200){
           var count = response.Data.length;
           var tblhtml = '',badge='';
           for(var i=0;i<count;i++){
               if(response.Data[i].isActive == 0){
                badge = '<td><a  class="badge badge-pill badge-warning" title="click to activate" href="#" onclick="activateId(\''+response.Data[i].adId+'\',\''+response.Data[i].isActive+'\')">in active</a></td>';
               }else{
                badge = '<td><a  class="badge badge-pill badge-success" title="Click to inactivate" href="#" onclick="inactivateId(\''+response.Data[i].adId+'\',\''+response.Data[i].isActive+'\')">active</a></td>';
               }
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response.Data[i].title+'</td>';
            tblhtml += '<td>'+getDate(response.Data[i].startDate)+'</td>';
            tblhtml += '<td>'+getDate(response.Data[i].endDate)+'</td>';
            tblhtml += '<td>'+response.Data[i].companyName+'</td>';
            tblhtml += badge;
            tblhtml += '<td>';
            tblhtml += '<a class="btn" href="#" title="Edit The Details" onclick="editCompanyData('+response.Data[i].adId +')"><i class="fa fa-edit"></i></a>';
            tblhtml += '<a class="btn" href="#" title="Edit The Details" onclick="removeCompanyData('+response.Data[i].adId +')"><i class="fa fa-trash"></i></a>';
            tblhtml += '</td>';
        }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
     }
    });
}

//add new advertisement master button and hide the table and button and load advertisement master page
$('#addAdvertisement').on('click',function(event){
event.preventDefault();
$('#addnewads').show();
$('#companyTable').hide();
$("#addbtnshow").show();
$("#updatebtnshow").hide();
$("#upimgshow").hide();
$("#upimgshow1").hide();
// $('#addAdvertisement').hide();
$("#adId").val("");
$("#companyId").val("").trigger('change');
$('#addTitle').val("");
// $('#videoUrl').val("");
$("#texthtml").html("");
$("#htmlDetails").val("");
$('#Atype').val("").trigger('change');
$('#duration').val("");
$('#startDate').val("");
$('#endDate').val("");

$("#disphtml").hide();
});

function editCompanyData(adId){
$('#companyTable').hide();
$('#addnewads').show();
$("#setimage").attr("src","http://esmartsolution.in/mrapp/adimages/"+adId+".jpg");
$("#addbtnshow").hide();
$("#updatebtnshow").show();
$("#upimgshow").show();
$("#upimgshow1").show();
$("#adId").val(adId);
$.ajax({
    type:'GET',
    url:api_url+'fetch_advertisement_details.php',
    dataType:'json',
    data:{adId:adId},
    success:function(response){
      // console.log(response);
      // console.log(response.htmlDetails);
       $("#companyId").val(response.companyId).trigger('change');
       $('#addTitle').val(response.title);
       // $('#videoUrl').val(response.videoUrl);
        $('#Atype').val(response.type).trigger('change');
       if(response.type=="1"){
         $("#disphtml").show();
         $("#texthtml").html(response.htmlDetails);
         $("#htmlDetails").val(response.htmlDetails);
       }
       else{
         $("#disphtml").hide();
       }



       $('#duration').val(response.duration);
       $('#startDate').val(response.startDate);
       $('#endDate').val(response.endDate);
   }
});
}
function activateId(adId,param){
    var r = confirm('Are you sure to Activate this id');
    if(r == true){
        $.ajax({
            url:api_url+'in_activeAdvertisement.php',
            type:'POST',
            dataType:'json',
            data:{adId:adId,param:param},
            success:function(response){
                 if(response.Responsecode==200){
                alert(response.Message);
                display_advertisementMaster();
              }
            }
        });
    }
}
function inactivateId(adId,param){
    var r = confirm('Are you sure to in Activate this id');
    if(r == true){
        $.ajax({
            url:api_url+'in_activeAdvertisement.php',
            type:'POST',
            dataType:'json',
            data:{adId:adId,param:param},
            success:function(response){
                 if(response.Responsecode==200){
                alert(response.Message);
                display_advertisementMaster();
              }
            }
        });
    }
}
//Registration of new Advertisement
$('#addAdvertisementPage').on('click',function(event){
// $('#addAdvertisementPage').on('submit',function(event){
    event.preventDefault();
    var htmldetails = document.getElementById('htmlDetails').value;
    // console.log(htmldetails);
    // document.getElementById('videoUrl').value;
    var video ="";
    var registerData ={
        addTitle:document.getElementById('addTitle').value,
        videoUrl:video,
        htmlDetails:htmldetails,
        companyId:document.getElementById('companyId').value,
        revenueCode:"0",
        // document.getElementById('revenueCode').value,
        Atype:document.getElementById('Atype').value,
        duration:document.getElementById('duration').value,
        startDate:document.getElementById('startDate').value,
        endDate:document.getElementById('endDate').value
    };
$.ajax({
    type:'POST',
    url:api_url+'add_advertisement.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       if(response.Responsecode==200){
         alert(response.Message);
         display_advertisementMaster();
         $('#companyTable').show();
         $('#addnewads').hide();
         // $('#addAdvertisement').show();
       }
   }
});
});
function changetype(){
  var type=$("#Atype").val();

  if(type=="1"){
      // console.log(type);
      $("#disphtml").show();
  }
  else{
  $("#disphtml").hide();
  }
}
//Update of company_master
$('#updateAdvertisementPage').on('click',function(event){
    event.preventDefault();
    var adid=$('#adId').val();
    var video ="";
    var registerData ={
        adId:$('#adId').val(),
        addTitle:document.getElementById('addTitle').value,
        videoUrl:video,
        htmlDetails:document.getElementById('htmlDetails').value,
        companyId:document.getElementById('companyId').value,
        revenueCode:"0",
        // document.getElementById('revenueCode').value,
        Atype:document.getElementById('Atype').value,
        duration:document.getElementById('duration').value,
        startDate:document.getElementById('startDate').value,
        endDate:document.getElementById('endDate').value
    };

$.ajax({
    type:'POST',
    url:api_url+'update_advertisement.php',
    dataType:'json',
    data:registerData,
   success:function(response){
      if(response.Responsecode==200){
       alert(response.Message);
       imgup(adid);
       display_advertisementMaster();
       $('#companyTable').show();
       $('#addnewads').hide();
     }
   }
});
});
function removeCompanyData(id){
  $.ajax({
      url:api_url+'removeadvertisement.php',
      type:'POST',
      data:{
        deleteId:id
      },
      dataType:'json',
      success:function(response){
        // console.log(response);
        if(response.Responsecode==200){
          alert(response.Message);
          display_advertisementMaster();
        }
      }
    });
}
function fetch_companies(){
    $.ajax({
        type:'GET',
        url:api_url+'fetch_companyId.php',
        success:function(response){
          var count = response.Data.length;
          var opt ='<option value="">Select Company Name</option>';
          for(var i=0;i<count;i++){
            opt+="<option value="+response.Data[i].companyId+">"+response.Data[i].companyName+"</option>";
          }
          $('#companyId').html(opt);
       }
    });
}
function fetch_revenueCode(){
    $.ajax({
        type:'GET',
        url:api_url+'fetch_revenueCode.php',
       success:function(response){
         var count = response.length;
         var opt ='<option value="">Select Revenue Code</option>';
         for(var i=0;i<count;i++){
           opt+="<option value="+response[i].companyId+">"+response[i].companyName+"</option>";

         }
         $('#revenueCode').html(opt);
       }
    });
}
// function get_advertisement_details(adId){
//       $('#loadPage').show();
//     $.ajax({
//         type:'GET',
//         url:api_url+'fetch_advertisement_details.php',
//         dataType:'json',
//         data:{adId:adId},
//        success:function(response){
//          // console.log(response);
//            $("#companyId").val(response.companyId).trigger('change');
//            // $('#revenueCode').val(response.adRevenueCode).trigger('change');
//            $('#addTitle').val(response.title);
//            $('#videoUrl').val(response.videoUrl);
//            $("#htmlDetails").val(response.htmlDetails);
//            $('#Atype').val(response.type);
//            $('#duration').val(response.duration);
//            $('#startDate').val(response.startDate);
//            $('#endDate').val(response.endDate);
//        }
//     });
// }
function imgup(imgid){
        var img_url="http://esmartsolution.in/mrapp/";
        var fd = new FormData();
        var files = $('#animalimgname')[0].files[0];
        fd.append('file',files);
        fd.append('imgname',imgid);
        fd.append('foldername',"adimages");
        $.ajax({

             url:img_url+"uploadimage1.php",
             type:"POST",
             contentType: false,
             cache: false,
             processData:false,
             data: fd,
             dataType:'json',
             async:false,
             success:function(response){
             }
      });
  }
var loadFile = function(event) {
    var output = document.getElementById('setimage');
    console.log(output);
    output.src = URL.createObjectURL(event.target.files[0]);

};

// $("#reload").on('click',{
//
// });
$('#reload').on('click',function(event){
  event.preventDefault();
  $('#addnewads').hide();
  $('#companyTable').show();
  // $('#loadPage').hide();
  // $('#companyTable').show();
  // $('#addAdvertisement').show();
});
function getDate(date) {

    var output = '-';
    if (date == null) {
        return output;
    } else {
        var d = new Date(date);
        output = d.toDateString(); // outputs to "Thu May 28 2015"
        let outarr = output.split(" ");
        let datestr = outarr[0]+","+outarr[2]+" "+outarr[1]+" "+outarr[3];
        output=datestr;
    }
    return output;
}
