// JavaScript validação de cadastro (index) 
$(function(){
	$("#formcadastro").validate({
		rules: {
			userName: {
				required: true,
			},
			userPassword: {
				required: true,
				rangelength: [7,8]
			},
			userPassword2:{
				required: true,
				equalTo: "#userPassword"
			}
		}, 
		messages:{
			userName: {
				required: "Digite o nome completo !",
			},
			userPassword: {
				required: "Senha é obrigatória !",
				rangelength: "O mínino é de 7 caracteres e o máximo é 8 caracteres"
			},
			userPassword2:{
				required: "Digite a senha igual a anterior" ,
				equalTo: "Sua senha está diferente !"
			}
		}
	});

	$("#formperfil").validate({
		rules: {
			oldUserPassword: {
				required: true,
				rangelength: [7,8]
			},
			userPassword: {
				required: true,
				rangelength: [7,8]
			},
			passwordCompare:{
				required: true,
				equalTo: "#userPassword"
			}
		}, 
		messages:{
			oldUserPassword: {
				required: "Senha atual !",
				rangelength: "O mínino é de 7 caracteres e o máximo é 8 caracteres"
			},
			userPassword: {
				required: "Senha é obrigatória !",
				rangelength: "O mínino é de 7 caracteres e o máximo é 8 caracteres"
			},
			passwordCompare:{
				required: "Digite a senha igual a anterior" ,
				equalTo: "Sua senha está diferente !"
			}
		}
	});

	$("#formcatador").validate({
		rules: {
			catadorCEP: {
				required: true
			},
			catadorNome: {
				required: true
			}, 
			catadorEndereco: {
				required: true
			},
			catadorNum: {
				required: true
			},
			catadorBairro: {
				required: true
			},
			catadorCidade: {
				required: true
			},
			catadorUF: {
				required: true
			}
		}, 
		messages:{
			catadorCEP: {
				required: "CEP é obrigatório !"
			},
			catadorNome: {
				required: "Seu nome completo é obrigatório !"
			},
			catadorEndereco: {
				required: "Endereço é obrigatório !"
			},
			catadorNum: {
				required: "Número é obrigatório !"
			},
			catadorBairro: {
				required: "Bairro é obrigatório !"
			},
			catadorCidade: {
				required: "Cidade é obrigatório !"
			},
			catadorUF: {
				required: "Estado é obrigatório !"
			}
		}
	});

	$("#formrecover").validate({
		rules: {
			userPassword: {
				required: true,
				rangelength: [7,8]
			}
		}, 
		messages:{
			userPassword: {
				required: "Senha é oobrigatória !",
				rangelength: "O mínino é de 7 caracteres e o máximo é 8 caracteres"
			}
		}
	});
	$('#fone').mask('(00) 0000-00009');
	$('#fone').blur(function(e){
		if($(this).val().length == 15){
			$('#fone').mask("(00) 00000-0009");
		}else{
			$('#fone').mask("(00) 0000-00009");
		}
	});

	$("#catadorCEP").mask("99999-999");
	$('.buscacatadorendereco').change(function () {
        var cep = $(this).val().replace('-', '');
        if (cep.length === 8) {
            $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
                if (!data.erro) {
                    $('#catadorBairro').val(data.bairro);
                    $('#catadorCidade').val(data.localidade);
                    $('#catadorEndereco').val(data.logradouro);
                    $('#catadorUF').val(data.uf);
                }
            }, 'json');
        }
    });

	$("#descarteCEP").mask("99999-999");

    $('.buscalogradouro').change(function () {
        var cep = $(this).val().replace('-', '');
        if (cep.length === 8) {
            $.get("https://viacep.com.br/ws/" + cep + "/json", function (data) {
                if (!data.erro) {
                    $('.descarteBairro').val(data.bairro);
                    $('.descarteCidade').val(data.localidade);
                    $('.descarteRua').val(data.logradouro);
                    $('.descarteUF').val(data.uf);
                    $('.descarteIBGE').val(data.ibge);
                }
            }, 'json');
        }
    });

});