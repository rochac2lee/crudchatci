<main class="main">
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="animated fadeInDown col-md-4">
          <h3 class="title"><?= $title ?></h3> <i onclick=window.location.href="<?= base_url() ?>login/logout" class="close right fa fa-2x fa-sign-out-alt"></i>
          <div class="users">
            <img class="thumb" src="<?= base_url() ?>images/user.png"><p class="me">Bem Vindo, <?= $_SESSION['loggedUser']['nome'] ?>!</p>
          </div>

          <p class="linkLoggedusers">
            <button class="btn btn-loggedUsers" data-toggle="collapse" data-target="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="dot fas fa-circle"></i> Usuários Online
            </button>
          </p>
          <div class="collapse show" id="collapseExample">
            <div class="card card-body">
              <!-- Lista os usuários logados -->
              <div id="loggedUsers" class="loggedUsers"></div>
            </div>
          </div>

        </div>
        <div class="animated fadeInRight col-md-8">
          <div id="allMessages" class="allMessages"></div>
          <div id="divOptions" class="divOptions"></div>

          <div class="clearfix"></div>

          <form action="javascript:void(0)" method="post">
            <div id="divMessage" class="form-group">
              <textarea class="form-control message" id="message" rows="3" placeholder="Digite uma mensagem..."></textarea>
            </div>
            <button type="button" onclick="clearMessage()" class="btn btn-clear btn-default">Limpar</button>
            <button type="button" id="btnNewMessage" class="right btn btn-send btn-primary btn-raised"><i class="space fa fa-paper-plane"></i> Enviar </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
