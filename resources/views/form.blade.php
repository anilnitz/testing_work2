<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<form id="form-submit" method="POST">
  <label for="fname">Name:</label><br>
  <input type="text" class="aa" ss="ddd" name="name" id="name"><br>
  <label for="fname">Email:</label><br>
  <input type="email" name="email" id="email"><br>
  <label for="fname">State:</label><br>
  <select class="state_list" name="state_id">
  </select><br/>
  <label for="fname">PAN Card:</label><br>
  <input type="text" name="panno" id="panno" maxlength="10" oninput="this.value = this.value.replace().replace(/(\..*)\./g, '$1');"><br/>
  <label for="lname">GST:</label><br/>
  <input type="text" id="txtGSTIN" name="txtGSTIN" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" title="Invalid GST Number." /><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
<script type="text/javascript">
	$(document).ready(function () {
    let _token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:  '/statelist',
        type: 'post',
        dataType: 'JSON',
        data: {
             _token: _token
        },
        success: function (data) {
            console.log(data);
            $('.state_list').html('');
            $('.state_list').append('<option state_code="33" value="">Select Country</option>');
            $.each(data, function (index, data) {
                $('.state_list').append('<option state_code="' + data['state_code'] + '" state_name="' + data['name'] + '"country_id="' + data['id'] + '" value="' + data['name'] + '">' + data['name'] + '</option>');
            });
        },
        error: function (data) {
            console.log('8888888');
            console.log(data);
            console.log('unable to send request..');
        }
    });
});
</script>
<script type="text/javascript">
	$("#form-submit").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    let _token   = $('meta[name="csrf-token"]').attr('content');
    var state_code = $('.state_list option:selected').attr('state_code');
    console.log(state_code);
    var name = $('#name').val();
    var email = $('#email').val();
    var state_id = $('.state_list option:selected').attr('state_name');
    var panno = $('#panno').val();
    var txtGSTIN = $('#txtGSTIN').val();
    $.ajax({
        url: "/formsubmit",
        type:"POST",
        data:{
          
          name: name,
          email: email,
          state_id: state_id,
          state_code: state_code,
          panno: panno,
          txtGSTIN: txtGSTIN,
          _token: _token
        },
        success:function(response){
          console.log(response);
        },
       });

    
});


</script>
</html>