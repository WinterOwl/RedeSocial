function MM_jumpmenu(targ, selObj, restore)
{
	alert("ola");
	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if(restore)selObj.selectedIndex=0;
}

var valemail;
function val_email(valemail)
{
	if(valemail.indexOf("@") < valemail.lastIndexOf("."))
		if((valemail.lastIndexOf(".") - valemail.indexOf("@")) < 2)
			return 0;
		else if(valemail.length - valemail.lastIndexOf(".") < 2)
			return 0;
		else
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

var op = 0;
var sop = 0;

function validar_data(data, op)
{
	var result = "";
	var Acdate = new Date();
	var date = new Date(data);
	
	reD = /[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}/;	
	var splited = data.split('-');

	
	if((date.getMonth() + 1) == 1 && date.getDate() > 31)
		result = "Janeiro tem 31 dias";
	if((date.getMonth() + 1) == 2 && date.getDate() > 29)
		result = "Fevereiro tem 29 dias";
	if((date.getMonth() + 1) == 3 && date.getDate() > 31)
		result = "Março tem 31 dias";
	if((date.getMonth() + 1) == 4 && date.getDate() > 30)
		result = "Abril tem 30 dias";
	if((date.getMonth() + 1) == 5 && date.getDate() > 31)
		result = "Maio tem 31 dias";
	if((date.getMonth() + 1) == 6 && date.getDate() > 30)
		result = "Junho tem 30 dias";
	if((date.getMonth() + 1) == 7 && date.getDate() > 31)
		result = "Julho tem 31 dias";
	if((date.getMonth() + 1) == 8 && date.getDate() > 31)
		result = "Agosto tem 31 dias";
	if((date.getMonth() + 1) == 9 && date.getDate() > 30)
		result = "Setembro tem 30 dias";
	if((date.getMonth() + 1) == 10 && date.getDate() > 31)
		result = "Outubro tem 31 dias";
	if((date.getMonth() + 1) == 11 && date.getDate() > 30)
		result = "Novembro tem 30 dias";
	if((date.getMonth() + 1) == 12 && date.getDate() > 31)
		result = "Dezembro tem 31 dias";
	
	
	if(date.getFullYear() < 1900)
		result = "A data deve ser superior ao ano 1900";
	if(splited[1] > 12 || splited[1] <= 0)
		result = "Verfique o mês inserido";
	if(splited[2] > 31 || splited[2] <= 0 )
		result = "Verfique o dia inserido";
	if(date>Acdate)
			result = "Tenha atenção à data";
	if(reD.test(data) == false)
		result = "Respeite o formato da data";
	
	return result;
		
}


function registo()
{
	limpar_registo();
	var nome=document.getElementById("reg_nome").value;
	var data=document.getElementById("reg_data").value;
	var mora=document.getElementById("reg_mora").value;
	var email=document.getElementById("reg_email").value;
	var pwd=document.getElementById("reg_pwd").value;
	var rpwd=document.getElementById("reg_rpwd").value;
	var erros = 0;
	
	if(nome.length <= 0)
	{
		document.getElementById("reg_err_nome").innerHTML = "*Campo Obrigatorio";
		erros++;
	}
	if(data.length == 0 )
	{
		document.getElementById("reg_err_data").innerHTML = "*Campo Obrigatorio";
	}
	else if(data.length != 10 && data.length != 0 )
	{
		document.getElementById("reg_err_data").innerHTML = "Respeite o formato da data";
	}
	else if((validar_data(data, 0).length != 0) && data.length == 10)
	{
		document.getElementById("reg_err_data").innerHTML = validar_data(data, 0);
		erros++
	}
	if(mora.length <= 0)
	{
		document.getElementById("reg_err_mora").innerHTML = "*Campo Obrigatorio";
		erros++;
	}
	if(email.length <= 0)
	{
		document.getElementById("reg_err_email").innerHTML = "*Campo Obrigatorio";
		erros++;
	}
	if(email.length > 0 && val_email(email) != 1)
	{
		document.getElementById("reg_err_email").innerHTML = "Email Invalido";
		erros++;
	}
	if(pwd.length <= 0)
	{
		document.getElementById("reg_err_pwd").innerHTML = "*Campo Obrigatorio";
		erros++;
	}
	if(pwd.length > 0 && pwd != rpwd)
	{
		document.getElementById("reg_err_rpwd").innerHTML = "Passwords diferentes";
		erros++;
	}
	
	if(erros == 0)
	{
		document.getElementById("reg_btn").type = "submit";
		document.getElementById("reg_form").method = "post";
		document.getElementById("reg_form").action = "?enviar=registo";
	}
	
}
function limpar_registo()
{
	document.getElementById("reg_err_nome").innerHTML = "";
	document.getElementById("reg_err_data").innerHTML = "";
	document.getElementById("reg_err_mora").innerHTML = "";
	document.getElementById("reg_err_email").innerHTML = "";
	document.getElementById("reg_err_pwd").innerHTML = "";
	document.getElementById("reg_err_rpwd").innerHTML = "";
}

function forget()
{
	document.getElementById("forget_err_email").innerHTML = "";
	var email = document.getElementById("forget-email").value;
	
	if(email.length <= 0)
		document.getElementById("forget_err_email").innerHTML = "*Campo Obrigatorio";
	
	else if(email.length > 0 && val_email(email) != 1)
		document.getElementById("forget_err_email").innerHTML = "Email Invalido";
	
	else
	{
		document.getElementById("forget-btn").type = "submit";
		document.getElementById("forget-form").method = "post";
		document.getElementById("forget-form").action = "?enviar=email";
	}
}