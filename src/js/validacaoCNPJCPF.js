//Função javascript para isso
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function leech(v){
    v=v.replace(/o/gi,"0")
    v=v.replace(/i/gi,"1")
    v=v.replace(/z/gi,"2")
    v=v.replace(/e/gi,"3")
    v=v.replace(/a/gi,"4")
    v=v.replace(/s/gi,"5")
    v=v.replace(/t/gi,"7")
    return v
}

function cpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}

function cnpj(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
    return v
}

// a função principal de validação
function validar(obj) { // recebe um objeto
	var s = (obj.value).replace(/\D/g,'');
	obj.value = s; // Atualiza o campo instantaneamente apenas com os números (remove a máscara)
	
	// Retorna imediatamente se estiver vazio para evitar loop de alertas
	if (s === '') {
	    return true;
	}
	
	var tam=(s).length; // removendo os caracteres não numéricos
	if (!(tam==11 || tam==14)){ // validando o tamanho
		alert("O numero digitado nao possui o tamanho correto de um CPF ou CNPJ!"); // tamanho inválido
		obj.value = ''; // Limpa o campo para evitar loop infinito
		return false;
	}
	
// se for CPF
	if (tam==11 ){
		if (!validaCPF(s)){ // chama a função que valida o CPF
			alert("O CPF digitado e invalido!"); // se quiser mostrar o erro
			obj.value = ''; // Limpa o campo para evitar loop infinito
			return false;
		}
		return true;
	}
	
// se for CNPJ			
	if (tam==14){
		if(!validaCNPJ(s)){ // chama a função que valida o CNPJ
			alert("O CNPJ digitado e invalido!"); // se quiser mostrar o erro
			obj.value = ''; // Limpa o campo para evitar loop infinito
			return false;			
		}
		
		// Integracao com BrasilAPI
		fetch(`https://brasilapi.com.br/api/cnpj/v1/${s}`)
			.then(response => response.json())
			.then(data => {
				if (data && !data.message) {
					var form = obj.form;
					if (form) {
						if (form.razao) form.razao.value = data.razao_social || '';
						if (form.fantasia) form.fantasia.value = data.nome_fantasia || '';
						if (form.endereco) form.endereco.value = data.logradouro || '';
						if (form.numero) form.numero.value = data.numero || '';
						if (form.bairro) form.bairro.value = data.bairro || '';
						if (form.cidade) form.cidade.value = data.municipio || '';
						
						if (form.telefone) {
						    if (data.ddd_telefone_1) {
    						    var tel = data.ddd_telefone_1.replace(/\D/g, '');
    						    if (tel.length === 10) {
    						        form.telefone.value = '(' + tel.substring(0,2) + ')' + tel.substring(2,6) + '-' + tel.substring(6,10);
    						    } else if (tel.length === 11) {
    						        form.telefone.value = '(' + tel.substring(0,2) + ')' + tel.substring(2,7) + '-' + tel.substring(7,11);
    						    } else {
    						        form.telefone.value = data.ddd_telefone_1;
    						    }
						    } else {
						        form.telefone.value = '';
						    }
						}
						
						if (form.email1) form.email1.value = (data.email || '').toLowerCase();

						if (form.estado) {
						    if (data.uf) {
                                var ufs = {
                                    'AC': 'Acre', 'AL': 'Alagoas', 'AP': 'Amap\u00E1', 'AM': 'Amazonas',
                                    'BA': 'Bahia', 'CE': 'Cear\u00E1', 'DF': 'Bras\u00EDlia', 'ES': 'Esp\u00EDrito Santo',
                                    'GO': 'Goi\u00E1s', 'MA': 'Maranh\u00E3o', 'MT': 'Mato Grosso', 'MS': 'Mato Grosso do Sul',
                                    'MG': 'Minas Gerais', 'PA': 'Par\u00E1', 'PB': 'Para\u00EDba', 'PR': 'Paran\u00E1',
                                    'PE': 'Pernambuco', 'PI': 'Piau\u00ED', 'RJ': 'Rio de Janeiro', 'RN': 'Rio Grande do Norte',
                                    'RS': 'Rio Grande do Sul', 'RO': 'Rond\u00F4nia', 'RR': 'Roraima', 'SC': 'Santa Catarina',
                                    'SP': 'S\u00E3o Paulo', 'SE': 'Sergipe', 'TO': 'Tocantins'
                                };
                                if (ufs[data.uf]) {
                                    form.estado.value = ufs[data.uf];
                                } else {
                                    form.estado.value = '';
                                }
                            } else {
                                form.estado.value = '';
                            }
                        }

						if (form.cep) {
						    if (data.cep) {
    							var rawCep = data.cep.replace(/\D/g, '');
    							if (rawCep.length === 8) {
    								form.cep.value = rawCep.substring(0,5) + '-' + rawCep.substring(5,8);
    							} else {
    								form.cep.value = data.cep;
    							}
    					    } else {
    					        form.cep.value = '';
    					    }
						}
					}
				}
			})
			.catch(error => console.error('Erro na BrasilAPI:', error));

		return true;
	}
}
// fim da funcao validar()

// função que valida CPF
// O algorítimo de validação de CPF é baseado em cálculos
// para o dígito verificador (os dois últimos)
// Não entrarei em detalhes de como funciona
function validaCPF(s) {
	var c = s.substr(0,9);
	var dv = s.substr(9,2);
	var d1 = 0;
	for (var i=0; i<9; i++) {
		d1 += c.charAt(i)*(10-i);
 	}
	if (d1 == 0) return false;
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(0) != d1){
		return false;
	}
	d1 *= 2;
	for (var i = 0; i < 9; i++)	{
 		d1 += c.charAt(i)*(11-i);
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(1) != d1){
		return false;
	}
    return true;
}

// Função que valida CNPJ
// O algorítimo de validação de CNPJ é baseado em cálculos
// para o dígito verificador (os dois últimos)
// Não entrarei em detalhes de como funciona
function validaCNPJ(CNPJ) {
	var a = new Array();
	var b = new Number;
	var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
	for (i=0; i<12; i++){
		a[i] = CNPJ.charAt(i);
		b += a[i] * c[i+1];
	}
	if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
	b = 0;
	for (y=0; y<13; y++) {
		b += (a[y] * c[y]);
	}
	if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
	if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
		return false;
	}
	return true;
}


	// Função que permite apenas teclas numéricas
	// Deve ser chamada no evento onKeyPress desta forma
	// return (soNums(event));
function soNums(e)
{
	if (document.all){var evt=event.keyCode;}
	else{var evt = e.charCode;}
	if (evt <20 || (evt >47 && evt<58)){return true;}
	return false;
}

//	função que mascara o CPF
function maskCPF(CPF){
	return CPF.substring(0,3)+""+CPF.substring(3,6)+""+CPF.substring(6,9)+""+CPF.substring(9,11);
}

//	função que mascara o CNPJ
function maskCNPJ(CNPJ){
	return CNPJ.substring(0,2)+""+CNPJ.substring(2,5)+""+CNPJ.substring(5,8)+""+CNPJ.substring(8,12)+""+CNPJ.substring(12,14);	
}
