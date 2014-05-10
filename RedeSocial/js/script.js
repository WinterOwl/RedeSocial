function MM_jumpmenu(targ, selObj, restore)
{
	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if(restore)selObj.selectedIndex=0;
}

var valemail;
function val_email(valemail)
{
	if(valemail.indexOf('@') < valemail.lastIndexOf('.'))
		return 1;
	else
		return 0;
}

function login()
{
	document.getElementById("login-err").innerHTML = "";
	var mail = document.getElementById("txt-log-email").value;
	var pw = document.getElementById("txt-log-pwd").value;
	
	if(mail.length <= 0 || val_email(mail) != 1)
		document.getElementById("login-err").innerHTML = "Email Invalido";
	
	else if(val_email(mail) == 1 && mail.length > 0 && pw.length > 0)
	{
		document.getElementById("btn-log").type = "submit";
		document.getElementById("form-log").method = "post";
		document.getElementById("form-log").action = "?funcao=1";
	}
}