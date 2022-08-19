$("#req_send_butt").on("click", function () {
  event.preventDefault();

  var request_text = $("#request_text").val().trim();
  var request_text_area = $("#request_text_area").val().trim();

  var imgFile = $("#imgFile").val();

  if (request_text == "") {
    alert("Введите название статьи!");
    return;
  } else if (request_text_area == "") {
    alert("Введите текст статьи!");
    return;
  } else if (!imgFile) {
    alert("Файл не прикреплен!");
    return;
  }
  var form = this.form;
  var data = new FormData(form);

  $.ajax({
    url: "/requests/creation.php",
    method: "post",
    cache: false,
    contentType: false,
    processData: false,
    data: data,
    success: function (data) {
      alert(data);
      // if (data.error == "") {
      //   $("form").hide();
      //   $(".container").append(
      //     "<div class='row'><h1 class='text-centre'>" +
      //       data.success +
      //       "</h1></div>"
      //   );
      //   $(".container").append(
      //     '<img src="img/img.jpeg" class="img-fluid rounded-top" id="img">'
      //   );
      // } else {
      //   alert(data.error);
      // }
    },
  });
});
