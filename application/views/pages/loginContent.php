<main>
  <section class="section">
    <div class="container">
      <div class="col-md-4 about-right wow up fadeInUp animated animated" data-wow-delay=".5s">
        <div class="form-body">
          <div style="border-color: #929292; background-color: #f5f5f5; border-radius: 7px;  margin: 15px;">
            <div class="login">
              <img class="thumbLogin" src="https://media4.giphy.com/media/26FPJGjhefSJuaRhu/source.gif">
              <h3 class="titleLogin"><?= $title ?></h3>
            </div>
            <div class="loginForm col-md-8">
              <form method="post" action="<?= base_url() ?>login/signIn">
                <div class="form-group">
                  <label for="name" class="lblFirstName bmd-label-floating">Nome</label>
                  <input type="text" class="form-control inputFirstName" id="nome" name="nome">
                  <span class="bmd-help">Informe seu nome para entrar!</span>
                </div>

                <button type="submit" class="btn signin btn-login btn-primary btn-raised"><i class="space fa fa-check"></i> Entrar</button>
              </form>
            </div>

            <div class="clearfix"> </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
