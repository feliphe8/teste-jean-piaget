<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container container-form">
    <div class="row center-align">

        <h2>Atualizar relato</h2>

        <form class="col s12" action="/atualizar-relato/<?php echo htmlspecialchars( $post["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="icon_telephone" type="text" class="validate" name="destitle" value="<?php echo htmlspecialchars( $post["destitle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                    <label for="icon_telephone">Título do relato</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">import_contacts</i>
                    <textarea id="icon_mode_edit" class="materialize-textarea validate" name="desbody" required><?php echo htmlspecialchars( $post["desbody"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                    <label for="icon_mode_edit">Relato</label>
                </div>



                <div class="input-field col s12">
                        <input id="submit" type="submit" class="btn green" value="Enviar">
                </div>
            </div>
        </form>
    </div>
</div>