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
                  <form novalidate action="<?= base_url('home/aksi_login') ?>" method="POST" id="loginForm" onsubmit="return validateForm();">
                     <fieldset>
                        <div class="field">
                           <label class="label_field">Username</label>
                           <input type="text" name="username" placeholder="Username" />
                        </div>
                        <div class="field">
                           <label class="label_field">Password</label>
                           <input type="password" name="password" placeholder="Password" />
                        </div>
                        
                        <!-- Online CAPTCHA -->
                        <div class="field" id="online-captcha-container">
                           <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                           <div id="recaptcha-container" class="g-recaptcha" data-sitekey="6LdFhCAqAAAAALvjUzF22OEJLDFAIsg-k7e-aBeH"></div>
                        </div>
                        
                        <!-- Offline CAPTCHA -->
                        <div class="field" id="offline-captcha-container" style="display:none;">
                           <div id="offline-captcha">
                              <p>Please enter the characters shown below:</p>
                              <img src="<?= base_url('Home/generateCaptcha') ?>" alt="CAPTCHA">
                              <input type="text" name="backup_captcha" class="form-control mt-2" placeholder="Enter CAPTCHA" required>
                           </div>
                        </div>

                        <div class="field margin_0">
                           <label class="label_field hidden">hidden label</label>
                           <button class="main_bt">Sign In</button>
                        </div>
                        <div class="register_prompt" style="text-align: center; margin-top: 10px;">
                           <p>Don't have an account? <a href="<?= base_url('home/register') ?>">Register here</a></p>
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

   /* Centering both CAPTCHAs */
   #recaptcha-container, #offline-captcha {
      display: flex;
      justify-content: center;
   }

   /* Ensure CAPTCHA stays below the password */
   #online-captcha-container, #offline-captcha-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
   }

   /* Additional styles for offline CAPTCHA */
   #offline-captcha {
      text-align: center;
   }
</style>

<script>
    function validateForm() {
        var response = grecaptcha.getResponse();
        var backupCaptcha = document.querySelector('input[name="backup_captcha"]').value;
        var isOffline = !navigator.onLine;

        if (isOffline) {
            if (backupCaptcha.length === 0) {
                alert('Please complete the offline CAPTCHA.');
                return false;
            }
        } else {
            if (response.length === 0) {
                alert('Please complete the online CAPTCHA.');
                return false;
            }
        }
        return true;
    }

    // Handle Offline Mode
    window.addEventListener('load', function() {
        if (!navigator.onLine) {
            document.getElementById('recaptcha-container').style.display = 'none';
            document.getElementById('offline-captcha-container').style.display = 'flex';
        }
    });
</script>
