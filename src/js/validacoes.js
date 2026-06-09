// Converte minusculas em maiusculas
function up(lstr){ 
    var str = lstr.value; 
    lstr.value = str.toUpperCase(); 
}

// Converte maiusculas em minusculas
function down(lstr){ 
    var str = lstr.value; 
    lstr.value = str.toLowerCase(); 
}

//Adiciona mascara de cep
function MascaraCep(cep){
    if(mascaraInteiro(cep)==false){
        event.returnValue = false;
    }       
    return formataCampo(cep, '00000-000', event);
}

//Valida CEP e preenche endereço automaticamente via API ViaCEP
function ValidaCep(cep){
    var exp = /\d{2}\d{3}\-\d{3}/
    if(!exp.test(cep.value)){
        alert('Numero de Cep Invalido!');
        return;
    }
    
    var cepNumeros = cep.value.replace(/\D/g, '');
    if (cepNumeros !== "") {
        fetch(`https://viacep.com.br/ws/${cepNumeros}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    var form = cep.form;
                    if (form) {
                        if (form.endereco) form.endereco.value = data.logradouro;
                        if (form.bairro) form.bairro.value = data.bairro;
                        if (form.cidade) form.cidade.value = data.localidade;
                        if (form.estado) {
                            var ufs = {
                                'AC': 'Acre', 'AL': 'Alagoas', 'AP': 'Amapá', 'AM': 'Amazonas',
                                'BA': 'Bahia', 'CE': 'Ceará', 'DF': 'Brasília', 'ES': 'Espírito Santo',
                                'GO': 'Goiás', 'MA': 'Maranhão', 'MT': 'Mato Grosso', 'MS': 'Mato Grosso do Sul',
                                'MG': 'Minas Gerais', 'PA': 'Pará', 'PB': 'Paraíba', 'PR': 'Paraná',
                                'PE': 'Pernambuco', 'PI': 'Piauí', 'RJ': 'Rio de Janeiro', 'RN': 'Rio Grande do Norte',
                                'RS': 'Rio Grande do Sul', 'RO': 'Rondônia', 'RR': 'Roraima', 'SC': 'Santa Catarina',
                                'SP': 'São Paulo', 'SE': 'Sergipe', 'TO': 'Tocantins'
                            };
                            if (ufs[data.uf]) {
                                form.estado.value = ufs[data.uf];
                            }
                        }
                    }
                }
            })
            .catch(error => console.error('Erro na API ViaCEP:', error));
    }
}

//Adiciona mascara ao telefone
function MascaraTelefone(telefone){  
    if(mascaraInteiro(telefone)==false){
        event.returnValue = false;
    }       
    return formataCampo(telefone, '(00)0000-0000', event);
}

//Valida telefone
function ValidaTelefone(telefone){
    var exp = /\(\d{2}\)\d{4}\-\d{4}/
    if(!exp.test(telefone.value))
        alert('Numero de Telefone Invalido!');
}

//Valida numero inteiro com mascara
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.returnValue = false;
        return false;
    }
    return true;
}

//Formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
    var boleanoMascara; 
    var Digitato = evento.keyCode;
    var exp = /\-|\.|\/|\(|\)| /g
    var campoSoNumeros = campo.value.toString().replace( exp, "" ); 
    var posicaoCampo = 0;    
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;; 

    if (Digitato != 8) { // backspace 
        for(var i=0; i<= TamanhoMascara; i++) { 
            boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".") || (Mascara.charAt(i) == "/")) 
            boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
            if (boleanoMascara) { 
                NovoValorCampo += Mascara.charAt(i); 
                TamanhoMascara++;
            } else { 
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                posicaoCampo++; 
            }              
        }      
        campo.value = NovoValorCampo;
        return true; 
    } else { 
        return true; 
    }
}


function cambia_classeav() {
    var grupomerc = document.f1.grupomerc.value;
    var classeav = document.f1.classeav;
    classeav.options.length = 0;

    if (grupomerc == 'ZAPE') {
        classeav.options[0] = new Option('Mat.Emb. e apeação carga', 'Mat.Emb. e apeação carga');
        classeav.options[1] = new Option('Outros gastos mat.dir.apl', 'Outros gastos mat.dir.apl');
    } else if (grupomerc == 'ZCOM') {
        classeav.options[0] = new Option('Combustíveis e lubrific.', 'Combustíveis e lubrific.');
    } else if (grupomerc == 'ZEXP') {
        classeav.options[0] = new Option('Material de Expediente', 'Material de Expediente');
        classeav.options[1] = new Option('Material de copa/cozinha', 'Material de copa/cozinha');
        classeav.options[2] = new Option('Mat.higiene/limpeza', 'Mat.higiene/limpeza');
        classeav.options[3] = new Option('Material de TI', 'Material de TI');
        classeav.options[4] = new Option('Bens de pequeno valor', 'Bens de pequeno valor');
        classeav.options[5] = new Option('Brindes', 'Brindes');
        classeav.options[6] = new Option('Festas e recepções', 'Festas e recepções');
        classeav.options[7] = new Option('Jornais/Revistas/Livros', 'Jornais/Revistas/Livros');
    } else if (grupomerc == 'ZFER') {
        classeav.options[0] = new Option('Ferramentas e utensílios', 'Ferramentas e utensílios');
    } else if (grupomerc == 'ZMAN') {
        classeav.options[0] = new Option('Mat.Manut.Cons.Maq.Equip.', 'Mat.Manut.Cons.Maq.Equip.');
        classeav.options[1] = new Option('Mat.man.edificações', 'Mat.man.edificações');
        classeav.options[2] = new Option('Mat.Manut.Cons.Mov.Utens.', 'Mat.Manut.Cons.Mov.Utens.');
    } else if (grupomerc == 'ZNAV') {
        classeav.options[0] = new Option('Material não avaliado', 'Material não avaliado');
    } else if (grupomerc == 'ZSAU') {
        classeav.options[0] = new Option('Saúde ocupacional', 'Saúde ocupacional');
    } else if (grupomerc == 'ZSEG') {
        classeav.options[0] = new Option('Equipamentos de segurança', 'Equipamentos de segurança');
        classeav.options[1] = new Option('Gastos Segurança Predial', 'Gastos Segurança Predial');
    } else if (grupomerc == 'ZVEI') {
        classeav.options[0] = new Option('Peças e aces. de veículos', 'Peças e aces. de veículos');
    } else {
        classeav.options[0] = new Option('-', '-');
    }
}


// Restauração de formulários via sessionStorage (para prevenir perda de dados em erros)
$(document).ready(function() {
    // 1. Salvar os dados sempre que algo for digitado ou alterado
    $('form').on('keyup change', 'input, select, textarea', function() {
        var formData = $(this).closest('form').serializeArray();
        sessionStorage.setItem('savedForm', JSON.stringify(formData));
    });

    // 2. Limpar os dados se a página foi enviada com sucesso
    if (window.location.search.indexOf('a=envio') > -1 || window.location.search.indexOf('a=alterado') > -1) {
        sessionStorage.removeItem('savedForm');
    }

    // 3. Restaurar os dados se a página retornou com um erro de validação
    if (window.location.search.indexOf('erro') > -1) {
        var savedForm = sessionStorage.getItem('savedForm');
        if (savedForm) {
            var formData = JSON.parse(savedForm);
            $.each(formData, function(index, item) {
                // Escapar colchetes para seletores jquery (ex: name='centro[]')
                var nameStr = item.name.replace(/\[/g, '\\[').replace(/\]/g, '\\]');
                var elem = $('[name="' + nameStr + '"]');
                
                if (elem.is(':checkbox') || elem.is(':radio')) {
                    $('[name="' + nameStr + '"][value="' + item.value + '"]').prop('checked', true);
                } else {
                    elem.val(item.value);
                }
            });

            // Re-executa as lógicas de dropdowns acorrentados (ex: Material Próprio)
            if (typeof cambia_classeav === "function" && $('select[name="grupomerc"]').length > 0) {
                cambia_classeav();
                // Repõe a opção de Aplicação pois o cambia_classeav a apagou
                var classeavItem = $.grep(formData, function(e){ return e.name === 'classeav'; });
                if (classeavItem.length > 0) {
                    $('select[name="classeav"]').val(classeavItem[0].value);
                }
            }
        }
    }
});



//valida NCM
function ValidaNCM(ncm){
    var exp = /\d{4}\.\d{2}\.\d{2}/;
    if(!exp.test(ncm.value) && ncm.value !== '') {
        alert('Numero de NCM inválido!');
    }
}

// NCM Auto-Formatting e Autocomplete
function MascaraNCM(campo) {
    var v = campo.value.replace(/\D/g, '');
    if (v.length > 4) v = v.replace(/^(\d{4})(\d)/, "$1.$2");
    if (v.length > 7) v = v.replace(/^(\d{4})\.(\d{2})(\d)/, "$1.$2.$3");
    campo.value = v.substring(0, 10);
}

$(document).ready(function() {
    $('input[name="ncm"]').on('keyup', function() {
        MascaraNCM(this);
    });

    $('input[name="ncm"]').on('blur', function() {
        var ncm = $(this).val().replace(/\D/g, '');
        var feedback = $('#ncm_feedback');
        
        if (ncm.length < 4) {
            feedback.html('');
            return;
        }
        
        feedback.html('<span style="color: #666;"><i class="icon-spinner icon-spin"></i> Consultando base NCM...</span>').show();
        
        $.ajax({
            url: 'ncm_search.php?q=' + ncm,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    if (response.exact_match) {
                        feedback.html('<span style="color: #3c763d;"><i class="icon-ok"></i> <b>NCM Válido:</b> ' + response.descricao + '</span>');
                    } else {
                        var html = '<div style="background: #fcf8e3; color: #8a6d3b; padding: 10px; border-radius: 5px; margin-top: 5px; font-size: 13px;">';
                        html += '<i class="icon-warning-sign"></i> <b>NCM não existe no sistema local.</b> Você quis dizer:';
                        html += '<ul style="margin: 5px 0 0 20px;">';
                        $.each(response.suggestions, function(i, sug) {
                            html += '<li><a href="javascript:void(0);" class="apply-ncm-sug" data-ncm="' + sug.codigo + '"><b>' + sug.codigo + '</b></a> - ' + sug.descricao + '</li>';
                        });
                        html += '</ul></div>';
                        feedback.html(html);
                        
                        // Ao clicar na sugestão, preenche o campo
                        $('.apply-ncm-sug').click(function() {
                            $('input[name="ncm"]').val($(this).data('ncm'));
                            $('input[name="ncm"]').trigger('blur'); // Re-valida
                        });
                    }
                } else {
                    feedback.html('<span style="color: #a94442;"><i class="icon-remove"></i> ' + response.message + '</span>');
                }
            },
            error: function() {
                feedback.html('<span style="color: #a94442;"><i class="icon-remove"></i> Erro de comunicação com o servidor.</span>');
            }
        });
    });
});
