
    <script>
        
        var a = document.getElementById("show");
        
        var $password = $("#oldpass");
        var $newPassword = $("#newpass");
        var $confirmPassword = $("#again");
        
        $("form span").hide();
        
        function isPasswordValid() {
            var sessName = <?php echo json_encode($_SESSION['pass']) ?>;
            var s = parseInt($password.val());
            return s === sessName;
        }
        
        
        
        function arePasswordsMatching() {
            return $newPassword.val() === $confirmPassword.val();
        }

        function canSubmit() {
            return isPasswordValid() && arePasswordsMatching() && isPasswordEnter();
        }
        
        function isPasswordEnter(){
            return $newPassword.val();
        }

        function passwordEvent() {
             
            if (isPasswordValid()) {
                
                $password.next().hide();
            } else {
               
                $password.next().show();
            }
        }
        function passwordEventNew(){
            if(isPasswordEnter()){
                 $newPassword.next().hide();
            } else {
               
                $newPassword.next().show();
            }
        }
        
        function confirmPasswordEvent() {
           
            if (arePasswordsMatching()) {
                
                $confirmPassword.next().hide();
            } else {
               
                $confirmPassword.next().show();
            }
        }

        function enableSubmitEvent() {
            $("#submit").prop("disabled", !canSubmit());
        }

        
        $password.focus(passwordEvent).keyup(passwordEvent).keyup(enableSubmitEvent);

        $newPassword.focus(passwordEventNew).keyup(passwordEventNew).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);
        
        $confirmPassword.focus(confirmPasswordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);

        enableSubmitEvent();
    </script>