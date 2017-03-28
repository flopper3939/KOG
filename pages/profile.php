<?php
$is_user;
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = tools::getValue('id');
  $student = new student($id);
  if ($student->id_student == $context->student->id_student)
    $is_user = true;
  else 
    $is_user = false;
  if ($student->inDB) {

  }
  else {
    echo "<h1>user does not exist.</h1>";

  }
}
else {
  $is_user = true;
}


if ($is_user) {
?>
<h2>Min Side</h2>
<form method="POST" action="<?php echo _HOST_ ?>/forms/update_student.php">
  <div class="form-group">
    <label for="f_name">Fornavn:</label>
    <input type="text" class="form-control" name="firstname" id="f_name" value="<?php echo $context->student->first_name ?>">
  </div>
  <div class="form-group">
    <label for="l_name">Efternavn:</label>
    <input type="text" class="form-control" name="lastname" id="l_name" value="<?php echo $context->student->last_name ?>">
  </div>
  <input type="hidden" name="student_id" value="<?php echo $context->student->id_student ?>">
  <?php echo CSRF::getFormToken();?>
  <button type="submit" class="btn btn-primary">Gem</button>
</form>
<br>
<button class="btn btn-primary update-password">Change my password</button>
<script type="text/javascript">
var password1;
$(".update-password").click(function(){
    swal({
      title: "Update password",
      text: "Update your password:",
      type: "input",
      showCancelButton: true,
      closeOnConfirm: false,
      animation: "slide-from-top",
      inputType: "password",
      inputPlaceholder: "Type your new password here!"
    },
    function(inputValue){
        if (inputValue === false) return false;      
        if (inputValue === "") {
            swal.showInputError("Error");     
            return false;
        }
        password1 = inputValue;
        swal({
          title: "Confirm password",
          text: "Confirm your new password:",
          type: "input",
          showCancelButton: true,
          closeOnConfirm: false,
          animation: "slide-from-top",
          inputType: "password",
          showLoaderOnConfirm: true,
          inputPlaceholder: "Confirm password"
        },
        function(inputValue){
            if (inputValue === false) return false;      
            if (inputValue === "") {     
                swal.showInputError("Password error");     
                return false;
            }
            if (password1 == inputValue) {
              $.post("<?php echo _HOST_."/ajax/updatePassword.php";?>", { password: inputValue, <?php echo CSRF::getAjaxToken(); ?> })
                .done(function( data ) {
                  if (data == "2") {
                    location.reload();
                  }
                  else if (data == "1") {
                    swal({
                      title: "Completed",
                      text: "Your password has been updated!",
                      type: "success",
                    },
                    function(){
                      location.reload();
                    });
                    }
                  else 
                    swal("Something went wrong.", "Please contact support for more info.", "error");
                });
            }
            else {
                setTimeout(function(){
                  sweetAlert("Error!", "Password did not match!", "error");
                }, 1);
            }
        });
    });                 
});
</script>
<?php
}
else {
$education = new education($student->id_education);
?>
          <div class="col-lg-12">
          <div class="container">
            <div class="row">
              <div class="col-md-5 toppad pull-right col-md-offset-3"></div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $student->first_name . ' ' . $student->last_name; ?></h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div align="center" class="col-md-3 col-lg-3">
                        <img alt="User Pic" src=<?php echo '"'. _IMG_PATH_.'students/'.$student->id_student.'.jpg"';?> class="img-circle img-responsive">
                      </div>
                      <div class=" col-md-9 col-lg-9">
                        <table class="table table-user-information">
                          <tbody>
                            <tr>
                              <td>Uddanelse</td>
                              <td><?php echo $education->education_name; ?></td>
                            </tr>
                            <tr>
                              <td>Team</td>
                              <td>13</td>
                            </tr>
                            <tr>
                              <td>Status</td>
                              <td>Er på h3</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>
                                <a href="mailto:placeholder@placeholder.placeholder">placeholder</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer">
                    <a class="btn btn-sm btn-primary" type="button"><span><i aria-hidden="true" class="fa fa-envelope"></i> <b>Send a message to <?php echo $student->first_name;?></b></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
<?php
}


?>