<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script>

// Fecha o dropdown se clicar fora
$("body").on("click", function() {
  var divOptions = document.querySelector(".options");
  var dropdownOptions = document.querySelector(".dropdownOptions");
  dropdownOptions.classList.add('fadeOutRight');
  setTimeout(function(){
    dropdownOptions.innerHTML = "";
  }, 1000);
});

function confirmMessageDelete() {
  document.getElementById('divOptionConfirmDelete').style.display = "block";
  document.getElementById('actionConfirm').style.display = "block";
  document.getElementById('actionCancel').style.display = "block";
}

function cancelMessageDelete() {
  var dropdownOptionsDelete = document.querySelector(".dropdownOptionsDelete");
  var divOptions = document.querySelector(".dropdownOptionsDelete");
  document.getElementById('divOptionConfirmDelete').classList.add('fadeOutRight');
  setTimeout(function(){
    dropdownOptionsDelete.innerHTML = "";
  }, 1000);
}

//Função de Requisições
function CriaRequest() {
 try {
   request = new XMLHttpRequest();
 } catch (IEAtual){
   try {
     request = new ActiveXObject("Msxml2.XMLHTTP");
   } catch(IEAntigo) {
     try {
       request = new ActiveXObject("Microsoft.XMLHTTP");
     } catch(falha) {
       request = false;
     }
   }
 }
 if (!request)
   alert("Seu Navegador não suporta Ajax!");
 else
   return request;
}

//Função que limpa o input de mensagem
function clearMessage() {
  document.getElementById("message").value = "";
  document.getElementById("divMessage").classList.remove('is-focused');
  document.getElementById("divMessage").classList.remove('is-filled');
}

//passa  a mensagem para o usuário editar
function messageToEdit(id) {
  var message = document.getElementById("messageToEdit").innerHTML;
  document.getElementById("message").value = message;
  document.getElementById("message").focus();
  document.getElementById("divBtnSendMessage").innerHTML='<button type="button" id="btnNewMessage" onclick="newMessage('+ id +')" class="right btn btn-send btn-primary btn-raised"><i class="space fa fa-sync-alt"></i> Atualizar </button>';
}

//Função que adiciona novas mensagens
function newMessage(id) {

  //Valida se tem uma mensagem para editar ou se é uma nova mensagem
  if (id != null) {

    //envia a mensagem editada

    var message = document.getElementById("message").value;
    var edited  = 1;
    var time    = $('.time').text();

    //não permite enviar mensagem editada vazia
    if (message != "") {
      $.post("<?= base_url() ?>chat/editMessage/" + id, {message: message, autor: autor, edited: edited, time: time},
      function(data) {
        $("#return").html(data);
      } , "html");

      document.getElementById("message").value = "";
      document.getElementById("divMessage").classList.remove('is-focused');
      document.getElementById("divMessage").classList.remove('is-filled');
      document.getElementById("divBtnSendMessage").innerHTML='<button type="button" id="btnNewMessage" onclick="newMessage();descMessages();" class="right btn btn-send btn-primary btn-raised"><i class="space fa fa-paper-plane"></i> Enviar </button>';
    }

  } else {

    //envia a nova mensagem

    var message      = document.getElementById("message").value;
    var autor        = "<?= $_SESSION['loggedUser']['nome'] ?>";
    var time         = $('.time').text();

    //não permite enviar mensagem vazia
    if (message != "") {
      $.post("<?= base_url() ?>chat/newMessage", {message: message, autor: autor, time: time},
      function(data) {
        $("#return").html(data);
      } , "html");

      document.getElementById("message").value = "";
      document.getElementById("divMessage").classList.remove('is-focused');
      document.getElementById("divMessage").classList.remove('is-filled');
    }

  }

  descMessages();

};

//função para envio de imagens junto com a mensagem
function sendFiles() {
  var messageFiles = document.querySelector("#messageFiles");
  var autor        = "<?= $_SESSION['loggedUser']['nome'] ?>";
  var time         = $('.time').text();

  var form = $('#formMessage')[0];

  var files = messageFiles.files;
  var formData = new FormData(form);

      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        formData.append('files[]', file);
        var filesToUpload    = file.name;
        var fileTypeToUpload = file.type;

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url() ?>chat/saveFiles",
            data: formData,
            processData: false, // impedir que o jQuery tranforma a "data" em querystring
            contentType: false, // desabilitar o cabeçalho "Content-Type"
            cache: false, // desabilitar o "cache"
            // manipular o sucesso da requisição
            success: function (data) {
                console.log(data);
            },
            // manipular erros da requisição
            error: function (e) {
                console.log(e);
            }
        });

        /* $.post("<?= base_url() ?>chat/saveFiles", { body: formData },
        function(data) {
          $("#return").html(data);
        } , "html"); */

        $.post("<?= base_url() ?>chat/newFileMessage", {file: filesToUpload, fileType: fileTypeToUpload, autor: autor, time: time},
        function(data) {
          $("#return").html(data);
        } , "html");
      }

    document.getElementById("message").value = "";
    document.getElementById("divMessage").classList.remove('is-focused');
    document.getElementById("divMessage").classList.remove('is-filled');
}

//Passa o id da mensagem como parametro para as opções de editar e excluir
function options(id) {

  // Declaração de Variáveis
  var result = document.getElementById("divOptions");
  var xmlreq = CriaRequest();

  // Iniciar uma requisição
  xmlreq.open("GET", "<?= base_url() ?>chat/viewMessageOptions/" + id, true);

  // Atribui uma função para ser executada sempre que houver uma mudança de ado
  xmlreq.onreadystatechange = function(){

    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
    if (xmlreq.readyState == 4) {

      // Verifica se o arquivo foi encontrado com sucesso
      if (xmlreq.status == 200) {
        result.innerHTML = xmlreq.responseText;
        document.getElementById("divOptions").value = result.innerHTML;
      }else{
        result.innerHTML = "Erro: " + xmlreq.statusText;
      }
    }
  };
  xmlreq.send(null);

};

//Função que envia o id da mensagem a ser excluída para o backend
function deleteMessage(id) {

  // Declaração de Variáveis
  var xmlreq = CriaRequest();

  // Iniciar uma requisição
  xmlreq.open("GET", "<?= base_url() ?>chat/deleteMessage/" + id, true);

  // Atribui uma função para ser executada sempre que houver uma mudança de ado
  xmlreq.onreadystatechange = function(){

    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
    if (xmlreq.readyState == 4) {

      // Verifica se o arquivo foi encontrado com sucesso
      if (xmlreq.status == 200) {
        //Deletou a mensagem
      } else {
        result.innerHTML = "Erro: " + xmlreq.statusText;
      }
    }
  };
  xmlreq.send(null);

  //Oculta o dropdown de exclusão da mensagem selecionada
  var divOptions = document.querySelector(".dropdownOptionsDelete");
  document.getElementById('divOptionConfirmDelete').classList.add('fadeOutRight');
  setTimeout(function(){
    document.getElementById('divOptionConfirmDelete').style.display = "none";
  }, 1000);

};

//Função que carrega todas as mensagens e mostra dinâmicamente
function searchMessages() {

 // Declaração de Variáveis
 var result = document.getElementById("allMessages");
 var xmlreq = CriaRequest();

 // Iniciar uma requisição
 xmlreq.open("GET", "<?= base_url() ?>chat/viewMessage", true);
 setTimeout(searchMessages, 1000);

 // Atribui uma função para ser executada sempre que houver uma mudança de ado
 xmlreq.onreadystatechange = function(){

   // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
   if (xmlreq.readyState == 4) {

     // Verifica se o arquivo foi encontrado com sucesso
     if (xmlreq.status == 200) {

       result.innerHTML = xmlreq.responseText;
       document.getElementById("allMessages").value = result.innerHTML;

      //alert(result);
     }else{
       result.innerHTML = "Erro: " + xmlreq.statusText;
     }
   }
 };
 xmlreq.send(null);
}; searchMessages();

//Função que busca os usuários logados e lista dinâmicamente
function searchLoggedUsers() {

 // Declaração de Variáveis
 var loggedUsers = document.getElementById("loggedUsers");
 var xmlreq = CriaRequest();

 // Iniciar uma requisição
 xmlreq.open("GET", "<?= base_url() ?>chat/viewloggedUsers", true);
 setTimeout(searchLoggedUsers, 1000);

 // Atribui uma função para ser executada sempre que houver uma mudança de ado
 xmlreq.onreadystatechange = function(){

   // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
   if (xmlreq.readyState == 4) {

     // Verifica se o arquivo foi encontrado com sucesso
     if (xmlreq.status == 200) {

       loggedUsers.innerHTML = xmlreq.responseText;
       document.getElementById("loggedUsers").value = loggedUsers.innerHTML;

      //alert(result);
     }else{
       result.innerHTML = "Erro: " + xmlreq.statusText;
     }
   }
 };
 xmlreq.send(null);
}; searchLoggedUsers();

descMessages();

//Deixa sempre visível as ultimas mensagens enviadas
function descMessages() {
  $('#allMessages').animate({scrollTop: 9999},"slow");
}

</script>

</body>
</html>
