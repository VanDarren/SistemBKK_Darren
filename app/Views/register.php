<body class="inner_page login">
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <div class="logo_login">
                  <div class="center">
                     <img width="210" src="<?= base_url('images/logo/' . $darren2->iconlogin) ?>" alt="#" />
                  </div>
               </div>
               <div class="login_form">
                  <form novalidate action="<?= base_url('home/aksi_register') ?>" method="POST" id="registerForm" onsubmit="return validateForm();">
                     <fieldset>
                        <div class="field">
                           <label class="label_field">Username</label>
                           <input type="text" name="username" placeholder="Username" required />
                        </div>
                        <div class="field">
                           <label class="label_field">Email</label>
                           <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div class="field">
                           <label class="label_field">Password</label>
                           <input type="password" name="password" id="password" placeholder="Password" required />
                        </div>
                        <div class="field">
                           <label class="label_field"></label>
                           <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />
                        </div>

                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt">Register</button>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>

<style>
   .field {
      margin-bottom: 20px;
   }
</style>

<script>
    function validateForm() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            alert('Passwords do not match. Please try again.');
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>
