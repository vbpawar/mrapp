display_companyMaster();
//for display data of registerd company's
function display_companyMaster(){
    $.ajax({
        type:'GET',
        url:'../src/display_companyMaster.php',
        dataType:'json',
       success:function(response){
           var count = response.length;
           var tblhtml = '',badge='';
           for(var i=0;i<count;i++){
            if(response[i].isActive == 0){
                badge = '<td><a  class="badge badge-pill badge-warning" title="click to activate" href="#" onclick="activateId(\''+response[i].companyId+'\',\''+response[i].isActive+'\')">in active</a></td>';
               }else{
                badge = '<td><a  class="badge badge-pill badge-success" title="Click to inactivate" href="#" onclick="inactivateId(\''+response[i].companyId+'\',\''+response[i].isActive+'\')">active</a></td>';
               }
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response[i].companyName+'</td>';
            tblhtml += '<td>'+response[i].companyTitle+'</td>';
            tblhtml += '<td>'+response[i].address+'</td>';
            tblhtml += badge;
            tblhtml += '<td><a class="btn" href="#" title="Edit Details" onclick="editCompanyData('+response[i].companyId+')"><i class="fa fa-edit"></i></a></td></tr>';
           }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
    });
}

//add new company master button and hide the table and button and load company master page
$('#addcompanyPage').on('click',function(event){
event.preventDefault();
$('#loadPage').load('add_companyMaster.php');
$('#companyTable').hide();
$('#addcompanyPage').hide();
});

function editCompanyData(companyId){
$('#loadPage').load('update_companyMaster.php');
get_company_details(companyId);
$('#companyTable').hide();
$('#addcompanyPage').hide();
}
function activateId(companyId,param){
    var r = confirm('Are you sure to Activate this id');
    if(r == true){
        $.ajax({
            url:'../src/in_activeCompany.php',
            type:'POST',
            dataType:'json',
            data:{companyId:companyId,param:param},
            success:function(response){
                alert(response.msg);
                display_companyMaster();
            }
        });
    }
}
function inactivateId(companyId,param){
    var r = confirm('Are you sure to in Activate this id');
    if(r == true){
        $.ajax({
            url:'../src/in_activeCompany.php',
            type:'POST',
            dataType:'json',
            data:{companyId:companyId,param:param},
            success:function(response){
                alert(response.msg);
                display_companyMaster();
            }
        });
    }
}
//Registration of company_master
$('#addCompanyDetails').on('submit',function(event){
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
    url:'../src/add_companyMaster.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       alert(response.msg);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addcompanyPage').show();
       display_companyMaster();
   }
});
});

//Update of company_master
$('#detailsUpdate').on('submit',function(event){
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
    url:'../src/update_companyMaster.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       alert(response.msg);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addcompanyPage').show();
       display_companyMaster();
   }
});
});
function get_company_details(companyId){
    $.ajax({
        type:'GET',
        url:'../src/fetch_company_details.php',
        dataType:'json',
        data:{companyId:companyId},
       success:function(response){
           $('#companyId').val(response.companyId);
           $("#companyTitle").val(response.companySubtitle);
           $('#companyName').val(response.companyName);
           $('#managerName').val(response.managerName);
           $('#managerEmail').val(response.managerEmail);
           $('#managerContact').val(response.managerMobile);
           $('#address').val(response.address);
       }
    });
}