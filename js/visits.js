display_advertisementMaster();
//for display data of advertisement Master
function display_advertisementMaster(){
    $.ajax({
        type:'GET',
        url:api_url+'display_visits.php',
        dataType:'json',
       success:function(response){
           var count = response.length;
           var tblhtml = '';
           for(var i=0;i<count;i++){
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response[i].companyName+'</td>';
            tblhtml += '<td>'+response[i].companySubtitle+'</td>';
            tblhtml += '<td>'+response[i].managerName+'</td>';
            tblhtml += '<td>'+response[i].visitDate+'</td>';
            tblhtml += '<td>'+response[i].visitDateTime+'</td></tr>';
        }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
    });
}
