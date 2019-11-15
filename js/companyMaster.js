display_companyMaster();
//for display data of registerd company's
function display_companyMaster(){
    $.ajax({
        type:'GET',
        url:api_url+'display_companyMaster.php',
        dataType:'json',
       success:function(response){
         // console.log(response);
         if(response.Responsecode==200){
           var count = response.Data.length;
           var tblhtml = '',badge='';
           for(var i=0;i<count;i++){
            if(response.Data[i].isActive == 0){
                badge = '<td><a  class="badge badge-pill badge-warning" title="click to activate" href="#" onclick="activateId(\''+response.Data[i].companyId+'\',\''+response.Data[i].isActive+'\')">in active</a></td>';
               }else{
                badge = '<td><a  class="badge badge-pill badge-success" title="Click to inactivate" href="#" onclick="inactivateId(\''+response.Data[i].companyId+'\',\''+response.Data[i].isActive+'\')">active</a></td>';
               }
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response.Data[i].companyName+'</td>';
            tblhtml += '<td>'+response.Data[i].companySubtitle+'</td>';
            tblhtml += '<td>'+response.Data[i].address+'</td>';
            tblhtml += badge;
            tblhtml += '<td><a class="btn" href="#" title="Edit Details" onclick="editCompanyData('+response.Data[i].companyId+')"><i class="fa fa-edit"></i></a>';
            tblhtml += '<a class="btn" href="#" title="Edit The Details" onclick="removeCompanyData('+response.Data[i].companyId +')"><i class="fa fa-trash"></i></a>';
            tblhtml += '<a class="btn" href="#" title="QR Genterator" onclick="generateQrCode('+response.Data[i].companyId+')"><i class="fa fa-qrcode" aria-hidden="true"></i></a>';
            tblhtml += '<a class="btn" href="qrcode/'+response.Data[i].companyId+'.jpg" title="Download QR"  download><i class="fa fa-download" aria-hidden="true"></i></a>';
            tblhtml += '</td></tr>';
           }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
     }
    });
}

//add new company master button and hide the table and button and load company master page
$('#addcompanyPage').on('click',function(event){
event.preventDefault();
$('#addnewads').show();
$('#companyTable').hide();
$("#addbtnshow").show();
$("#updatebtnshow").hide();

$('#companyId').val("");
$("#companyTitle").val("");
$('#companyName').val("");
$('#managerName').val("");
$('#managerEmail').val("");
$('#managerContact').val("");
$('#address').val("");
});

function editCompanyData(companyId){
// $('#loadPage').show();
// $('#loadPage').load('update_companyMaster.php');
$('#companyTable').hide();
$('#addnewads').show();
$("#addbtnshow").hide();
$("#updatebtnshow").show();
$("#companyId").val(companyId);
$.ajax({
    type:'POST',
    url:api_url+'fetch_company_details.php',
    dataType:'json',
    data:{companyId:companyId},
   success:function(response){
       $('#companyId').val(response.Data[0].companyId);
       $("#companyTitle").val(response.Data[0].companySubtitle);
       $('#companyName').val(response.Data[0].companyName);
       $('#managerName').val(response.Data[0].managerName);
       $('#managerEmail').val(response.Data[0].managerEmail);
       $('#managerContact').val(response.Data[0].managerMobile);
       $('#address').val(response.Data[0].address);
       var imgsrc ='<img src="qrcode/qrcode'+response.Data[0].companyId+'.png" alt="Generate QR Code" id="qrcodeimage"/>';
       // console.log("oif");
       $("#imgscr").html(imgsrc);

   }
});
}
function removeCompanyData(id){
  $.ajax({
      url:api_url+'removecompany.php',
      type:'POST',
      data:{
        deleteId:id
      },
      dataType:'json',
      success:function(response){
        // console.log(response);
        if(response.Responsecode==200){
          alert(response.Message);
          display_companyMaster();
        }
      }
    });
}
function generateQrCode(companyId){
// console.log("companyId"+companyId);
$.ajax({
    url:api_url+'qrcodegen.php',
    type:'POST',
    dataType:'json',
    data:{
      data:companyId
    },
    success:function(response){
        alert(response.Message);
        display_companyMaster();
    },
    complete:function(){
      // var url = "../qrcode/qrcode7.png";
      // downloadURL(url);
    }
});
}

function activateId(companyId,param){
    var r = confirm('Are you sure to Activate this id');
    if(r == true){
        $.ajax({
            url:api_url+'in_activeCompany.php',
            type:'POST',
            dataType:'json',
            data:{companyId:companyId,param:param},
            success:function(response){

                if(response.Responsecode==200){
                  alert(response.Message);
                  display_companyMaster();
                }

            }
        });
    }
}
function inactivateId(companyId,param){
    var r = confirm('Are you sure to in Activate this id');
    if(r == true){
        $.ajax({
            url:api_url+'in_activeCompany.php',
            type:'POST',
            dataType:'json',
            data:{companyId:companyId,param:param},
            success:function(response){
              if(response.Responsecode==200){
                alert(response.Message);
                display_companyMaster();
              }
            }
        });
    }
}
//Registration of company_master
$('#addCompanyDetails').on('click',function(event){
    event.preventDefault();
var registerData ={
    companyName:document.getElementById('companyName').value,
    companyTitle:document.getElementById('companyTitle').value,
    managerName:document.getElementById('managerName').value,
    managerEmail:document.getElementById('managerEmail').value,
    managerContact:document.getElementById('managerContact').value,
    address:document.getElementById('address').value
};
$.ajax({
    type:'POST',
    url:api_url+'add_companyMaster.php',
    dataType:'json',
    data:registerData,
   success:function(response){
     if(response.Responsecode==200){
       alert(response.Message);
       // $('#loadPage').empty();
       // $('#companyTable').show();
       // $('#addcompanyPage').show();
       $('#addnewads').hide();
       $('#companyTable').show();
       display_companyMaster();
     }
   }
});
});

//Update of company_master
$('#detailsUpdate').on('click',function(event){
    event.preventDefault();
var registerData ={
    companyId:$('#companyId').val(),
    companyName:document.getElementById('companyName').value,
    companyTitle:document.getElementById('companyTitle').value,
    managerName:document.getElementById('managerName').value,
    managerEmail:document.getElementById('managerEmail').value,
    managerContact:document.getElementById('managerContact').value,
    address:document.getElementById('address').value
};
$.ajax({
    type:'POST',
    url:api_url+'update_companyMaster.php',
    dataType:'json',
    data:registerData,
   success:function(response){
     if(response.Responsecode==200){
       alert(response.Message);
       // $('#loadPage').empty();
       // $('#companyTable').show();
       // $('#addcompanyPage').show();
       $('#addnewads').hide();
       $('#companyTable').show();
       display_companyMaster();
     }
   }
});
});

$('#reload').on('click',function(event){
  event.preventDefault();
  $('#addnewads').hide();
  $('#companyTable').show();
  // $('#loadPage').hide();
  // $('#companyTable').show();
  // $('#addAdvertisement').show();
});
