// searchbar show hide area
const searchBar = document.querySelector('.search input[type="text"]');
const span = document.querySelector('.search span');
const searchBtn = document.querySelector('.search button');
const userLists = document.querySelector('.users-list');
searchBtn.onclick = ()=>{
    searchBar.classList.toggle('active');
    searchBar.focus();
    searchBtn.classList.toggle('active');
    searchBar.value = '';
}
span.onclick = ()=>{
    searchBar.classList.toggle('active');
    searchBar.focus();
    searchBtn.classList.toggle('active');
}

// Ajax searchbar functionlality adding

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ''){
        searchBar.classList.add('active');
        searchBtn.classList.add('active');
    }else{
        searchBar.classList.remove('active');
        searchBtn.classList.remove('active');
    }
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/search.php', true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userLists.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send("searchTerm=" + searchTerm);
}

// Showing data from database with ajax
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/users.php', true);
    xhr.onload = function(){
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains('active')){
                    userLists.innerHTML = data;
                }
            }
        }
    }
    xhr.send();

}, 500);