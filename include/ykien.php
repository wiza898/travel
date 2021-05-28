<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slapform/slapform.min.css">
</head>
<body>
<form action="https://api.slapform.com/huykhangvo02092000@gmail.com" method="POST">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <h1 class="mt-5">Thông báo lỗi</h1>
          <p class="lead">Thông tin bạn nhập dưới đây sẻ được gửi cho quản trị viên</p>
        </div>
        <div class="form-group">
          <label>Name</label>
          <input name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea name="message" type="textarea" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/slapform"></script>
<script type="text/javascript">
  var slapform = new Slapform(); // The script above exposes the global variable 'Slapform'
</script>
<script type="text/javascript">
  $( document ).ready(function() {
    $.ajax({
      url: 'https://api.slapform.com/huykhangvo02092000@gmail.com',
      dataType: 'json',
      method: 'POST',
      data: {
        name: 'Jon Snow',
        message: 'Hello World! This is my first Slapform submission.',
        slap_subject: 'New message from ${name} on ${slap_meta_date}'
      },
      success: function (response) {
        console.log('Got data: ', response);
        if (response.meta.status == 'success') {
          console.log('Submission was successful!');
        } else if (response.meta.status == 'fail') {
          console.log('Submission failed with these errors: ', response.meta.errors);
        }
      }
    });
  });
</script>
</body>
</html>