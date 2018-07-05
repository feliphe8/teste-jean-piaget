class Form {

    constructor(){
        this.telefoneElement = document.getElementById("telefone");
        this.nomeElement = document.getElementById("nome");
        this.desaddressElement = document.getElementById("desaddress");
        this.desnumberElement = document.getElementById("desnumber");
        this.desdistrictElement = document.getElementById("desdistrict");
        this.descityElement = document.getElementById("descity");
        this.desstateElement = document.getElementById("desstate");
        this.descountryElement = document.getElementById("descountry");
        this.birthElement = document.getElementById("birth");
        this.initialize();
    }

    initialize(){
        this.telefoneElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Números
            this.telefoneElement.value = this.telefoneElement.value.replace(/[^0-9]/, "");
        });

        this.desnumberElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Números
            this.desnumberElement.value = this.desnumberElement.value.replace(/[^0-9]/, "");
        });

        this.nomeElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Letras
            this.nomeElement.value = this.nomeElement.value.replace(/^[0-9]+$/, "");
        });

        this.desaddressElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Letras
            this.desaddressElement.value = this.desaddressElement.value.replace(/^[0-9]+$/, "");
        });

        this.desdistrictElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Letras
            this.desdistrictElement.value = this.desdistrictElement.value.replace(/^[0-9]+$/, "");
        });

        this.descityElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Letras
            this.descityElement.value = this.descityElement.value.replace(/^[0-9]+$/, "");
        });

        this.desstateElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Letras
            this.desstateElement.value = this.desstateElement.value.replace(/^[0-9]+$/, "");
        });

        this.descountryElement.addEventListener("keyup", () => {
            // Impede de inserir algo alem de Letras
            this.descountryElement.value = this.descountryElement.value.replace(/^[0-9]+$/, "");
        });

        // Verifica se o campo data de nascimento é maior do que o dia atual.
        this.birthElement.addEventListener("keyup", () => {
            let today = new Date();
            let birthday = new Date(this.birthElement.value);
            if (birthday > today){
                alert('Você não pode inserir uma data futura.');
                this.birthElement.focus();
                this.birthElement.value = "";
            }
        });
    }
}