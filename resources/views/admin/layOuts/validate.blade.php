$("#create_new_user").validate({
rules:{
name:{
required:true,
minlength:2,
maxlength:50
},
email:{
email:true,
required:true,
minlength:9,
maxlength:70
},
password:{
required:true,
minlength:6,
maxlength:24,
},
phone:{
required:true,
minlength:9,
maxlength:13,
},
confirm_password:{
equalTo:"#password",
},
address:{
required:true,
minlength:15,
maxlength:200,
},
birthday:{
required:true
}
},
messages:{
name:{
required:'Name input field is required',
minlength:'Please enter your full name',
maxlength:'detected an incorrect username'
},
email:{
email:'Incorrect email format was detected',
required:'you are not allowed to skip this field',
minlength:'email is already in use',
maxlength:'The email must be shorter to remember'
},
password:{
required:'password is required',
minlength:'the password is too weak',
maxlength:'Password must be no more than 24 characters',
},
phone:{
required:'phone is required',
minlength:'Incorrect phone number format was detected',
maxlength:'Incorrect phone number format was detected',
},
confirm_password:{
equalTo:'password incorrect',
},
address:{
required:'the address is required',
minlength:'more detailed address requests',
maxlength:'Did not find any similar address',
},
birthday:{
required:'Birth date is required'
}
}
})
