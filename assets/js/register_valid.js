var ten_dn=document.getElementById('ten_dn')
var email_dk=document.getElementById('email_dk')
var mk_dk=document.getElementById('mk_dk')
var mk2_dk=document.getElementById('mk2_dk')

//Thông báo
var valid_tendk =document.querySelector('.valid_tendk')
var valid_emaildk =document.querySelector('.valid_emaildk')
var valid_mk_dk =document.querySelector('.valid_mk_dk')
var valid_mk2_dk =document.querySelector('.valid_mk2_dk')
var form_register=document.getElementById('form_register')


function valid_empty(){
    
    var is_empty_ten_dn=false;
    var is_empty_email_dk=false;
    var is_empty_mk_dk=false;
    var is_empty_mk2_dk=false;
    if(ten_dn.value==""){
        is_empty_ten_dn=true;

        valid_tendk.innerHTML="Không để trống trường này"
    }
    if(email_dk.value==""){
        is_empty_email_dk=true;

        valid_emaildk.innerHTML="Không để trống trường này"
    }
    if(mk_dk.value==""){
        is_empty_mk_dk=true;

        valid_mk_dk.innerHTML="Không để trống trường này"
    }
    if(mk2_dk.value==""){
        is_empty_mk2_dk=true;

        valid_mk2_dk.innerHTML="Không để trống trường này"
    }
    if(is_empty_ten_dn== false && is_empty_email_dk== false && is_empty_mk_dk== false && is_empty_mk2_dk== false){
        return true;

    }else{
        return false;
    }
       
}


ten_dn.addEventListener('focus',function(){
    
    valid_tendk.innerHTML=''
})
email_dk.addEventListener('focus',function(){
    
    valid_emaildk.innerHTML=''
})
mk_dk.addEventListener('focus',function(){
    
    valid_mk_dk.innerHTML=''
})
mk2_dk.addEventListener('focus',function(){
    
    valid_mk2_dk.innerHTML=''
})
// valid length
function valid_length(){
    
    var is_length_ten_dn=false;
    var is_length_email_dk=false;
    var is_length_mk_dk=false;
    var is_length_mk2_dk=false;
    if(ten_dn.value.length < 5){
        is_length_ten_dn=true;

        valid_tendk.innerHTML="Tên đăng nhập phải lớn hơn 5 ký tự"
    }
    if(email_dk.value==""){
        is_length_email_dk=true;

        valid_emaildk.innerHTML="Không để trống trường này"
    }
    if(mk_dk.value.length < 8){
        is_length_mk_dk=true;

        valid_mk_dk.innerHTML="Độ dài mật khẩu phải lớn hơn 8"
    }
    if(mk2_dk.value.length < 8){
        is_length_mk2_dk=true;

        valid_mk2_dk.innerHTML="Độ dài mật khẩu phải lớn hơn 8"
    }
    if(is_length_ten_dn== false && is_length_email_dk== false && is_length_mk_dk== false && is_length_mk2_dk== false){
        return true;

    }else{
        return false;
    }
       
}
// valid pass
function valid_pass(){
    if(mk_dk.value != mk2_dk.value){
        valid_mk2_dk.innerHTML = "Mật khẩu không khớp"
        return false
    }else {
        return true
    }
}




form_register.addEventListener('submit', function(e){
    valid_empty()
   if(valid_empty()){
    valid_length()
    if(valid_length()){
        valid_pass()
        if(valid_pass()){

        }
    }
   }

    if(valid_empty()==true && valid_length()==true && valid_pass()==true){

    }
    else{
    e.preventDefault()

    }
    

})

// valid đăng nhập
var form_dn=document.getElementById('form_dn')
var ten_dn=document.querySelector('.ten_dn')
var mk_dn=document.querySelector('.mk_dn')

var valid_ten_dn=document.querySelector('.valid_ten_dn')
var valid_mk_dn=document.querySelector('.valid_mk_dn')

form_dn.addEventListener('submit',function(e){
    if(ten_dn.value==''){
        valid_ten_dn.innerHTML="tên tài khoản không được để trống"
    }
    if(mk_dn.value==''){
        valid_ten_dn.innerHTML="Mật khẩu không được để trống"
    }
    e.preventDefault()
})