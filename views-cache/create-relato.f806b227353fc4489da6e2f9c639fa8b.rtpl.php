<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container container-form">
    <div class="row center-align">

        <h1>Criar relato</h1>

        <form class="col s12" action="/criar-relato" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="icon_telephone" type="text" class="validate" name="destitle" required>
                    <label for="icon_telephone">Título do relato</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">import_contacts</i>
                    <textarea id="icon_mode_edit" class="materialize-textarea validate" name="desbody" required></textarea>
                    <label for="icon_mode_edit">Relato</label>
                </div>



                <div class="input-field col s12">
                        <input id="submit" type="submit" class="btn green" value="Enviar">
                </div>
            </div>
        </form>
    </div>
</div>