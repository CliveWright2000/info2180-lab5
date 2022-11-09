window.onload=()=>{
    let lookupBtn = document.querySelector("#lookup");
    let cityLu = document.querySelector("#lookupCt");
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

    cityLu.onclick = (event)=>{
        event.preventDefault();
        let countrySearch = document.querySelector("#country").value;
        let city = `world.php?country=${countrySearch}&lookup=cities`;
        fetch(city, {
            method: 'GET'
        })
        .then(response => {
            if (response.ok) {
            return response.text()
        }else {
            return Promise.reject('Something went wrong!')
        }
        }).then(data=> {
            results.innerHTML='';
            results.innerHTML=data;
        })
    }
}