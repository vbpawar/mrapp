display_revenueMaster();
//for display data of registerd company's
function display_revenueMaster(){
    $.ajax({
        type:'GET',
        url:'../src/display_visit_master.php',
        dataType:'json',
       success:function(response){
           var count = response.length;
           var tblhtml = '',badge='';
           for(var i=0;i<count;i++){
            if(response[i].isActive == 0){
                badge = '<td><a  class="badge badge-pill badge-warning" title="click to activate" href="#" onclick="activateId(\''+response[i].profileId+'\',\''+response[i].isActive+'\')">in active</a></td>';
               }else{
                badge = '<td><a  class="badge badge-pill badge-success" title="Click to inactivate" href="#" onclick="inactivateId(\''+response[i].profileId+'\',\''+response[i].isActive+'\')">active</a></td>';
               }
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response[i].visitorName+'</td>';
            tblhtml += '<td>'+response[i].mobile+'</td>';
            tblhtml += '<td>'+response[i].companyName+'</td>';
            tblhtml += '<td>'+response[i].joiningDate+'</td>';
            tblhtml += badge;
            tblhtml += '<td><a class="btn" href="#" onclick="editCompanyData('+response[i].profileId +')"><i class="fa fa-edit"></i></a>';
           }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
    });
}

//add new company master button and hide the table and button and load company master page
$('#addVisitor').on('click',function(event){
event.preventDefault();
$('#loadPage').load('add_visitor_profile.php');
fetch_companies();
$('#companyTable').hide();
$('#addVisitor').hide();
});

function editCompanyData(profileId){
$('#loadPage').load('update_visitor_profile.php?profileId='+profileId);
fetch_companies();
get_visitor_profile(profileId);
$('#companyTable').hide();
$('#addVisitor').hide();
}

function activateId(profileId,param){
    var r = confirm('Are you sure to Activate this id');
    if(r == true){
        $.ajax({
            url:'../src/in_active_visitorProfile.php',
            type:'POST',
            dataType:'json',
            data:{profileId:profileId,param:param},
            success:function(response){
                alert(response.msg);
                display_revenueMaster();
            }
        });
    }
}
function inactivateId(profileId,param){
    var r = confirm('Are you sure to in Activate this id');
    if(r == true){
        $.ajax({
            url:'../src/in_active_visitorProfile.php',
            type:'POST',
            dataType:'json',
            data:{profileId:profileId,param:param},
            success:function(response){
                alert(response.msg);
                display_revenueMaster();
            }
        });
    }
}
//Registration of new visitor profile
$('#addVisitorProfile').on('submit',function(event){
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
    url:'../src/add_visitor_profile.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       alert(response.msg);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addVisitor').show();
       display_revenueMaster();
   }
});
});

//Update of company_master
$('#updateVisitorProfile').on('submit',function(event){
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
    url:'../src/update_visitor_profile.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       alert(response.msg);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addVisitor').show();
       display_revenueMaster();
   }
});
});
function fetch_companies(){
    $.ajax({
        type:'GET',
        url:'../src/fetch_companyId.php',
       success:function(response){
         $('#companyId').html(response);
       }
    });
}
function get_visitor_profile(profileId){
    $.ajax({
        type:'GET',
        url:'../src/fetch_visitor_profile.php',
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