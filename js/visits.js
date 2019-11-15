var companynameset = new Set();
var dateset = new Set();
var monthset = new Set();
var yearset = new Set();
var globalarr = [];
// setDateSelectMaster();
var month= ["","January","February","March","April","May","June","July",
            "August","September","October","November","December"];
// var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug", "Sep", "Oct", "Nov", "Dec"];
$('#dateid').select2({
    allowClear: true,
    placeholder: "Select Date"
});
$('#monthid').select2({
    allowClear: true,
    placeholder: "Select Month"
});
$('#yearid').select2({
    allowClear: true,
    placeholder: "Select Year"
});
$('#companynameid').select2({
    allowClear: true,
    placeholder: "Select Company"
});
// function setDateSelectMaster(){
//   var date1 ='';
//   var yearsel ='';
//   var monthsel ='';
//   var datesel ='';
//   var companynamesel ='';
//   $.ajax({
//       type:'GET',
//       url:api_url+'display_visits.php',
//       dataType:'json',
//      success:function(response){
//        // console.log(response);
//          var count = response.length;
//          for(var i=0;i<count;i++){
//           globalarr.push(response[i]);
//           date1 = response[i].visitDate.split("-");
//           companynameset.add(response[i].companyName);
//           yearset.add(date1[0]);
//           monthset.add(date1[1]);
//           dateset.add(date1[2]);
//          }
//
//          yearsel='<option value="0">Select Year</option>';
//          for (let item of yearset) {
//             yearsel+='<option value='+item+'>'+item+'</option>';
//          }
//          $("#yearid").html(yearsel);
//          monthsel='<option value="0">Select Month</option>';
//          for (let item of monthset) {
//            let indexval = parseInt(item);
//             monthsel+='<option value='+item+'>'+month[indexval]+'</option>';
//          }
//          $("#monthid").html(monthsel);
//          datesel='<option value="0">Select Date</option>';
//          for (let item of dateset) {
//             datesel+='<option value='+item+'>'+item+'</option>';
//          }
//          $("#dateid").html(datesel);
//          companynamesel='<option value="0">Select Company </option>';
//          for (let item of companynameset) {
//             companynamesel+='<option value='+item+'>'+item+'</option>';
//          }
//          $("#companynameid").html(companynamesel);
//      }
//   });
// }
display_advertisementMaster();

function display_advertisementMaster(){
  $('#mainTable').dataTable().fnDestroy();
  $("#tblData").empty();
    $.ajax({
        type:'GET',
        url:api_url+'display_visits.php',
        dataType:'json',
       success:function(response){
           // var count = response.length;
           var count = response.length;
           for(var i=0;i<count;i++){
            globalarr.push(response[i]);
            date1 = response[i].visitDate.split("-");
            companynameset.add(response[i].companyName);
            yearset.add(date1[0]);
            monthset.add(date1[1]);
            dateset.add(date1[2]);
           }

           yearsel='<option value="0">Select Year</option>';
           for (let item of yearset) {
              yearsel+='<option value='+item+'>'+item+'</option>';
           }
           $("#yearid").html(yearsel);
           monthsel='<option value="0">Select Month</option>';
           for (let item of monthset) {
             let indexval = parseInt(item);
              monthsel+='<option value='+item+'>'+month[indexval]+'</option>';
           }
           $("#monthid").html(monthsel);
           datesel='<option value="0">Select Date</option>';
           for (let item of dateset) {
              datesel+='<option value='+item+'>'+item+'</option>';
           }
           $("#dateid").html(datesel);
           companynamesel='<option value="0">Select Company </option>';
           for (let item of companynameset) {
              companynamesel+='<option value='+item+'>'+item+'</option>';
           }
           $("#companynameid").html(companynamesel);
           var tblhtml = '';
           for(var i=0;i<count;i++){
            tblhtml += '<tr><td>'+(i+1)+'</td><td>'+response[i].companyName+'</td>';
            tblhtml += '<td>'+response[i].companySubtitle+'</td>';
            tblhtml += '<td>'+response[i].managerName+'</td>';
            tblhtml += '<td>'+getDate(globalarr[i].visitDate)+'</td>';
            tblhtml += '<td>'+response[i].visitDateTime+'</td></tr>';
           }
           $('#tblData').html(tblhtml);
           $('#mainTable').dataTable();
       }
    });
}
function searchbtninfo(){
  $('#mainTable').dataTable().fnDestroy();
  $("#tblData").empty();
  var dateid = $("#dateid").val();
  console.log(dateid);
  var monthid = $("#monthid").val();
  console.log(monthid);
  var yearid = $("#yearid").val();
  var companyarr =[];
  var companynameid = $("#companynameid").val();
  console.log(yearid);

  if(yearid!=0&&monthid==0&&dateid==0){
      console.log("only year");
      console.log(globalarr);
      var count = globalarr.length;
      var tblhtml = '';
      for(var i=0;i<count;i++){
       let splitvisitdate = globalarr[i].visitDate.split("-");
       if(splitvisitdate[0]==yearid){
         tblhtml += '<tr><td>'+(i+1)+'</td><td>'+globalarr[i].companyName+'</td>';
         tblhtml += '<td>'+globalarr[i].companySubtitle+'</td>';
         tblhtml += '<td>'+globalarr[i].managerName+'</td>';
         tblhtml += '<td>'+getDate(globalarr[i].visitDate)+'</td>';
         tblhtml += '<td>'+globalarr[i].visitDateTime+'</td></tr>';
         companyarr.push(globalarr[i]);
       }
      }
  }
  if(yearid!=0&&monthid!=0&&dateid==0){
    console.log("only month");
    console.log(globalarr);
    var count = globalarr.length;
    var tblhtml = '';
    for(var i=0;i<count;i++){
     let splitvisitdate = globalarr[i].visitDate.split("-");
     if(splitvisitdate[0]==yearid &&splitvisitdate[1]==monthid){
       tblhtml += '<tr><td>'+(i+1)+'</td><td>'+globalarr[i].companyName+'</td>';
       tblhtml += '<td>'+globalarr[i].companySubtitle+'</td>';
       tblhtml += '<td>'+globalarr[i].managerName+'</td>';
       tblhtml += '<td>'+getDate(globalarr[i].visitDate)+'</td>';
       tblhtml += '<td>'+globalarr[i].visitDateTime+'</td></tr>';
       companyarr.push(globalarr[i]);
     }
    }
  }
  if(yearid==0&&monthid!=0&&dateid==0){
    alert("Please Select Year");
  }
  if(yearid!=0&&monthid!=0&&dateid!=0){
    console.log("only date");
    console.log(globalarr);
    var count = globalarr.length;
    var tblhtml = '';
    for(var i=0;i<count;i++){
     let splitvisitdate = globalarr[i].visitDate.split("-");
     if(splitvisitdate[0]==yearid &&splitvisitdate[1]==monthid&&splitvisitdate[2]==dateid){
       tblhtml += '<tr><td>'+(i+1)+'</td><td>'+globalarr[i].companyName+'</td>';
       tblhtml += '<td>'+globalarr[i].companySubtitle+'</td>';
       tblhtml += '<td>'+globalarr[i].managerName+'</td>';
       tblhtml += '<td>'+getDate(globalarr[i].visitDate)+'</td>';
       tblhtml += '<td>'+globalarr[i].visitDateTime+'</td></tr>';
       companyarr.push(globalarr[i]);
     }
    }
  }
  if(yearid!=0&&monthid==0&&dateid!=0){
    alert("Please Select Month");
  }
  if(yearid==0&&monthid!=0&&dateid!=0){
    alert("Please Select Year");
  }
  if(yearid==0&&monthid==0&&dateid!=0){
    alert("Please Select Month,Year");
  }
  if(yearid==0&&monthid==0&&dateid==0){
    alert("Please Select Date,Month,Year");
  }
  if(companynameid!=0){
    console.log("Company Name"+companynameid);
    console.log(companyarr);
  }
  $('#tblData').html(tblhtml);
  $('#mainTable').dataTable();
}
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
