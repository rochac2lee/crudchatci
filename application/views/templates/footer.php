<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script>

function clearMessage() {
  document.getElementById("message").value = "";
  document.getElementById("divMessage").classList.remove('is-focused');
  document.getElementById("divMessage").classList.remove('is-filled');
}

$(document).ready(function() {
  $("#btnNewMessage").click(function() {
  var message = document.getElementById("message").value;

    $.post("<?= base_url() ?>chat/newMessage", {message: message},
    function(data) {
      $("#return").html(data);
    } , "html");

    document.getElementById("message").value = "";
    document.getElementById("divMessage").classList.remove('is-focused');
    document.getElementById("divMessage").classList.remove('is-filled');

  });
});

</script>

</body>
</html>
