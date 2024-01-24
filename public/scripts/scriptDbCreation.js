// ----------------------------------------------------------------------------------------------
// --------------------------------Verification of form inputS start-----------------------------
// ----------------------------------------------------------------------------------------------
let dbCreateForm = document.querySelector("#dbCreateForm");
let host = document.querySelector("#host");
let dbName = document.querySelector("#dbName");
let dbUser = document.querySelector("#dbUser");
let dbPass = document.querySelector("#dbPass");
let dbBtn = document.querySelector("#dbBtn");
let dbError = document.querySelector("#dbError");
let dbSuccess = document.querySelector("#dbSuccess");


// ----------------------------------------------------------------------------------------------
// --------------------------------Verification of form inputS end-----------------------------
// ----------------------------------------------------------------------------------------------









// ----------------------------------------------------------------------------------------------
// ----------------------------------------Function JS start-------------------------------------
// ----------------------------------------------------------------------------------------------

async function dbCreate(dbCreateForm) {
    let data = new FormData(dbCreateForm);
    data.append("dbCreateForm", "ok");
    let response = await fetch("/starter-project/dbCreation/start", {
        method: "POST",
        body: data
    });

    let result = await response.text().trim();

    if (result == true) {

        dbSuccess.innerHTML = "Database created !"
        setTimeout(() => {
            window.location = "/starter-project/";
        }, 3000);
    }
    if (result == false) {
        dbError.innerHTML = "Database creation fail";
    }
}


// ----------------------------------------------------------------------------------------------
// -----------------------------------------Function JS end--------------------------------------
// ----------------------------------------------------------------------------------------------









// ----------------------------------------------------------------------------------------------
// --------------------------------------AddEventListener start----------------------------------
// ----------------------------------------------------------------------------------------------

dbCreateForm.addEventListener("submit", function (e) {
    e.preventDefault();
    let form = new FormData(dbCreateForm);
    console.log(form)

    dbCreate(dbCreateForm);

    });




// ----------------------------------------------------------------------------------------------
// --------------------------------------AddEventListener end------------------------------------
// ----------------------------------------------------------------------------------------------