display_advertisementMaster();
//for display data of advertisement Master
function display_advertisementMaster(){
    $.ajax({
        type:'GET',
        url:api_url+'display_advertisementMaster.php',
        dataType:'json',
       success:function(response){
           var count = response.length;
           var tblhtml = '',badge='';
           for(var i=0;i<count;i++){
               if(response[i].isActive == 0){
                badge = '<td><a  class="badge badge-pill badge-warning" title="click to activate" href="#" onclick="activateId(\''+response[i].adId+'\',\''+response[i].isActive+'\')">in active</a></td>';
               }else{
                badge = '<td><a  class="badge badge-pill badge-success" title="Click to inactivate" href="#" onclick="inactivateId(\''+response[i].adId+'\',\''+response[i].isActive+'\')">active</a></td>';
               }
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response[i].title+'</td>';
            tblhtml += '<td>'+response[i].startDate+'</td>';
            tblhtml += '<td>'+response[i].endDate+'</td>';
            tblhtml += '<td>'+response[i].companyName+'</td>';
            tblhtml += '<td>'+response[i].rtitle+'</td>';
            tblhtml += badge;
            tblhtml += '<td><a class="btn" href="#" title="Edit The Details" onclick="editCompanyData('+response[i].adId +')"><i class="fa fa-edit"></i></a></td>';
        }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
    });
}

//add new advertisement master button and hide the table and button and load advertisement master page
$('#addAdvertisement').on('click',function(event){
event.preventDefault();
$('#loadPage').load('add_advertisement.php');
fetch_companies();
fetch_revenueCode();
$('#companyTable').hide();
$('#addAdvertisement').hide();
});

function editCompanyData(adId){

$('#loadPage').load('update_advertisement.php?adId='+adId);
fetch_companies();
fetch_revenueCode();
get_advertisement_details(adId);
// console.log("adsimg/"+adId+".jpg");
$("#setimage").attr("src",imgmain+"adsimg/"+adId+".jpg");
$('#companyTable').hide();
$('#addAdvertisement').hide();
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
                alert(response.msg);
                display_advertisementMaster();
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
                alert(response.msg);
                display_advertisementMaster();
            }
        });
    }
}
//Registration of new Advertisement
$('#addAdvertisementPage').on('submit',function(event){
    event.preventDefault();
var registerData ={
    addTitle:document.getElementById('addTitle').value,
    videoUrl:document.getElementById('videoUrl').value,
    htmlDetails:document.getElementById('htmlDetails').value,
    companyId:document.getElementById('companyId').value,
    revenueCode:document.getElementById('revenueCode').value,
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
       alert(response.msg);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addAdvertisement').show();
       display_advertisementMaster();
   }
});
});

//Update of company_master
$('#updateAdvertisementPage').on('submit',function(event){
    event.preventDefault();
    var adid=$('#adId').val();
    var registerData ={
        adId:$('#adId').val(),
        addTitle:document.getElementById('addTitle').value,
        videoUrl:document.getElementById('videoUrl').value,
        htmlDetails:document.getElementById('htmlDetails').value,
        companyId:document.getElementById('companyId').value,
        revenueCode:document.getElementById('revenueCode').value,
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
       alert(response.msg);
       imgup(adid);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addAdvertisement').show();
       display_advertisementMaster();
   }
});
});
function fetch_companies(){
    $.ajax({
        type:'GET',
        url:api_url+'fetch_companyId.php',
        success:function(response){
          var count = response.length;
          var opt ='';
          for(var i=0;i<count;i++){
            opt+="<option value="+response[i].companyId+">"+response[i].companyName+"</option>";

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
         var opt ='';
         for(var i=0;i<count;i++){
           opt+="<option value="+response[i].companyId+">"+response[i].companyName+"</option>";

         }
         $('#revenueCode').html(opt);
       }
    });
}
function get_advertisement_details(adId){
    $.ajax({
        type:'GET',
        url:api_url+'fetch_advertisement_details.php',
        dataType:'json',
        data:{adId:adId},
       success:function(response){
           $("#companyId").val(response.companyId).trigger('change');
           $('#revenueCode').val(response.adRevenueCode).trigger('change');
           $('#addTitle').val(response.title);
           $('#videoUrl').val(response.videoUrl);
           $('#htmlDetails').val(response.htmlDetails);
           $('#Atype').val(response.type);
           $('#duration').val(response.duration);
           $('#startDate').val(response.startDate);
           $('#endDate').val(response.endDate);
       }
    });
}
function imgup(imgid){
        var fd = new FormData();
        var files = $('#animalimgname')[0].files[0];
        fd.append('file',files);
        fd.append('imgname',imgid);
        fd.append('foldername',"adsimg");
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
