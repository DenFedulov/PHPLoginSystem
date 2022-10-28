function loadPHPOnClick(
  phpURL,
  data = {},
  targetJElem = $(".root"),
  method = "GET"
) {
  $.ajax({
    url: phpURL,
    data: data,
    context: targetJElem,
    method: method,
  }).done(function (data) {
    if ($(this).hasClass(".root")) {
      $(this).html(data);
    } else {
      responseFunc(data, targetJElem);
    }
  });
  return false;
}

function responseFunc(response, target) {
  if (response === $("#username").val() || target == "") {
    window.location.replace("./");
  } else {
    getFirstElem(target).innerHTML = response;
  }
}

function getFirstElem(JQElem) {
  return JQElem[JQElem.length - 1];
}

function updateTable() {
  $.get("inc/showuserstable.inc.php", function (response) {
    $("#users-table").html(response);
  });
}
