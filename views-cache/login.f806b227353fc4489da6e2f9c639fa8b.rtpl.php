<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container container-form">
    <div class="row center-align">

        <h2>Login</h2>

        <form class="col s12" action="/login" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_telephone" type="email" class="validate" name="email" required>
                    <label for="icon_telephone">Email</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_telephone" type="password" class="validate" name="password" required>
                    <label for="icon_telephone">Senha</label>
                </div>





                <div class="input-field col s12">
                        <input id="submit" type="submit" class="btn indigo" value="Enviar">
                </div>
            </div>
        </form>
    </div>
</div>