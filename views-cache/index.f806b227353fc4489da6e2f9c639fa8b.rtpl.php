<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container container-form">
    <div class="row center-align">

        <h2>Diário Virtual</h2>

        <form class="col s12" action="/register" method="POST">
            <div class="row">
                <div class="input-field col s8">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nome" type="text" class="validate" name="desname" required placeholder="Ex: Feliphe Simões">
                    <label for="icon_prefix">Nome</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">date_range</i>
                    <input id="birth" type="date" class="validate" name="desbirth" required>
                    <label for="icon_cake">Data de Nascimento</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">book</i>
                    <textarea id="biografia" class="materialize-textarea validate" name="desbiograph" required placeholder="Ex: Esta é a minha biografia."></textarea>
                    <label for="icon_mode_edit">Biografia</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <input id="telefone" type="tel" class="validate" name="nrphone" maxlength="13" required placeholder="Ex: 988741299">
                    <label for="icon_telephone">Telefone</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">room</i>
                    <input id="deszipcode" type="text" class="validate" name="deszipcode" maxlength="8" required placeholder="Ex: 11035010">
                    <label for="icon_telephone">CEP</label>
                </div>

                <div class="input-field col s9">
                    <i class="material-icons prefix">home</i>
                    <input id="desaddress" type="text" class="validate" name="desaddress" required placeholder="Ex: Rua do Joãozinho">
                    <label for="icon_telephone">Endereço</label>
                </div>

                <div class="input-field col s3">
                    <i class="material-icons prefix">home</i>
                    <input id="desnumber" type="text" class="validate" name="desnumber" required placeholder="Ex: 5">
                    <label for="icon_telephone">Número</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">home</i>
                    <input id="descomplement" type="text" class="validate" name="descomplement" required placeholder="Ex: Bloco 3">
                    <label for="icon_telephone">Complemento</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">home</i>
                    <input id="desdistrict" type="text" class="validate" name="desdistrict" required placeholder="Ex: Morumbi">
                    <label for="icon_telephone">Bairro</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">home</i>
                    <input id="descity" type="text" class="validate" name="descity" required placeholder="Ex: Salt Lake City">
                    <label for="icon_telephone">Cidade</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">home</i>
                    <input id="desstate" type="text" class="validate" name="desstate" required placeholder="Ex: RJ">
                    <label for="icon_telephone">Estado</label>
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix">home</i>
                    <input id="descountry" type="text" class="validate" name="descountry" required placeholder="Ex: Rússia">
                    <label for="icon_telephone">País</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="desemail" type="email" class="validate" name="desemail" required placeholder="Ex: meuemail@email.com">
                    <label for="icon_telephone">Email</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="despassword" type="password" class="validate" name="despassword" required placeholder="Digite sua senha">
                    <label for="icon_telephone">Senha</label>
                </div>





                <div class="input-field col s12">
                        <input id="submit" type="submit" class="btn green" value="Enviar" required>
                </div>
            </div>
        </form>
    </div>
</div>