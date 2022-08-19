$("#sendButton").on("click", function () {
  event.preventDefault();

  $("#img").hide();

  var inputLogin = $("#inputLogin").val().trim();
  var inputEmail = $("#inputEmail").val().trim();
  var firstPass = $("#firstPass").val().trim();
  var secPass = $("#secPass").val().trim();
  var imgFile = $("#imgFile").val();

  if (inputLogin == "") {
    alert("Введите ваш логин!");
    return;
  } else if (inputEmail == "") {
    alert("Введите вашу почту!");
    return;
  } else if (firstPass == "") {
    alert("Введите ваш пароль!");
    return;
  } else if (firstPass == "") {
    alert("Введите ваш пароль повторно!");
    return;
  } else if (firstPass !== secPass) {
    alert("Введенные пароли не совпадают!");
    return;
  } else if (!imgFile) {
    alert("Файл не прикреплен!");
    return;
  }
  var form = this.form;
  var data = new FormData(form);

  $.ajax({
    url: "/form.php",
    method: "post",
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    success: function (data) {
      if (data.error == "") {
        $("form").hide();
        $(".container").append(
          "<div class='row'><h1 class='text-centre'>" +
            data.success +
            "</h1></div>"
        );

        $(".container").append(
          '<img src="img/img.jpeg" class="img-fluid rounded-top" id="img">'
        );
      } else {
        alert(data.error);
      }
    },
  });
});
