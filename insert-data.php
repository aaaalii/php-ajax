<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax CRUD</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>PHP & Ajax CRUD</h1>

        <!-- <button id="loadbutton">Load Data</button> -->

        <!-- <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div> -->
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="addForm">
          First Name : <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Last Name : <input type="text" id="lname">
          <input type="submit" id="save-button" value="Save">
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  <div id="error-message"></div>
  <div id="success-message"></div>
  <!-- <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div> -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">

    $(document).ready(function(){
      function loadtable(){
        $.ajax({
            url: "ajax-load.php",
            type: "POST",
            success: function(data){
              $("#table-data").html(data);
            }
        });
    }
    loadtable();
    $("#save-button").on('click', function(e){
        e.preventDefault();

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        if(fname == "" || lname == ""){
            $("#error-message").html("All fields are required").slideDown();
            $("#success-message").slideUp();
        }
        else{

            $.ajax({
                url: "ajax-insert.php",
                type: "POST",
                data: {firstname: fname, lastname: lname},
                success: function(data){
                    if(data == 1){
                        loadtable();
                        $("#addForm").trigger('reset');
                        $("#success-message").html("Inserted successfully").slideDown();
                        $("#error-message").slideUp();
                    }
                    else
                        $("#error-message").html("Can't save record").slideDown();
                }
            })
        }
    })
    });




  </script>

</body>





</html>
