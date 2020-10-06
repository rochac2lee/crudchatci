<main>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Chat</h3>

          <div class="users">
            <img class="thumb" src="<?= base_url() ?>images/user.png">
            <p class="nameUser">Cleberli</p>
          </div>
        </div>
        <div class="col-md-8">
          <div id="allMessages" class="allMessages">



          <!--

            <div id="viewMessage">
              <img class="thumbMessageRight" src="<?= base_url() ?>images/user.png">
              <p class="textMessageRight animated fadeInUp">Mensagem escrita aqui</p>
            </div>

          -->

          </div>

          <div class="clearfix"></div>

          <form action="javascript:void(0)" method="post">
            <div id="divMessage" class="form-group">
              <label for="sendMessage" class="bmd-label-floating">Escrever uma mensagem...</label>
              <textarea class="form-control" id="message" rows="3"></textarea>
            </div>
            <button type="button" onclick="clearMessage()" class="btn btn-clear btn-default">Limpar</button>
            <button type="button" id="btnNewMessage" class="right btn btn-send btn-primary btn-raised"><i class="space fa fa-paper-plane"></i> Enviar </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
