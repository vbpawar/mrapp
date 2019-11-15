display_revenueMaster();
$('#companyId').select2({
    allowClear: true,
    placeholder: "Select Company Name"
});
fetch_companies();
//for display data of registerd company's
function display_revenueMaster(){
    $.ajax({
        type:'GET',
        url:api_url+'display_visit_master.php',
        dataType:'json',
       success:function(response){
           
          if(response.Responsecode==200){
            var count = response.Data.length;
            var tblhtml = '',badge='';
            for(var i=0;i<count;i++){
             if(response.Data[i].isActive == 0){
                 badge = '<td><a  class="badge badge-pill badge-warning" title="click to activate" href="#" onclick="activateId(\''+response.Data[i].profileId+'\',\''+response.Data[i].isActive+'\')">in active</a></td>';
                }else{
                 badge = '<td><a  class="badge badge-pill badge-success" title="Click to inactivate" href="#" onclick="inactivateId(\''+response.Data[i].profileId+'\',\''+response.Data[i].isActive+'\')">active</a></td>';
                }
             tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response.Data[i].visitorName+'</td>';
             tblhtml += '<td>'+response.Data[i].mobile+'</td>';
             tblhtml += '<td>'+response.Data[i].companyName+'</td>';
             tblhtml += '<td>'+getDate(response.Data[i].joiningDate)+'</td>';
             tblhtml += badge;
             tblhtml += '<td>';
             tblhtml += '<a class="btn" href="#" onclick="editCompanyData('+response.Data[i].profileId +')"><i class="fa fa-edit"></i></a>';
             tblhtml += '<a class="btn" href="#" title="Edit The Details" onclick="removeCompanyData('+response.Data[i].profileId +')"><i class="fa fa-trash"></i></a>';
             tblhtml += '</td>';
             tblhtml += '</tr>';
            }
            $('#tblData').html(tblhtml);
            $('#mainTable').dataTable();
          }

       }
    });
}

//add new company master button and hide the table and button and load company master page
$('#addVisitor').on('click',function(event){
event.preventDefault();
$('#addnewads').show();
$('#companyTable').hide();
$("#addbtnshow").show();
$("#updatebtnshow").hide();
$('#visitorName').val("");
$('#visitorContact').val("");
$('#companyId').val("").trigger('change');
$('#idNumber').val("");
$('#joiningDate').val("");
$('#birthDate').val("");
// $('#loadPage').show();
// $('#loadPage').load('add_visitor_profile.php');

// $('#companyTable').hide();
// $('#addVisitor').hide();
});

function editCompanyData(profileId){
  $('#companyTable').hide();
  $('#addnewads').show();
  $("#addbtnshow").hide();
  $("#updatebtnshow").show();
  $("#profileId").val(profileId);
  $.ajax({
      type:'GET',
      url:api_url+'fetch_visitor_profile.php',
      dataType:'json',
      data:{profileId:profileId},
     success:function(response){
       $('#visitorName').val(response.visitorName);
       $('#visitorContact').val(response.mobile);
       $('#companyId').val(response.companyId).trigger('change');
       $('#idNumber').val(response.idNumber);
       $('#joiningDate').val(response.joiningDate);
       $('#birthDate').val(response.birthDate);
     }
  });
// $('#loadPage').show();
// $('#loadPage').load('update_visitor_profile.php?profileId='+profileId);
// fetch_companies();
// get_visitor_profile(profileId);
// $('#companyTable').hide();
// $('#addVisitor').hide();
}

function activateId(profileId,param){
    var r = confirm('Are you sure to Activate this id');
    if(r == true){
        $.ajax({
            url:api_url+'in_active_visitorProfile.php',
            type:'POST',
            dataType:'json',
            data:{profileId:profileId,param:param},
            success:function(response){
              if(response.Responsecode==200){
                alert(response.Message);
                display_revenueMaster();
              }

            }
        });
    }
}
function inactivateId(profileId,param){
    var r = confirm('Are you sure to in Activate this id');
    if(r == true){
        $.ajax({
            url:api_url+'in_active_visitorProfile.php',
            type:'POST',
            dataType:'json',
            data:{profileId:profileId,param:param},
            success:function(response){
              if(response.Responsecode==200){
                alert(response.Message);
                display_revenueMaster();
              }
            }
        });
    }
}
//Registration of new visitor profile
$('#addVisitorProfile').on('click',function(event){
    event.preventDefault();
var registerData ={
    visitorName:document.getElementById('visitorName').value,
    visitorContact:document.getElementById('visitorContact').value,
    companyId:document.getElementById('companyId').value,
    idNumber:document.getElementById('idNumber').value,
    joiningDate:document.getElementById('joiningDate').value,
    birthDate:document.getElementById('birthDate').value
};
$.ajax({
    type:'POST',
    url:api_url+'add_visitor_profile.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       if(response.Responsecode==200){
       alert(response.Message);
       // $('#loadPage').empty();
       // $('#companyTable').show();
       // $('#addVisitor').show();
       $('#addnewads').hide();
       $('#companyTable').show();
       display_revenueMaster();
     }
   }
});
});

//Update of company_master
$('#updateVisitorProfile').on('click',function(event){
    event.preventDefault();
    var registerData ={
        profileId:$('#profileId').val(),
        visitorName:document.getElementById('visitorName').value,
        visitorContact:document.getElementById('visitorContact').value,
        companyId:document.getElementById('companyId').value,
        idNumber:document.getElementById('idNumber').value,
        joiningDate:document.getElementById('joiningDate').value,
        birthDate:document.getElementById('birthDate').value
    };
$.ajax({
    type:'POST',
    url:api_url+'update_visitor_profile.php',
    dataType:'json',
    data:registerData,
   success:function(response){
     if(response.Responsecode==200){
       alert(response.Message);
       $('#addnewads').hide();
       $('#companyTable').show();
       display_revenueMaster();
     }
   }
});
});
function removeCompanyData(id){
  $.ajax({
      url:api_url+'removevisitprofile.php',
      type:'POST',
      data:{
        deleteId:id
      },
      dataType:'json',
      success:function(response){
        // console.log(response);
        if(response.Responsecode==200){
          alert(response.Message);
          display_revenueMaster();
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
function get_visitor_profile(profileId){
    $.ajax({
        type:'GET',
        url:api_url+'fetch_visitor_profile.php',
        dataType:'json',
        data:{profileId:profileId},
       success:function(response){
         $('#visitorName').val(response.visitorName);
         $('#visitorContact').val(response.mobile);
         $('#companyId').val(response.companyId).trigger('change');
         $('#idNumber').val(response.idNumber);
         $('#joiningDate').val(response.joiningDate);
         $('#birthDate').val(response.birthDate);
       }
    });
}
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
