function upsertArticle(){
    let data={}
    data.id = parseInt( document.getElementsByName("id")[0].value)
    data.title = document.getElementsByName("title")[0].value
    data.description = document.getElementsByName("description")[0].value
    let created= data.id===0

    fetch("ajax/upsert.php", {
        method: 'post',
        body: JSON.stringify(data),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        return response.text()
    }).then((res) => {
        if (created) {
            closeFailureDialog();//reset
            closeSuccessDialog();//reset
            document.getElementById("success").classList.remove("hidden")
            document.getElementById("success_created").classList.remove("hidden")

            let articlesDiv = document.getElementById("articles")
            articlesDiv.innerHTML +=(res)
        }else{
            closeFailureDialog();//reset
            closeSuccessDialog();//reset
            document.getElementById("success").classList.remove("hidden")
            document.getElementById("success_edited").classList.remove("hidden")

            let div = document.querySelector("div[obj='"+id+"']")
            div.getElementsByName("title")[0].value = data.title
            div.getElementsByName("description")[0].value = data.description
        }
    }).catch((error) => {
        console.log(error)
    })
}

function deleteArticle(id){
    let data={}
    data.id = id

    fetch("ajax/delete.php", {
        method: 'post',
        body: JSON.stringify(data),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    }).then(function(response) {
        if(!response.ok)
        {
            throw new Error('Something went wrong.');
        }
    }).then(() => {
        closeSuccessDialog();//reset
        closeFailureDialog();//reset
        document.getElementById("success").classList.remove("hidden")
        document.getElementById("success_deleted").classList.remove("hidden")
        document.querySelector("div[obj='"+id+"']").remove()
    }).catch(() => {
        closeSuccessDialog();//reset
        closeFailureDialog();//reset
        document.getElementById("failed").classList.remove("hidden")
    })
}

function clearArticleForm(){
    document.getElementsByName("id")[0].value=0
    document.getElementsByName("title")[0].value=""
    document.getElementsByName("description")[0].value=""

    document.querySelectorAll(".creation").forEach(function (e,i,a,){
        e.classList.remove("hidden")
    })
    document.querySelectorAll(".edition").forEach(function (e,i,a,){
        e.classList.add("hidden")
    })
}

function fillArticleForm(id){
    document.querySelectorAll(".creation").forEach(function (e,i,a,){
        e.classList.add("hidden")
    })
    document.querySelectorAll(".edition").forEach(function (e,i,a,){
        e.classList.remove("hidden")
    })

    let div = document.querySelector("div[obj='"+id+"']")
    document.getElementsByName("id")[0].value=id
    document.getElementsByName("title")[0].value=div.getElementsByClassName("title")[0].textContent
    document.getElementsByName("description")[0].value=div.getElementsByClassName("description")[0].textContent
}

function closeSuccessDialog(){
    document.getElementById("success").classList.add("hidden")
    document.getElementById("success_created").classList.add("hidden")
    document.getElementById("success_deleted").classList.add("hidden")
    document.getElementById("success_edited").classList.add("hidden")
}

function closeFailureDialog(){
    document.getElementById("failed").classList.add("hidden")
}

function logout(){
    fetch("ajax/logout.php",
    ).then(()=> {
        location.replace(location.href);
    })
}