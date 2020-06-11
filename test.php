<input name="password" type="password" placeholder="password"  id="MEMBER_PASSWORD" onkeyup="checkPass(); return false;" />
<input name="repeatpassword" type="password" placeholder="confirm password" id="MEMBER_PASSWORD1" onkeyup="checkPass(); return false;" />
<div id="error-nwl"></div>

<script>
    function checkPass()
{
    var pass1 = document.getElementById('MEMBER_PASSWORD');
    var pass2 = document.getElementById('MEMBER_PASSWORD1');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
 	
    if(pass1.value.length > 5)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 6 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "ok!"
    }
	else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
    }
}  
</script>