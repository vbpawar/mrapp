display_counts();
display_setlimit();
$('#companyId').select2({
    allowClear: true,
    placeholder: "Select Company Name"
});
function display_counts(){
    $.ajax({
        url:api_url+'display_countsDashboard.php',
        type:'GET',
        dataType:'json',
        success:function(response){
            $('#advCount').html(response.Data[0].count1);
            $('#compCount').html(response.Data[0].count2);
            $('#visitCount').html(response.Data[0].count3);
        }
    });
}
function display_setlimit(){
    $.ajax({
        url:api_url+'display_setlimit.php',
        type:'GET',
        dataType:'json',
        success:function(response){
            $('#weekLimit').val(response.Data[0].weeklyLimit);
            $('#monthLimit').val(response.Data[0].monthlyLimit);
        }
    });
}
$('#limitDetails').on('submit',function(e){
    e.preventDefault();
    var limitData = {
        // weekLimit:$('#weekLimit').val(),
        weekLimit:"0",
        monthLimit:$('#monthLimit').val()
    };
    $.ajax({
        url:api_url+'update_limitData.php',
        type:'POST',
        data:limitData,
        dataType:'json',
        success:function(response){
            alert(response.Message);
        }
    });
});
