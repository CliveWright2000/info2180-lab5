window.onload=()=>{
    let lookupBtn = document.querySelector("#lookup");
    let results = document.querySelector("#result");

    lookupBtn.onclick = (event)=>{
        event.preventDefault();
        let countrySearch = document.querySelector("#country").value;
        let country = `world.php?country=${countrySearch}`;
        fetch(country, {
            method: 'GET'
        })
        .then(response => {
            if (response.ok) {
                return response.text()
            } else {
                return Promise.reject('something went wrong!')
            }
        }).then(data=> {
            results.innerHTML='';
            results.innerHTML = data;
        })
    }
}