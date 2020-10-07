<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script>

//Função que limpa o input de mensagem
function clearMessage() {
  document.getElementById("message").value = "";
  document.getElementById("divMessage").classList.remove('is-focused');
  document.getElementById("divMessage").classList.remove('is-filled');
}

//Função que adiciona novas mensagens
$(document).ready(function() {
  $("#btnNewMessage").click(function() {
  var message = document.getElementById("message").value;
  var autor   = $('.nameUser').text();
  var date    = $('.clock').text();

    $.post("<?= base_url() ?>chat/newMessage", {message: message, autor: autor, date: date},
    function(data) {
      $("#return").html(data);
    } , "html");

    document.getElementById("message").value = "";
    document.getElementById("divMessage").classList.remove('is-focused');
    document.getElementById("divMessage").classList.remove('is-filled');

    $('#allMessages').animate({scrollTop: document.body.scrollHeight},"fast");

  });
});

//Função de Busca por novas Mensagens
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

//Função que carrega todas as mensagens e mostra dinâmicamente
function searchMessages() {

 // Declaração de Variáveis
 var result = document.getElementById("allMessages");
 var xmlreq = CriaRequest();

 // Iniciar uma requisição
 xmlreq.open("GET", "<?= base_url() ?>chat/viewMessage", true);
 setTimeout(searchMessages, 60000);

 // Atribui uma função para ser executada sempre que houver uma mudança de ado
 xmlreq.onreadystatechange = function(){

   // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
   if (xmlreq.readyState == 4) {

     // Verifica se o arquivo foi encontrado com sucesso
     if (xmlreq.status == 200) {

       result.innerHTML = xmlreq.responseText;
       document.getElementById("allMessages").value = result.innerHTML;

       //Sempre mostrando a última mensagem
       //$('#allMessages').animate({scrollTop: document.body.scrollHeight},"fast");

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

$('#allMessages').animate({scrollTop: document.body.scrollHeight},"fast");

</script>

</body>
</html>
