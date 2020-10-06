<main>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="login">
            <h3><?= $title ?></h3>
            <img class="thumbLogin" src="<?= base_url() ?>images/user.png">
          </div>
            <div class="loginForm col-md-5">
              <form method="post" action="<?= base_url() ?>login/signIn">
                <div class="form-group">
                  <label for="name" class="bmd-label-floating">Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome">
                  <span class="bmd-help">Informe seu nome para entrar!</span>
                </div>

                <button type="submit" class="btn btn-login btn-primary btn-raised"><i class="space fa fa-check"></i> Entrar</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </section>
</main>
