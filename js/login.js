$('#login').on('submit',function(event){
event.preventDefault();
var loginData ={
    username: $('#username').val(),
    password: $('#password').val()
};
$.ajax({
    url: api_url+'UserLogin.php',
    type: 'POST',
    data: loginData,
    dataType: 'json',
    success:function(response){
        if(response.msg==0){
            $('#message').text('Your Account is currently in Active').css('color','red');
        }
        if(response.msg==1){
            window.location = 'companyMaster.php';
            $('#message').text('Welcome');
        }
        if(response.msg==2){
            $('#message').text('Please Enter Correct Email id or password').css('color','red');
        }
    }
  });
});
// function onSignIn(googleUser) {
//   var profile = googleUser.getBasicProfile();
//   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
//   console.log('Name: ' + profile.getName());
//   console.log('Image URL: ' + profile.getImageUrl());
//   console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
// }
