<form id="register-form" action="index.php?acao=registrar" method="post" role="form" style="display: none;">

    <div class="form-group">
        <input type="text" name="usuario" id="usuario" tabindex="1" class="form-control" maxlength="15" placeholder="Usuário (Para efetuar login)" value="<?php if(isset($usuario)){echo $usuario;}?>" required="true">
    </div>

    <div class="form-group">
        <input type="text" name="nome" id="nome" tabindex="1" class="form-control" maxlength="30" placeholder="Nome" value="<?php if(isset($nomeUsuario)){echo $nomeUsuario;}?>" required="true">
    </div>

    <div class="form-group">
        <input type="text" name="sobrenome" id="sobrenome" tabindex="1" class="form-control" maxlength="45" placeholder="Sobrenome" value="<?php if(isset($sobrenomeUsuario)){echo $sobrenomeUsuario;}?>" required="true">
    </div>

    <div class="form-group">
        <input type="text" name="cpf" id="cpf" class="form-control" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" placeholder="CPF" value="<?php if(isset($cpfUsuario)){echo $cpfUsuario;}?>" required="true">
    </div>
    <div class="form-group">
        <input type="email" name="email" id="email" tabindex="1" class="form-control" maxlength="45" placeholder="Endereço de e-mail" value="<?php if(isset($emailUsuario)){echo $emailUsuario;}?>" required="true">
    </div>
                                           
    <div class="form-group">
        <input type="cep" name="cep" id="cep" class="form-control"  value="" size="10" maxlength="9"
                                                       onblur="pesquisacep(this.value);" OnKeyPress="formatar('#####-###', this)" placeholder="CEP (Somente numerais)" value="<?php if(isset($cepUsuario)){echo $cepUsuario;}?>">
    </div>
    
    <div class="form-group">
        <input type="text" name="rua" id="rua" tabindex="1" class="form-control" maxlength="40" placeholder="Rua" value="<?php if(isset($rua)){echo $rua;}?>">
    </div>

    <div class="form-group">
        <input type="text" name="bairro" id="bairro" tabindex="1" class="form-control" maxlength="40" placeholder="Bairo" value="<?php if(isset($bairro)){echo $bairro;}?>">
    </div>

    <div class="form-group">
        <input type="text" name="cidade" id="cidade" tabindex="1" class="form-control" maxlength="40" placeholder="Cidade" value="<?php if(isset($cidade)){echo $cidade;}?>">
    </div>

    <div class="form-group">
        <input type="text" name="uf" id="uf" tabindex="1" class="form-control" maxlength="40" placeholder="UF" value="<?php if(isset($uf)){echo $uf;}?>">
    </div>

    <div class="form-group">
        <input type="password" name="senha" id="senha" tabindex="2" class="form-control" maxlength="20" placeholder="Senha" required="true">
    </div>
                                           
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-primary " value="Registrar">
            </div>     
        </div>
    </div>

</form>