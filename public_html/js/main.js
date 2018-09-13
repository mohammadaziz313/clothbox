function myFunction() {
    var k= document.getElementById("nid");
    k.innerHTML = "Hello Wold";
}

function validateName(element){
    var id = element.id;
    var x = document.getElementById(id).value;
    var exp = /[0-9\W]/;
    var flag = exp.test(x);
    //console.log(flag);
    //console.log(x);
    if(flag){
        var k = '<span class="glyphicon glyphicon-warning-sign" style="color:red"></span> Invalid Input';
        document.getElementById(id+"alert").innerHTML = k;
        //console.log('wrong');
    }else{
        document.getElementById(id+"alert").innerHTML = "";
        //console.log('right');
    }
}

function validatePass(){

}

function checkPass(){
    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;
    if(pass1!==pass2){
        var k = '<span class="glyphicon glyphicon-warning-sign" style="color:red"></span> Passwords do not match';
        document.getElementById('pass2alert').innerHTML=k;
    }
    else{
        var k = '<span class="glyphicon glyphicon-ok" style="color:green"></span> Passwords match';
        document.getElementById('pass2alert').innerHTML=k;
    }
}

function emailCheck(){
    //Perform validation for email both at client and server end.
    //var exp = /abc/;
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById('emailalert').innerHTML=this.responseText;
        }
    }
    xhttp.open('GET','/clothbox/public_html/controller/ajax.php?search='+document.getElementById('email').value+'&type=email',true);
    xhttp.send();
}