<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container dashboard blue-grey lighten-5">
    <div class="row">

        <h2>Dashboard</h2>

        <ul class="collection">
            <li class="collection-item avatar">
              <i class="material-icons circle">person</i>
              <span class="title"><?php echo htmlspecialchars( $user["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                <p><b>Biografia: </b><?php echo htmlspecialchars( $user["desbiograph"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                <p><b>Data de Nascimento: </b><?php echo DateTime::createFromFormat('Y-m-d', $user["desbirth"])->format('d/m/Y'); ?></p>   
                <p><b>Tel: </b><?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                <p><b>Endereço: </b><?php echo htmlspecialchars( $address["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, nº<?php echo htmlspecialchars( $address["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $address["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - CEP: <?php echo htmlspecialchars( $address["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $address["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $address["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $address["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                 <p class="right-align"><a href="/criar-relato" class="btn-small green">Criar Relato</a></p>
              <a href="/logout" class="secondary-content"><i class="material-icons">power_settings_new</i></a>
            </li>
          </ul>

        <?php $counter1=-1;  if( isset($posts) && ( is_array($posts) || $posts instanceof Traversable ) && sizeof($posts) ) foreach( $posts as $key1 => $value1 ){ $counter1++; ?>
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <p class="card-title"><?php echo htmlspecialchars( $value1["destitle"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                  <p><?php echo htmlspecialchars( $value1["desbody"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
                <div class="card-action">
                  <a href="/atualizar-relato/<?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Atualizar relato</a>
                  <a href="/deletar-relato/<?php echo htmlspecialchars( $value1["idpost"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Deletar relato</a>
            </div>
        </div>
        <?php } ?>

    </div>
</div>