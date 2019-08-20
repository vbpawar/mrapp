display_revenueMaster();
//for display data of registerd company's
function display_revenueMaster(){
    $.ajax({
        type:'GET',
        url:'../src/display_revenueCode.php',
        dataType:'json',
       success:function(response){
           var count = response.length;
           var tblhtml = '',badge='';
           for(var i=0;i<count;i++){
            if(response[i].isActive == 0){
                badge = '<td><a  class="badge badge-pill badge-warning" title="click to activate" href="#" onclick="activateId(\''+response[i].revenueCode+'\',\''+response[i].isActive+'\')">in active</a></td>';
               }else{
                badge = '<td><a  class="badge badge-pill badge-success" title="Click to inactivate" href="#" onclick="inactivateId(\''+response[i].revenueCode+'\',\''+response[i].isActive+'\')">active</a></td>';
               }
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response[i].title+'</td>';
            tblhtml += '<td>'+response[i].price+'</td>';
            tblhtml += badge;
            tblhtml += '<td><a class="btn" href="#" title="Edit Details" onclick="editCompanyData(\''+response[i].revenueCode+'\',\''+response[i].title+'\',\''+response[i].price+'\')"><i class="fa fa-edit"></i></a></td></tr>';
           }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
    });
}

//add new company master button and hide the table and button and load company master page
$('#addRevenuecode').on('click',function(event){
event.preventDefault();

$('#loadPage').load('add_revenueCode.php');
$('#companyTable').hide();
$('#addRevenuecode').hide();
});

function editCompanyData(revenueCode,title,price){
$('#loadPage').load('update_revenueCode.php?revenueCode='+revenueCode+'&title='+title+'&price='+price);
$('#companyTable').hide();
$('#addRevenuecode').hide();
}

function activateId(revenueCode,param){
    var r = confirm('Are you sure to Activate this id');
    if(r == true){
        $.ajax({
            url:'../src/in_activeRevenueCode.php',
            type:'POST',
            dataType:'json',
            data:{revenueCode:revenueCode,param:param},
            success:function(response){
                alert(response.msg);
                display_revenueMaster();
            }
        });
    }
}
function inactivateId(revenueCode,param){
    var r = confirm('Are you sure to in Activate this id');
    if(r == true){
        $.ajax({
            url:'../src/in_activeRevenueCode.php',
            type:'POST',
            dataType:'json',
            data:{revenueCode:revenueCode,param:param},
            success:function(response){
                alert(response.msg);
                display_revenueMaster();
            }
        });
    }
}
//Registration of new revenue code
$('#addRevenueDetails').on('submit',function(event){
    event.preventDefault();
var registerData ={
    title:document.getElementById('revenueTitle').value,
    price:document.getElementById('price').value
};
$.ajax({
    type:'POST',
    url:'../src/add_revenueCode.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       alert(response.msg);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addRevenuecode').show();
       display_revenueMaster();
   }
});
});

//Update of company_master
$('#updateRevenueDetails').on('submit',function(event){
    event.preventDefault();
var registerData ={
    revenueCode:$('#revenueCode').val(),
    price:document.getElementById('price').value,
    revenueTitle:document.getElementById('revenueTitle').value
};
$.ajax({
    type:'POST',
    url:'../src/update_revenueCode.php',
    dataType:'json',
    data:registerData,
   success:function(response){
       alert(response.msg);
       $('#loadPage').empty();
       $('#companyTable').show();
       $('#addRevenuecode').show();
       display_revenueMaster();
   }
});
});