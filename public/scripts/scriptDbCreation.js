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

    let result = await response.json();
    console.log(result)

    if (result.success === true) {
        dbSuccess.innerHTML = "Database created !";

        setTimeout(() => {
            dbSuccess.innerHTML = "";
        }, 3000);
    }
    else if (result.success == false) {
        dbError.innerHTML = "Database creation fail";

        setTimeout(() => {
            dbError.innerHTML = ""
        }, 3000);
    }
}


// ----------------------------------------------------------------------------------------------
// -----------------------------------------Function JS end--------------------------------------
// ----------------------------------------------------------------------------------------------









// ----------------------------------------------------------------------------------------------
// --------------------------------------AddEventListener start----------------------------------
// ----------------------------------------------------------------------------------------------

dbCreateForm.addEventListener("submit", async function (e) {
    e.preventDefault();
    let form = new FormData(dbCreateForm);
    console.log(form)

    await dbCreate(dbCreateForm);

});




// ----------------------------------------------------------------------------------------------
// --------------------------------------AddEventListener end------------------------------------
// ----------------------------------------------------------------------------------------------