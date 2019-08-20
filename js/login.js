$('#login').on('submit',function(event){
event.preventDefault();
var LoginDetails ={
    username: $('#username').val(),
    password: $('#password').val()
};
$.ajax({
    url:'../src/UserLogin.php',
    Type:'POST',
    dataType:'json',
    data:LoginDetails,
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