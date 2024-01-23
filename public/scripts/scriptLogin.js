

    let login_form = document.querySelector("#login_form");
    let login_login = document.querySelector("#login_login");
    let password_login = document.querySelector("#password_login");
    let submit_login = document.querySelector("#submit_login");
    let error_form_login = document.querySelector("#error_form_login");
    let success_form_login = document.querySelector("#success_form_login");
    
    // ----------------------------------------------------------------------------------------------
    // --------------------------------Verification of form inputS start-----------------------------
    // ----------------------------------------------------------------------------------------------

    async function log_check(login_login) {
      let login_loginValue = login_login.value;
      error_form_login.innerHTML = "";

      if (login_loginValue.trim() === "") {
        login_login.style.backgroundColor = "red";
        login_login.style.borderColor = "red";
      } else {
        login_login.style.backgroundColor = "#FFFFFF";
        login_login.style.borderColor = "#FFFFFF";
      }

    }
    // ----------------------------------------------------------------------------------------------
    // --------------------------------Verification of form inputS end-------------------------------
    // ----------------------------------------------------------------------------------------------

    // ----------------------------------------------------------------------------------------------
    // --------------------------------Function login start------------------------------------------
    // ----------------------------------------------------------------------------------------------

    function indexLocation(){
      window.location = "./myListCreate"
    }

    async function login(login_form) {
      
      console.log(login_form)
      let data = new FormData(login_form);
      data.append("login_form", "ok");
      let response = await fetch("login/loginValidate", {
        method: "POST",
        body: data
      });

      let result = (await response.text()).trim();
      if (result === "loginOK") {
        success_form_login.innerHTML = "Login success"
        setTimeout( indexLocation, 2000)
        }
      if (result === "loginFail") {
        error_form_login.innerHTML = "Login fail";
      }
    }

    // ----------------------------------------------------------------------------------------------
    // --------------------------------Function login end------------------------------------------
    // ----------------------------------------------------------------------------------------------

    // ----------------------------------------------------------------------------------------------
    // --------------------------------addEventListener login start----------------------------------
    // ----------------------------------------------------------------------------------------------


    login_form.addEventListener("submit", function (e) {
      e.preventDefault();
    
      login(login_form)
    });

    login_login.addEventListener("blur", async function (e) {
      e.preventDefault();
      await log_check(login_login);
    });

    // ----------------------------------------------------------------------------------------------
    // --------------------------------addEventListener login end-----------------------------------
    // ----------------------------------------------------------------------------------------------
