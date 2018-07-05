class CEP {
    constructor(){
        this.lastCepCheck = '';
        this.deszipcodeElement = document.getElementById("deszipcode");
        this.desaddressElement = document.getElementById("desaddress");
        this.desdistrictElement = document.getElementById("desdistrict");
        this.descityElement = document.getElementById("descity");
        this.desstateElement = document.getElementById("desstate");
        this.initialize();
    }

    initialize(){
        this.deszipcodeElement.addEventListener("keyup", () => {
            //Impede de inserir algo alem de Números
            this.deszipcodeElement.value = this.deszipcodeElement.value.replace(/[^0-9]/, "");
            // Pega os números digitados
            let cep = this.deszipcodeElement.value.replace(/[^0-9]/, "");

            //Só pesquisa se tiver 8 caracteres e o ultimo cep pesquisado seja diferente do atual.
            if (cep.length != 8 || this.lastCepCheck == cep) {
                return false;
            }

            this.lastCepCheck = cep;

            // Instância o ajax e faz a requisição da API
            let ajax = new XMLHttpRequest();
            let url = "http://viacep.com.br/ws/"+cep+"/json/";
            ajax.open('GET', url, true);
            ajax.send();

            ajax.onreadystatechange = () => {
                if(ajax.readyState == 4 && ajax.status == 200) {
                    
                    // Preenche os campos com os dados que vieram da API
                    let json = JSON.parse(ajax.responseText);
                    this.desaddressElement.value = json.logradouro;
                    this.desdistrictElement.value = json.bairro;
                    this.descityElement.value = json.localidade;
                    this.desstateElement.value = json.uf;	
                    
                }
            }
            
        });
    }


    // GET E SET PARA CEP
    get deszipcode(){
        return this.deszipcodeElement.innerHTML;
    }

    set desizpcode(value){
      this.deszipcodeElement.value = value;  
    }

    // GET E SET PARA ENDEREÇO
    get desaddress(){
        return this.desaddressElement.innerHTML;
    }

    set desaddress(value){
        this.desaddressElement.value = value;
    }


    // GET E SET PARA BAIRRO
    get desdistrict(){
        return this.desdistrictElement.innerHTML;
    }

    set desdistrict(value){
        this.desdistrictElement.value = value;
    }

    // GET E SET PARA CIDADE
    get descity(){
        return this.descityElement.innerHTML;
    }

    set descity(value){
        this.descityElement.value = value;
    }

    // GET E SET PARA ESTADO
    get desstate(){
        return this.desstateElement.innerHTML;
    }

    set desstate(value){
        this.desstateElement.value = value;
    }


}